<?php
session_start();
include '../model/AdminModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'confirm') {
   $prod_id = $_POST['prod_id'];
   $email = $_POST['e_mail'];
   $confirm_order = $Admin->confirm_order($prod_id);

   $to = trim($email);
   $from = 'ashot-atoyan@mail.ru';
   $header = "dear $to, your order has been confirmed, you will receive your goods soon" . "\r\n" .  "with love $from";
   mail($to, $password, $header);
}