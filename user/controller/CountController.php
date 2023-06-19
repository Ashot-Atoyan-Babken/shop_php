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
