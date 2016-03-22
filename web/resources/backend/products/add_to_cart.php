<?php
error_reporting(0);
session_start();

$selection = $_SESSION["selection"];

if (!isset($selection) || empty($selection)) {
    $selection = array();
   // echo 'entree crear';
}
$resp = array();
header("Content-Type: application/json");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
   
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $resp['params'] = array("product_id" => $product_id, "product_quantity" => $product_quantity);

    if (isset($product_id) && !empty($product_id)) {
        $resp["success"] = 1;
        $product_quantity = empty($product_quantity) ? 0 : $product_quantity;
        $selection[$product_id] = $product_quantity;
        $resp["details"] = "Product added to cart";
        if ($product_quantity == 0) {
            unset($selection[$product_id]);
            $resp["details"] = "Product removed from cart";
        }
    } else {
        $resp["success"] = 0;
    }
 //echo 'entree';
    $resp["number_of_items"] = count($selection);
    $_SESSION["selection"] = $selection;
 
}else{
    $resp["error"]="not recognized";
}   
echo json_encode($resp);
?>