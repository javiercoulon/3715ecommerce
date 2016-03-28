<?php

session_start();

    require_once '../../constants.php';
    unset($_SESSION['USER_ID']);
    unset($_SESSION['LOGGED_IN']);
    unset($_SESSION["selection"]);
    header('Location: ' . $_SERVERURLROOT);

?>