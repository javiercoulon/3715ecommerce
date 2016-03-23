<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../constants.php';
    require_once $_RESOURCESPATH . 'connection.php';

    $txtemail = $_POST['txtemail'];
    $txtpassword1 = $_POST['txtpassword1'];
    $txtpassword2 = $_POST['txtpassword2'];
    $txtaddress = $_POST['txtaddress'];
    $txtshippingaddress = $_POST['txtshippingaddress'];
    $txtpostalcode = $_POST['txtpostalcode'];
    $txtphonenumber = $_POST['txtphonenumber'];
    $status = 1;

    if (!empty($txtemail) && !empty($txtpassword1) && !empty($txtaddress) && !empty($txtshippingaddress) && !empty($txtpostalcode) && ($txtpassword1 == $txtpassword2)) {
        $resp = array();
        $result = mysqli_query($db, "INSERT INTO fp_user (password,creation_date,adress,shipping_adress,postal_code,phone_number,status,email)
                                VALUES('" . $txtpassword1 . "',now(),'" . $txtaddress . "','" . $txtshippingaddress . "','" . $txtpostalcode . "','" . $txtphonenumber . "','" . $status . "','" . $txtemail . "');");
        if ($result) {
            //echo 'entree';
            //redirect to notification success
            header('Location: ' . $_SERVERURLROOT);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

    exit;
}
?>