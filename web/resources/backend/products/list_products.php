<?php

	//echo $_REQUEST['operation'].'nooooo';
	if(isset($_REQUEST['operation'])&&!empty($_REQUEST['operation'])){
		$operation=$_REQUEST['operation'];
	}else if(isset($_PRODUCTS_customoperation)){
		$operation=$_PRODUCTS_customoperation;
	}else{
		$operation='default';
	}
	//$operation=isset($_REQUEST['operation'])?$_REQUEST['operation']:isset($_PRODUCTS_customoperation)?$_PRODUCTS_customoperation:'default';
	//echo $operation."this is is";

	switch ($operation) {
		case 'init_load':
			//initial load
$products=array(
		array(
			"product_id"=>1,
			"product_title"=>"Tshirt - for kids",
			"product_image"=>"tshirt.jpg",
			"product_description"=>"ThisThis is a descriptionThis is a descriptionThis is 
			a descriptionThis is a description is a description",
			"product_weigh"=>45,
			"product_color"=>"black",
			"product_status"=>1,
			"product_observation"=>"This is an observation",
			"product_discount"=>20,
			"category_id"=>1,

			),
		array(
			"product_id"=>1,
			"product_title"=>"Tshirt - for kids",
			"product_image"=>"tshirt.jpg",
			"product_description"=>"ThisThis is a descriptionThis is a descriptionThis is 
			a descriptionThis is a description is a description",
			"product_weigh"=>45,
			"product_color"=>"black",
			"product_status"=>1,
			"product_observation"=>"This is an observation",
			"product_discount"=>35,
			"category_id"=>1,

			),
		array(
			"product_id"=>1,
			"product_title"=>"Tshirt - for kids",
			"product_image"=>"tshirt.jpg",
			"product_description"=>"ThisThis is a descriptionThis is a descriptionThis is 
			a descriptionThis is a description is a description",
			"product_weigh"=>45,
			"product_color"=>"black",
			"product_status"=>1,
			"product_observation"=>"This is an observation",
			"product_discount"=>20,
			"category_id"=>1,

			),
		array(
			"product_id"=>1,
			"product_title"=>"Tshirt - for kids",
			"product_image"=>"tshirt.jpg",
			"product_description"=>"ThisThis is a descriptionThis is a descriptionThis is 
			a descriptionThis is a description is a description",
			"product_weigh"=>45,
			"product_color"=>"black",
			"product_status"=>1,
			"product_observation"=>"",
			"product_discount"=>0,
			"category_id"=>1,

			),		
		);


		foreach ($products as $product) {

?>

			<div class="product_container">
					<input type="hidden" name="product_id" value="<?php echo $product['product_id'];?>" class="product_id_container">
					<div class="product_details">
							<div class="product_title">
								<?php echo $product['product_title'];?>
							</div>
							<div class="product_image">
								<img class="product_pure_image" src="<?php echo $_IMAGESURL;?>test/<?php echo $product['product_image'];?>">
							</div>
							<div class="product_description_container">
								<div class="product_description">
									<?php echo $product['product_description'];?>
									<ul class="product_data">
										<li>Weigh: <?php echo $product['product_weigh'];?></li>
										<li>Color: <?php echo $product['product_color'];?></li>
										<li>Status: <?php echo $product['product_status'];?></li>
									</ul>				
								</div>
								<div class="product_options">
									<div class="row">
										<div class="col-xs-12 col-md-6">
											<span class="product_option_label">Quantity</span>

											<span class="product_option_command">
												<input type="number" min="0" max="5" class="form-control product_quantity">
											</span>								
										</div>
										<div class="col-xs-12 col-md-6">
										    <span class="product_option_label">Operation</span>
											<span class="product_option_command">
												<button class="btn btn-primary form-control">Add to Cart</button>
											</span>									
										</div>							
									</div>
								</div>
							</div>
							<?php if(isset($product['product_observation'])&&strlen($product['product_observation'])>0):?>
								<div class="product_observation">
									<?php echo $product['product_observation'];?>
								</div>
							<?php endif;?>

							<?php if(isset($product['product_discount'])&&$product['product_discount']>0):?>
								<span class="product_discountcontainer"><?php echo $product['product_discount'];?></span>
							<?php endif;?>							
							

					</div>
			</div>

<?php
		}
			break;
			case 'reload':
				
				$resp=array();
				if ($_SERVER['REQUEST_METHOD'] === 'POST') {
					  header("Content-Type: application/json");
					  $query=$_POST['query'];
					  $filters=$_POST['filters'];
					  $type=$_POST['type'];
					  $offset=$_POST['offset'];
					  $max=$_POST['max'];
					  $use_query=!empty($query);
					  $use_filters=!empty($filters);
					  $resp['params']=array('query' => $query,'filters' =>$filters ,'type' =>$type ,
					  	'offset' =>$offset ,'max' =>$max,'usequery'=>$use_query,'use_filters'=>$use_filters);
					  
					  echo json_encode($resp);
					  return;
				}
				break;
		
		default:
			# code...
			break;
	}

?>

	




