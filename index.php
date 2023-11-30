<?php
session_start();
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
    <title>Inventory Management Login Page</title>

    <link rel="shortcut icon" type="image/x-icon" href="assets/img/xx.png">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body class="account-page">
    <form method="POST" action="code.php">
        <div class="main-wrapper">
            <div class="account-content">
                <div class="login-wrapper">
                    <div class="login-content">
                        <div class="login-userset">
                            <div class="login-logo mt-5">
                                
                                <img src="assets/img/IM123.png" alt="img" style="height:auto">
                            </div>
                            <div class="login-userheading">
                                <h3>Sign In</h3>
                                <h4>Please login to your account</h4>
                            </div>
                            <?php
                            include('message.php');
                            ?>
                            <div class="form-login">
                                <label>Email</label>
                                <div class="form-addons">
                                    <input type="text" name="email" placeholder="Enter your email address">
                                    <img src="assets/img/icons/mail.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" name="pass" class="pass-input" placeholder="Enter your password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Role</label>
                                <select class="form-select" name="sel_role">
                                    <option value="User">User</option>
                                    <option value="Admin">Admin</option>
                                </select>
                            </div>
                            <div class="form-login">
                            <div class="signinform text-center">
                                <h4>Forgot password  <a href="forgetpassword.php" class="hover-a">Click Here</a></h4>
                            </div>
                            </div>
                            <div class="form-login">
                                <input type="submit" name="login_user" class="btn btn-login" value="Sign In">
                            </div>
                            <div class="signinform text-center">
                                <h4>Don’t have an account? <a href="signup.php" class="hover-a">Sign Up</a></h4>
                            </div>
                           <!-- <div class="form-setlogin">
                                <h4>Or sign up with</h4>
                            </div>-->
                            <div class="form-sociallink">
                                <ul>
                                   <!-- <li>
                                        <a href="javascript:void(0);">
                                            <img src="assets/img/icons/google.png" class="me-2" alt="google">
                                            Sign Up using Google
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);">
                                            <img src="assets/img/icons/facebook.png" class="me-2" alt="google">
                                            Sign Up using Facebook
                                        </a>
                                    </li>-->
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="login-img">
                        <img src="assets/img/IM.png" alt="img">
                    </div>
                </div>
            </div>
        </div>

    </form>
    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>
</body>

</html>