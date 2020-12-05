<?php
    //Start session
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    //Load Setting
    require_once('config/Constant.php');
    require_once('config/Flash.php');
    require_once('config/Routes.php');
    require_once('database/DBO.php');
    require_once('core/App.php');
?>