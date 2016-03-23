<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
    header("Content-Type: application/json");
    require_once '../../constants.php';
    require_once $_RESOURCESPATH . 'connection.php';
    $email = $_POST['email'];
    $resp = array();
    $result = mysqli_query($db, "select count(*) as num from fp_user where email='" . $email . "'");
    $resp['state'] = 1;
    if ($result && ($row = mysqli_fetch_assoc($result))) {
        //echo 'entree';
        if($row['num']>0){
            $resp["response_code"] = 1;
        }else{
            $resp["response_code"] = 2;
        }
    } else {
        $resp["response_code"] = 2;
    }
    echo json_encode($resp);
}
?>