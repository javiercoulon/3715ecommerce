<?php
require_once "resources/constants.php";
$PAGE_TITLE = "Homepage"; //actual title
$PAGE_CSSs = array("carrousel.css","index.css"); //your needed css
$PAGE_JSs = array(); // your needed js

include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="index_container">
    <div class="">
        <!-- Carousel
        ================================================== -->
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img class="first-slide" src="resources/imgs/index_slide02.jpg" alt="Easy Request Process">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Easy Request Process</h1>
                            <p>Sign up or Login to start exploring our ecommerce web site. The time beetween the request and the final confirmation is easily done.</p>
                            <p>Join us today, it is free to create an account.</p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="second-slide" src="resources/imgs/index_slide01.jpg" alt="Security">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Security</h1>
                            <p>The checking is done under the higer security standarts. Your information will be keep safe with us.</p>
                            <p><a class="btn btn-lg btn-primary" href="pages/faq.php" role="button">Learn more</a></p>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <img class="third-slide" src="resources/imgs/index_slide03.jpg" alt="Easy Product selection process">
                    <div class="container">
                        <div class="carousel-caption">
                            <h1>Easy Product selection process</h1>
                            <p>You can see and select products from stock easily.</p>
                        </div>
                    </div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div><!-- /.carousel -->
    </div>
    <div class="row">
        <div class="col-xs-6 col-md-6">
            <a href="pages/about.php" class="thumbnail">
                <img src="resources/imgs/index_01.jpg" alt="About">
            </a>
        </div>
        <div class="col-xs-6 col-md-6">
            <a href="pages/disclaimer.php" class="thumbnail">
                <img src="resources/imgs/index_02.jpg" alt="Disclaimer">
            </a>
        </div>        
    </div>
</div>

<?php
include_once $_RESOURCESPATH . "template_last.php";
?>