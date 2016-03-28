<?php
	require_once "../../resources/constants.php";
	require_once $_RESOURCESPATH.'connection.php';
	$PAGE_TITLE="New Product";//actual title
	$PAGE_CSSs=array();//your needed css
	$PAGE_JSs=array();// your needed js

	$_APP_LOGGEDREQUIRED=true;
	include_once $_RESOURCESPATH."template_first.php";
?>

<div class="register_form_container container">
    <hr>
    <fieldset>
        <legend>Please enter the product's information <small>*required fields</small></legend>
        <form id="form1"  action="<?php echo $_SERVERURLROOT . 'resources/backend/products/register.php' ?>"  enctype="multipart/form-data" method="post">
            <div class="form-group">
                <label for="txtname">Name (title)*</label>
                <input type="text" class="form-control" required="required" name="txtname" id="txtname" placeholder="Product name">
            </div>
            <div class="form-group">
                <label for="txtprice">Price*</label>
                <input type="number" class="form-control" id="txtprice" name="txtprice" required="required" placeholder="Price">
            </div>
            <div class="form-group">
                <label for="txtquantity">Quantity*</label>
                <input type="number" class="form-control" id="txtquantity" required="required" name="txtquantity" placeholder="How many examples for this product.">
            </div> 
            <div class="form-group">
                <label for="cmbcategory">Category*</label>
                <select class="form-control" id="cmbcategory" name="cmbcategory">
	                <?php
	                	$result=mysqli_query($db,"SELECT   category_id AS id,  name AS label FROM  fp_category ;");
	                	while ($result&&($row=mysqli_fetch_assoc($result))) {
	                		echo "<option value='".$row['id']."'>".$row['label']."</option>";
	                	}
	                ?>     	
                </select>
            </div>
            <div class="form-group">
                <label for="cmbstock">Stock*</label>
                 <select class="form-control" id="cmbstock" name="cmbstock">
	                <?php
	                	$result=mysqli_query($db,"SELECT   stock_id AS id,  name AS label,  description FROM  fp_stock  ;");
	                	while ($result&&($row=mysqli_fetch_assoc($result))) {
	                		echo "<option value='".$row['id']."'>".$row['label']."</option>";
	                	}
	                ?>     	
                </select>               
            </div>
            <div class="form-group">
                <label for="txtweigth">Weigth*</label>
                <input type="number" class="form-control" name="txtweigth" id="txtweigth"  placeholder="Product weigth">
            </div>
            <div class="form-group">
                <label for="txtcolor">Color</label>
                <input type="color" class="form-control" name="txtcolor" id="txtcolor" placeholder="Your Phone Number">
            </div> 
            <div class="form-group">
                <label for="txtdiscount">Discount</label>
                <input type="number" class="form-control" name="txtdiscount" id="txtdiscount" placeholder="Product Discount">
            </div>   

            <div class="form-group">
                <label for="txtobservations">Observations</label>
                <textarea class="form-control" name="txtobservations" placeholder="Observations" ></textarea>
            </div>   
            <div class="form-group">
                <label for="txtdescription">Description</label>
                <textarea class="form-control" name="txtdescription" placeholder="Description" ></textarea>
            </div>  
            <div class="form-group">
                <label for="txtimage">Image</label>
                <input type="file" class="form-control"  accept="image/gif, image/jpeg, image/png" required="required" name="txtimage" id="txtimage" placeholder="Image">
            </div>                                            
            <input type="submit"  class="btn btn-primary" value="Register" id="btn_submit"/>
        </form>   
    </fieldset>
</div>


<?php
		include_once $_RESOURCESPATH."template_last.php";
?>