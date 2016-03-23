<?php
require_once "../../resources/constants.php";
$PAGE_TITLE = "Register"; //actual title
$PAGE_CSSs = array("register.css"); //your needed css
$PAGE_JSs = array("register.js"); // your needed js

include_once $_RESOURCESPATH . "template_first.php";
?>

<div class="register_form_container container">
    <hr>
    <fieldset>
        <legend>Please enter your information <small>*required fields</small></legend>
        <form id="form1" action="<?php echo $_SERVERURLROOT . 'resources/backend/users/register.php' ?>" method="post">
            <div class="form-group">
                <label for="txtemail">Email address*</label>
                <input type="email" class="form-control" required="required" name="txtemail" id="txtemail" placeholder="Your Personal Email (use a gmail account)">
            </div>
            <div class="form-group">
                <label for="txtpassword1">Password*</label>
                <input type="password" class="form-control" id="txtpassword1" name="txtpassword1" required="required" placeholder="Enter a password">
            </div>
            <div class="form-group">
                <label for="txtpassword2">Repeat Password*</label>
                <input type="password" class="form-control" id="txtpassword2" required="required" name="txtpassword2" placeholder="Repeat your password">
            </div> 
            <div class="form-group">
                <label for="txtaddress">Address*</label>
                <input type="text" class="form-control" id="txtaddress" name="txtaddress" required="required" placeholder="Enter an address where you are living now">
            </div>
            <div class="form-group">
                <label for="txtshippingaddress">Shipping Address*</label>
                <input type="text" required="required" class="form-control" id="txtshippingaddress" name="txtshippingaddress" placeholder="Address where the products will be sent">
            </div>
            <div class="form-group">
                <label for="txtpostalcode">Postal Code*</label>
                <input type="text" class="form-control" name="txtpostalcode" id="txtpostalcode"  placeholder="Your postal code">
            </div>
            <div class="form-group">
                <label for="txtphonenumber">Phone Number</label>
                <input type="tel" class="form-control" name="txtphonenumber" id="txtphonenumber" placeholder="Your Phone Number">
            </div>        
            <button  class="btn btn-primary" id="btn_submit">Sign up</button>
        </form>   
    </fieldset>
</div>


<?php
echo "<script>
         BACKEND_URL='" . $_SERVERURLROOT . "resources/backend/users/';
     </script>";
include_once $_RESOURCESPATH . "template_last.php";
?>