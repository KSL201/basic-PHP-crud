<?php
session_start();
include ('../includes/init.php');
include ('../includes/header.php');

$includeFile = 'login';

if (isset($_GET['page'] ) ) {
    $includeFile = $_GET['page'];
}

//checks if file exist else you wil get redirect to error.php
if (is_file('../pages/'. $includeFile . '.php')) {
    include '../pages/'. $includeFile . '.php';
} else {
    include '../pages/error.php';
}
