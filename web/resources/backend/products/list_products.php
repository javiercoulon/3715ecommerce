<?php
session_start();
//echo $_REQUEST['operation'].'nooooo';
if (isset($_REQUEST['operation']) && !empty($_REQUEST['operation'])) {
    $operation = $_REQUEST['operation'];
    require_once '../../constants.php';
    require_once $_RESOURCESPATH.'connection.php';
} else if (isset($_PRODUCTS_customoperation)) {
    $operation = $_PRODUCTS_customoperation;
} else {
    $operation = 'default';
}

//$operation=isset($_REQUEST['operation'])?$_REQUEST['operation']:isset($_PRODUCTS_customoperation)?$_PRODUCTS_customoperation:'default';
//echo $operation."this is is";
$limit=8;
$offset=0;
$default_sql = "SELECT fp_product.product_id,name,description,price,quantity,registration_date,category_id,stock_id,weight,color,status,observations,discount,details
 FROM fp_product,fp_product_images where fp_product.product_id=fp_product_images.product_id";

$selection = $_SESSION["selection"];
if (!isset($selection) || empty($selection)) {
    $selection = array();
}

switch ($operation) {
    case 'init_load':
        //initial load
        $result = mysqli_query($db, $default_sql." limit ".$limit." offset ".$offset);
        $products=array();
       // var_dump($result);
       // echo $default_sql;
        while ($result && ($row = mysqli_fetch_assoc($result))) {
            //echo 'entree';
           $product=array(
                "product_id" => $row['product_id'],
                "product_title" =>$row['name'],
                "product_image" => $row['details'],
                "product_description" => $row['description'],
                "product_weigh" => $row['weight'],
                "product_color" =>$row['color'],
                "product_status" => $row['status'],
                "product_observation" => $row['observations'],
                "product_discount" => $row['discount'],
                "category_id" => $row['category_id'],  
                "product_quantity"=>$row['quantity']  
           );
           array_push($products,$product);
        }
        //get how many products are
        
         $result = mysqli_query($db, "select count(*) as num from fp_product");
       
        if ($result && ($row = mysqli_fetch_assoc($result))) {
            //echo 'entree';
           $num_of_products=$row['num'];
           $num_of_pages=ceil($num_of_products/$limit);
        
        }       
        //var_dump($selection);
        foreach ($products as $product) {
            $value="";
            if(isset($selection[$product['product_id']])&&!empty($selection[$product['product_id']])&&($selection[$product['product_id']]>0)){
                $value=$selection[$product['product_id']];
                
            }
            ?>

            <div class="product_container <?php echo (strlen($value)>0?"product_container_incart":"")?>">
                <input type="hidden" name="product_id" value="<?php echo $product['product_id']; ?>" class="product_id_container">
                <div class="product_details">
                    <div class="product_title">
            <?php echo $product['product_title']; ?>
                    </div>
                    <div class="product_image">
                        <img class="product_pure_image" src="<?php echo $_IMAGESURL; ?>products/<?php echo $product['product_image']; ?>">
                    </div>
                    <div class="product_description_container">
                        <div class="product_description">
            <?php echo $product['product_description']; ?>
                            <ul class="product_data">
                                <li>Weigh: <?php echo $product['product_weigh']; ?></li>
                                <li>Color: <?php echo $product['product_color']; ?></li>
                                <li>Status: <?php echo $product['product_status']; ?></li>
                            </ul>				
                        </div>
                        <div class="product_options">
                            <div class="row">
                                <div class="col-xs-12 col-md-6">
                                    <span class="product_option_label">Quantity</span>

                                    <span class="product_option_command">
                                        <input type="number" min="0" max="5" value="<?php echo $value;?>" class="form-control product_quantity ">
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
            <?php if (isset($product['product_observation']) && strlen($product['product_observation']) > 0): ?>
                        <div class="product_observation">
                <?php echo $product['product_observation']; ?>
                        </div>
            <?php endif; ?>

                    <?php if (isset($product['product_discount']) && $product['product_discount'] > 0): ?>
                        <span class="product_discountcontainer"><?php echo $product['product_discount']; ?></span>
                    <?php endif; ?>							


                </div>
            </div>

                    <?php
                }
                break;
            case 'reload':

                $resp = array();
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    header("Content-Type: application/json");
                    $query = $_POST['query'];
                    $filters = $_POST['filters'];
                    $type = $_POST['type'];
                    $offset = $_POST['offset'];
                    $max = $_POST['max'];
                    $use_query = !empty($query);
                    $use_filters = !empty($filters);
                    $resp['params'] = array('query' => $query, 'filters' => $filters, 'type' => $type,
                        'offset' => $offset, 'max' => $max, 'usequery' => $use_query, 'use_filters' => $use_filters);
                    $filter_where="";
                    if($use_filters){
                        $filter_where=" and (";
                        $aux_count=0;
                        foreach ($filters as $filter){
                            if($aux_count>0){
                                $filter_where.=" or ";
                            }
                            $aux_count++;
                            $filter_where.=" category_id='".$filter."' ";
                        }
                        if($aux_count>0){
                            $filter_where.=" ) ";
                        }   
                    }
                    if($use_query){
                        if($aux_count>0){
                            $filter_where.=" and (name like '%".$query."%')";
                        }else{
                             $filter_where.=" name like '%".$query.")%'";
                        }
                    }
                    
                    $final_query=$default_sql.$filter_where." limit ".$max." offset ".($offset*$max);
                    $resp['params']['finalquery']=$final_query;
                    $result = mysqli_query($db, $final_query);
                    $products=array();
                   // var_dump($result);
                   // echo $default_sql;
                    while ($result && ($row = mysqli_fetch_assoc($result))) {
                        //echo 'entree';
                        
                       $product=array(
                            "product_id" => $row['product_id'],
                            "product_title" =>$row['name'],
                            "product_image" => $row['details'],
                            "product_description" => $row['description'],
                            "product_weigh" => $row['weight'],
                            "product_color" =>$row['color'],
                            "product_status" => $row['status'],
                            "product_observation" => $row['observations'],
                            "product_discount" => $row['discount'],
                            "category_id" => $row['category_id'],  
                            "product_quantity"=>$row['quantity'],
                            "product_incart"=>$selection[$row['product_id'].""]

                       );
                       array_push($products,$product);
                    }
                    //get how many products are
                    $resp["products"]=$products;
                    $resp["last_query"]="select count(*) as num from fp_product where product_id=product_id ".$filter_where." limit ".$max."  ";
                     $result = mysqli_query($db, "select count(*) as num from fp_product where product_id=product_id ".$filter_where." limit ".$max."  ");

                    if ($result && ($row = mysqli_fetch_assoc($result))) {
                        //echo 'entree';
                       $num_of_products=$row['num'];
                       $num_of_pages=ceil($num_of_products/$limit);
                       $resp["num_of_pages"]=$num_of_pages;
                       $resp["num_of_products"]=$num_of_products;
                    }  
                    $resp["selection"]=$selection;
                    echo json_encode($resp);
                    return;
                }
                break;

            default:
                # code...
                break;
        }
        ?>






