<?php
include '../model/UserModel.php';
session_start();
if (isset($_GET['catId'])) {
   $catId = $_GET['catId'];
}
if (isset($_SESSION['username'])) {
   $username = $_SESSION['username'];
}
