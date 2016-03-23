<?php

session_start();
require_once "../../constants.php";
require_once $_RESOURCESPATH . 'connection.php';
$selection = $_SESSION["selection"];
$_SESSION["user_id"] = 1;
if (!isset($selection) || empty($selection)) {
    //redirect to home
}
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pmethod = $_POST['pmethod'];
    $shipper = $_POST['shipper'];
    $requiredate = $_POST['requiredate'];
    $observations = $_POST['observations'];
    $sale_code = substr(md5(rand()), 0, 45);
    $sale_user = $_SESSION['user_id'];
    $sale_state = 1;



    if (!empty($pmethod) && !empty($requiredate) && !empty($sale_code) && !empty($sale_user)) {

        $result = mysqli_query($db, "INSERT INTO fp_sell(sell_date,user_id,sell_state,observation,pmethod_id,required_date,sell_code,shipper_name)
                                     VALUES('now()','" . $sale_user . "','" . $sale_state . "','" . $observations . "','" . $pmethod . "','" . $requiredate . "','" . $sale_code . "','" . $shipper . "');");
        echo "INSERT INTO fp_sell(sell_date,user_id,sell_state,observation,pmethod_id,required_date,sell_code,shipper_name)
                                     VALUES(now(),'" . $sale_user . "','" . $sale_state . "','" . $observations . "','" . $pmethod . "','" . $requiredate . "','" . $sale_code . "','" . $shipper . "');";
        if ($result) {
            //select last inserted id
            $sell_id = mysqli_insert_id($db);
            //insert details
            $selection = $_SESSION["selection"];

            reset($selection); // go to the beginning of the array

            while (list($key, $value) = each($selection)) {
                $result = mysqli_query($db, "INSERT INTO `fp_sale details` (sale_id,product_id,quantity)
                                             VALUES('" . $sell_id . "','" . $key . "','" . $value . "');");
                $result = mysqli_query($db, "UPDATE fp_product SET quantity = (quantity-".$value.") WHERE product_id='" . $key . "'");
                
            }
            //create notifications
            //redirect to my buy
            //unset selection
            unset($_SESSION["selection"]);
            header("Location: " . $_SERVERURLROOT);
        }
    }
} else {
    $resp["error"] = "not recognized";
}
echo mysqli_error($db);
?>