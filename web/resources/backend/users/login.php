<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once '../../constants.php';
    require_once $_RESOURCESPATH . 'connection.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $status = 1;
    error_reporting(E_ALL);
    if (!empty($username) && !empty($password)) {
        $result = mysqli_query($db, "SELECT user_id,email FROM fp_user where email='" . $username . "' and password='" . $password . "' limit 1;");
                               
        if ($result) { 
            if(($row=mysqli_fetch_assoc($result))){
                $_SESSION['USER_ID']=$row['user_id'];
                $_SESSION['LOGGED_IN']=true;
            }
            //echo 'entree';
            //redirect to notification success
            header('Location: ' . $_SERVERURLROOT);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
    }else{
        header('Location: ' . $_SERVER['HTTP_REFERER']);

    }
    mysqli_error($db);
    exit;
}
?>