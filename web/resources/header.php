<link rel="stylesheet" type="text/css" href="<?php echo $_CSSURL; ?>header.css">
<div id="header_container">
    <!-- Static navbar -->
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img height="50" width="50" src="<?php echo $_IMAGESURL;?>ecommerce_logo.png"> <a class="navbar-brand" href="<?php echo $_SERVERURLROOT; ?>">Web E-Commerce</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $_SERVERURLROOT?>">Home</a></li>
                    <li><a href="<?php echo $_SERVERURLROOT.'pages/products/'?>">Products</a></li>
                    <li><a href="<?php echo $_SERVERURLROOT.'pages/sales/mysales.php'?>">Sales</a></li>
                    <li><a href="<?php echo $_SERVERURLROOT.'pages/about.php'?>">About</a></li>
                    <li><a href="<?php echo $_SERVERURLROOT.'pages/faq.php'?>">FAQs</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Personal Area <span class="caret"></span></a>
                        <?php 
                            session_start();
                            if(isset($_SESSION['LOGGED_IN'])&&!empty($_SESSION['LOGGED_IN'])){
                        ?>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo $_SERVERURLROOT.'pages/user/profile.php'?>">Profile</a></li>
                                <li><a href="<?php echo $_SERVERURLROOT.'pages/sales/mysales.php'?>">My requests</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Session Options</li>
                                <li><a href="<?php echo $_SERVERURLROOT.'resources/backend/users/logout.php'?>">Logout</a></li>
                            </ul>
                        <?php
                            }else{
                        ?>
                             <ul class="dropdown-menu">
                                <li><a href="<?php echo $_SERVERURLROOT.'pages/user/login.php'?>">Login</a></li>
                                <li><a href="<?php echo $_SERVERURLROOT.'pages/user/register.php'?>">Sign up</a></li>
                            </ul>
                         <?php }?>
                        
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
</div>


		
