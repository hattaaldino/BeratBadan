<?php
    $route[''] = 'LoginController::index';
    $route['login'] = 'LoginController::login';
    $route['register'] = 'LoginController::register';
    $route['logout'] = 'LoginController::logout';
    $route['dashboard'] = 'MainController::showView';
    $route['dashboard/tambah'] = 'MainController::tambahData';
    $route['dashboard/ambil'] = 'MainController::ambilData';
?>