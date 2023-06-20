<?php
session_start();
include '../model/AdminModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'confirm') {
   $prod_id = $_POST['prod_id'];
   $confirm_order = $Admin->confirm_order($prod_id);
}
