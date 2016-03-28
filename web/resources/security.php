<?php

//check if user is loged in (if needed)
//check if userid is valid (if needed)
//check if user is admin (if needed)



if ($_APP_LOGGEDREQUIRED) {
    if (!isset($_SESSION['LOGGED_IN']) || empty($_SESSION['LOGGED_IN'])) { 
      
        if ($APP_ASINC) {
            if (!isset($resp)) {
                $resp = array();
            }
            $resp['error'] = array('msg' => 'You  need to be logged in to proceed.', 'level' => '1');
        } else { 

            $error_message = 'You  need to be logged in to proceed.';
            include_once  $_MYSERVERFILEROOT . 'pages/error.php';
            die();
        }
        $GENERALERROR = true;
    }
}
if ($_APP_ADMINREQUIRED) {
    if (!isset($_SESSION['ADMIN_IN']) || empty($_SESSION['ADMIN_IN'])) {
        if ($APP_ASINC) {
            if (!isset($resp)) {
                $resp = array();
            }
            $resp['error'] = array('msg' => 'You  need to be logged in as admin to proceed.', 'level' => '2');
        } else {
            $error_message = 'You  need to be logged in as admin to proceed.';
            include_once  $_MYSERVERFILEROOT . 'pages/error.php';
            die();
        }
        $GENERALERROR = true;
    }
}

if ($_APP_USERIDREQUIRED) {
    if (!isset($_SESSION['USER_ID']) || empty($_SESSION['USER_ID'])) {
        if ($APP_ASINC) {
            if (!isset($resp)) {
                $resp = array();
            }
            $resp['error'] = array('msg' => 'User id not recognized!', 'level' => '2');
        } else {
            $error_message = 'User id not recognized!';
            include_once  $_MYSERVERFILEROOT . 'pages/error.php';
            die();
        }
        $GENERALERROR = true;
    }
}
?>