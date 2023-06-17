<?php
include '../model/UserModel.php';

session_start();
if (isset($_GET['arr'])) {
   $myArray = explode(' ', $_GET['arr']);
   $_SESSION['myArray'] = $myArray;
}

header('location:../view/cart.php');
