<?php
session_start();
include '../model/UserModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'add') {

   $username = $_POST['username'];
   $prodId = $_POST['prodId'];

   $check_cart = $UserModel->check_cart($username, $prodId);

   if ($check_cart > 0) {
      $quantity = 1;
      $cart_update = $UserModel->cart_update($username, $prodId, $quantity);
      if ($cart_update) {
         header('location:../view/userLogin.php');
         $returnArr['action'] = 1;
         $returnArr['message'] = 'updated successful';
      } else {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'updated failed';
      }
   } else {
      $add_carts = $UserModel->add_carts($username, $prodId);
      if ($add_carts) {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'created failed';
      } else {
         $returnArr['action'] = 1;
         $returnArr['message'] = 'created successful';
      }
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'plus') {
   $username = $_POST['username'];
   $prodId = $_POST['prodId'];
   $quantity = 1;
   $cart_quantity_update_plus = $UserModel->cart_quantity_update_plus($username, $prodId, $quantity);
   if ($cart_quantity_update_plus) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'updated successful';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'updated failed';
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'minus') {
   $username = $_POST['username'];
   $prodId = $_POST['prodId'];
   $quantity = 1;
   $cart_quantity_update_minus = $UserModel->cart_quantity_update_minus($username, $prodId, $quantity);
   if ($cart_quantity_update_minus) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'updated successful';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'updated failed';
   }
   echo json_encode($returnArr);
}
if (isset($_POST['action']) && $_POST['action'] == 'count') {
   $username = $_POST['username'];
   $prodId = $_POST['prodId'];
   $count = $_POST['value'];
   $quantity = $count;
   $cart_quantity_update = $UserModel->cart_quantity_update($username, $prodId, $quantity);
   if ($cart_quantity_update) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'updated successful';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'updated failed';
   }
   echo json_encode($returnArr);
}
