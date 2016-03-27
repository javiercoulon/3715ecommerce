<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../constants.php';
    require_once $_RESOURCESPATH . 'connection.php';
    error_reporting(E_ALL);

    $txtname = $_POST['txtname'];
    $txtprice = $_POST['txtprice'];
    $txtquantity = $_POST['txtquantity'];
    $cmbcategory = $_POST['cmbcategory'];
    $cmbstock = $_POST['cmbstock'];
    $txtweigth = $_POST['txtweigth'];
    $txtcolor = $_POST['txtcolor'];
    $txtdiscount=$_POST['txtdiscount'];
    $txtobservations=$_POST['txtobservations'];
    $txtdescription=$_POST['txtdescription'];

    if (!empty($txtname) && !empty($txtprice) && !empty($cmbcategory) && !empty($cmbstock) ){
        $resp = array();
        $result = mysqli_query($db, "INSERT INTO fp_product (  name,  description,  price,  quantity,  registration_date,  category_id,  stock_id,  weight,
                                    color,  status,  observations,  discount) 
                                    VALUES(   '".$txtname."', '".$txtdescription."', '".$txtprice."', '".$txtquantity."', NOW(), '".$cmbcategory."','".$cmbstock."',
                                    '".$txtweigth."','".$txtcolor."','1', '".$txtobservations."', '".$txtdiscount."' ) ;");

        if ($result) {
            //redirect to notification success, upload image
            $id= mysqli_insert_id($db);
            include_once $_RESOURCESPATH.'backend/products/upload.php';
                if($imageInserted){    echo "image success";          }
                else{       echo "image error";               }
            }            
            header('Location: ' . $_SERVERURLROOT);
        } else {  header('Location: ' . $_SERVER['HTTP_REFERER']);        }
    }else{        header('Location: ' . $_SERVER['HTTP_REFERER']);        echo "No entree";    }

    exit;

?>