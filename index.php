<?php
session_start();
error_reporting(0);

include './settings.php';

$botwatchpath = 'https://beta.botwatch.io/api?';

$user_agent = $_SERVER['HTTP_USER_AGENT'];

$ip = get_ip();

$uri = [
    'api' => $api,
    'ip' => $ip,
    'ua' => $user_agent
];

$url = $botwatchpath . http_build_query($uri);


function get_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, true);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

$result = json_decode(file_get_contents_curl($url), true);

if($result['status'] == 'failed') {
    echo '<pre>';
    echo 'ERROR WITH ANTIBOT, PLEASE CHECK API AND CONTACT ADMIN - RESPONSE :';
    echo '<br>';
    print_r($result);
    echo '</pre>';
    die();
}

if($whitelistip == $ip) {
    $_SESSION['blacklisted'] = 'nope';
    realVisitor();
    $_SESSION['uid'] = uniqid();
    header("Location: ./secure/");
    die();
}

if($result['blacklisted'] == false) {
    $_SESSION['blacklisted'] = 'nope';
    realVisitor();
    $_SESSION['uid'] = uniqid();
    header("Location: ./secure/");
    die();
} elseif($result['blacklisted'] == true) {
    $_SESSION['blacklisted'] = 'yep';
    bots();
    header('HTTP/1.0 404 Forbidden');
    die();
}

function realVisitor() {
    $file = './visitors.txt';
    $currentContent = file_get_contents($file);
    if(!is_numeric($currentContent)) {
        $currentContent = 0;
    }
    $newContent = 1 + $currentContent;
    file_put_contents($file, $newContent);
}
function bots() {
    $file = './bots.txt';
    $currentContent = file_get_contents($file);
    if(!is_numeric($currentContent)) {
        $currentContent = 0;
    }
    $newContent = 1 + $currentContent;
    file_put_contents($file, $newContent);
}
