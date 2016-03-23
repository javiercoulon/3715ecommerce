<?php
require_once "../resources/constants.php";
$PAGE_TITLE = "About"; //actual title
$PAGE_CSSs = array(); //your needed css
$PAGE_JSs = array(); // your needed js

include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="about_container">
    <fieldset>
        <legend>Project Outline and brief Description</legend>
        <h2>Team Members <small>*where are three</small></h2>
        <p>
        <ul>
            <li>Francisco Javier Coulon Ollivier (201558XXX)</li>
            <li>Daulton Budgell (201305XXX)</li>
            <li>Enweremadu Chinedu Gilead (201288XXX)</li>     
        </ul>
        </p>
        <h2>Project Goals</h2>
        <p>
        <ul>
            <li>Develop a little e-commerce website.</li>
            <li>Put in action the technologies used for the development in the web, client side (bootstrap, jquery), server side (php).</li>
        </ul>
        </p>

        <h2>Project description:</h2>
        <p>
            Our intention is to create a simple ecommerce website using the most common technologies for the web and put in practice what we have learnt in this course. 
            In this website the user will be able to:
        <ul>
            <li>Register and give some information for the system</li>
            <li>Check the availables products.</li>
            <li>Make  mock sales or requests and follow it (check the state).</li>
            <li>Also the products will be keep in the database.</li>
            <li>The user will look for a product without reloading the page (using ajax).</li>
        </ul>
        </p>
        
        <h2>Other important facts </h2>
        <p>
        <ul>
            <li>The programming style will be for rapid results (create, test and fix).</li>
            <li>The database system used will be mysql.</li>
            <li>Server side language: php</li>
            <li>Organization tool: Trello.</li>
            <li>Version control: Github and subversion.</li>
            <li>We will be using most of the topics seen in class.</li> 
        </ul>
        </p>        
    </fieldset>
</div>

<?php
include_once $_RESOURCESPATH . "template_last.php";
?>