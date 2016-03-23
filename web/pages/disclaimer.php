<?php
require_once "../resources/constants.php";
$PAGE_TITLE = "Disclaimer"; //actual title
$PAGE_CSSs = array(); //your needed css
$PAGE_JSs = array(); // your needed js

include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="disclaimer_container">
    <fieldset>
        <legend>Disclaimer</legend>
        <p>
            The information contained in this website is for educational  purposes only . The information is provided here is completely fake.  
            We make no representations or warranties of any kind, express or implied, about the use with respect to the website or the
            information, products, services, or related graphics contained on the website for any purpose. Any reference using this website is therefore strictly at your own risk.
        </p>
        <p>
            In no event will we be liable for any loss or damage including without limitation, indirect or consequential loss
            or damage, or any loss or damage whatsoever arising from loss of data or profits arising out of, or in connection with, the use of this website.

        </p>
        <p>
            Through this website you are not able to link to other websites which are not under our scope. (Only one to GITHUB in the FAQ section)
            We have no control over the nature, content and availability of injected links to any other external sites. 
            The inclusion of any links does not necessarily imply a recommendation or endorse the views expressed within them.

        </p>
    </fieldset>
</div>

<?php
include_once $_RESOURCESPATH . "template_last.php";
?>