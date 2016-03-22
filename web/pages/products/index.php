<?php
	require_once "../../resources/constants.php";
	$PAGE_TITLE="Products";//actual title
	$PAGE_CSSs=array("products_css.css");//your needed css
	$PAGE_JSs=array("products_script.js");// your needed js
	
	include_once $_RESOURCESPATH."template_first.php";
?>

	<div class="product_listing_option row">
		<div class="col-xs-12 col-md-8">
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='1'>Food</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='2'>Transport</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='3'>Computers</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='4'>Others</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='5'>Food</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='6'>Transport</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='7'>Computers</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='8'>Others</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='9'>Food</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='10'>Transport</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='11'>Computers</button>
				<button type="button" class="btn btn-default navbar-btn btn_filter_type" id_cat='12'>Others</button>								
		</div>
		<div class="col-xs-12 col-md-4">
			<form class="navbar-form" role="search">
			  <div class="form-group">
			    <input type="text" class="form-control" id="product_query" placeholder="Search">
			  </div>
			  <button class="btn btn-default">Search</button>
			</form>	
		</div>
		<hr>
	</div>

	<div id="products_container">
		<?php
			$_PRODUCTS_customoperation='init_load';
			include_once $_RESOURCESPATH.'backend/products/list_products.php';
		?>	
	</div>


<style type="text/css">
	.product_listing_option{
		margin-bottom: 30px;
	}

</style>
			

<?php
		echo "<script>BACKEND_URL='".$_SERVERURLROOT."resources/backend/products/'</script>";
		include_once $_RESOURCESPATH."template_last.php";
?>