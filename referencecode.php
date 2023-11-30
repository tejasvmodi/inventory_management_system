<?php
session_start();
include('dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Login - Pos admin template</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
 <?php
  include("message.php");
 ?>
<body class="account-page">

    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <form method="POST"  action="code.php">
                        <div class="login-userset ">
                        <div class="login-logo mt-5">
                                
                                <img src="assets/img/IM123.png" alt="img" style="height:auto">
                            </div>
                            <div class="login-userheading">
                                <h3>please enter the code which will be send you in Email account </h3>
                                <h4></h4>
                            </div>
                            <div class="form-login">
                                <label>Enter The Code</label>
                                <div class="form-addons">
                                    <input type="text"  name="pass" placeholder="Enter your email address">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                                <div class="form-login">
                                <label>Role</label>
                                <select class="form-select" name="sel_role">
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            </div>
                            <div class="form-login">
                                <button type="submit" name="rcode213" class="btn btn-login">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
                  <div class="login-img">
                        <img src="assets/img/IM.png" alt="img">
                    </div>
            </div>
        </div>
    </div>

    <script src="http://code.jquery.com/jquery-3.3.1.min.js"></script>

    <script type="text/javascript">
      /*  function sendEmail() {

            var email = $("#email");


            if (isNotEmpty(email)) {
                $.ajax({
                    url: 'sendEmail.php',
                    method: 'POST',
                    dataType: 'json',
                    data: {

                        email: email.val()

                    },
                    success: function(response) {
                        $('#myForm')[0].reset();
                        $('.sent-notification').text("Message Sent Successfully.");
                    }
                });
            }
        }

        function isNotEmpty(caller) {
            if (caller.val() == "") {
                caller.css('border', '1px solid red');
                return false;
            } else
                caller.css('border', '');

            return true;
        }*/
    </script>


    <script src="assets/js/jquery-3.6.0.min.js"></script>
    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>