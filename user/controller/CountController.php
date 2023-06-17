<?php
session_start();
if (!isset($_SESSION['prodId'])) {
   $_SESSION['prodId'] = array();
}

if (isset($_GET['prodId']) && is_numeric($_GET['prodId'])) {
   $prodId = $_GET['prodId'];
   $catId = $_GET['catId'];
   $_SESSION['prodIds'][] = $prodId;
}
$_SESSION['strProdIds']  = implode(' ', $_SESSION['prodIds']);
header("location:../view/userProduct.php?catId=$catId");
