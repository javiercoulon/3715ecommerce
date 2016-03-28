<?php
    require_once '../../resources/constants.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../../css/login.css" />
        <meta charset="UTF-8">
        <title>Ecommerce | Login</title>
    </head>
    <body>
        <div class="main-panel">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-md-6">
                        <a href="#" class="active" id="login-form-link">Login</a>
                    </div>
                    <div class="col-md-6">
                        <a href="#" id="register-form-link">Register</a>
                    </div>
                </div>
                <hr>
            </div>
            <br>

            <div class="panel-body">
                <form action="<?php echo $_SERVERURLROOT.'resources/backend/users/login.php'?>" method="post" id="login" name="login" role="form"
                      style="display: block">
                    <div class="form-group">
                        <input type="email" required="required" name="username" id="username" tabindex="1"
                               class="form-control" placeholder="Username" />
                    </div>
                    <br>
                    <div class="form-group">
                        <input type="password" required="required" name="password" id="password" tabindex="2"
                               class="form-control" placeholder="Password" />
                    </div>
                    <br>
                    <div class="form-controlcheck" style="text-align: center">
                        <input type="checkbox" name="checkmark" id="checkmark" tabindex="3" />
                        <label for="checkmark"><b>Remember Me</b></label>
                    </div>
                    <br>
                    <div class="form-group" style="text-align: center">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-2">
                                <input type="submit" name="login-submit" id="login-submit"
                                       tabindex="4" class="form-control btn btn-login" value="LogIn">
                            </div>
                        </div>
                    </div>
                    <br>
                </form>


                <form id="register-form" action="" method="post" role="form"
                      style="display: none;">
                    <div class="form-group">
                        <input type="text" name="username" id="username" tabindex="1"
                               class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" id="email" tabindex="1"
                               class="form-control" placeholder="Email Address" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" id="password" tabindex="2"
                               class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <input type="password" name="confirm-password"
                               id="confirm-password" tabindex="2" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-6 col-sm-offset-3">
                                <input type="submit" name="register-submit" id="register-submit"
                                       tabindex="4" class="form-control btn btn-register"
                                       value="Register Now">
                            </div>
                        </div>
                    </div>
                </form>



            </div>

        </div>
    </body>
</html>