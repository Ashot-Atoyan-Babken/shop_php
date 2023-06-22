<?php
session_start();
include '../model/UserModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'create-order') {
   $ids = $_POST['ids'];
   $values = $_POST['values'];
   $username = $_POST['username'];
   $combinedArray = array_combine($ids, $values);
   foreach ($combinedArray as $id => $value) {
      $create_order = $UserModel->create_order($id, $value, $username);
      $delete_carts_item = $UserModel->delete_carts_item($id);
   }
}
if (isset($_POST['action']) && $_POST['action'] == 'remove') {
   $id = $_POST['id'];
   $remove_order = $UserModel->remove_order($id);
}
if (isset($_POST['action']) && $_POST['action'] == 'send_order') {
   $username = $_POST['username'];
   $send_order = $UserModel->send_order($username);


   $to = "ashot-atoyan@mail.ru";
   $from = trim($username);
   $header = "From $from" . "\r\n" . "you have new order";
   mail($to, $password, $header);
}
