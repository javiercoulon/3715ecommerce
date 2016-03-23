<?php
require_once "../resources/constants.php";
$PAGE_TITLE = "Frequently Asked Questions"; //actual title
$PAGE_CSSs = array("faq.css"); //your needed css
$PAGE_JSs = array(); // your needed js

include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="faq_container">
    <fieldset>
        <legend>Frequently Asked Questions (FAQ)</legend>
        <div class="question_container">
            <p class="question_title">Does this site has any commercial intention?</p>
            <hr>
            <p class="response_container">
                The implementation of this solution is not intended for commercial purposes. This was done and presented as the final project for the CS3715 (Web Applications)
            </p>
        </div>
        <div class="question_container">
            <p class="question_title">Did we use some special way of organization or framework?</p>
            <hr>
            <p class="response_container">
                Actually, for organize the tasks, we used the free online tool called Trello, here is a picture of our job, some weeks ago. 
                About the programming stuff, we just created a structure to make easier the programming process and the maintenability in the near future.
                <p>
                    <img class="img_faq" src="../resources/imgs/fp_02.PNG">
                </p>
            </p>
        </div>
        <div class="question_container">
            <p class="question_title">Can anyone take this code and extend it?</p>
            <hr>
            <p class="response_container">
                Yes, try it.
            </p>
        </div>
        <div class="question_container">
            <p class="question_title">Which are the most important technologies used in the solution</p>
            <hr>
            <p class="response_container">
                Well, for client side, we used boostrap for the css stuff, of course we had to adapt and create custom css. For javascript we used Jquery and for backend php language.
            </p>
        </div>
        <div class="question_container">
            <p class="question_title">The products, are they real?</p>
            <hr>
            <p class="response_container">
                For the demonstrations and this first version, all the products are fake ones. We took some free images in the internet and we used them.
            </p>
        </div>
        <div class="question_container">
            <p class="question_title">Does this project has a repository in GITHUB?</p>
            <hr>
            <p class="response_container">
                Yes it has. You can clone using this <a target="_blank" href="https://github.com/javiercoulon/3715ecommerce/">Link</a>
            </p>
        </div>       
    </fieldset>
</div>

<?php
include_once $_RESOURCESPATH . "template_last.php";
?>