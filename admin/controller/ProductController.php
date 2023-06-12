<?php
session_start();
include '../model/AdminModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'add_prod') {
   $prod_name = $_POST['prod_name'];
   $prod_price = $_POST['prod_price'];
   $prod_desc = $_POST['prod_description'];
   $prod_img = $_POST['prod_image'];
   $id = $_POST['id'];
   if ($prod_name != '' && $prod_price != '' && $prod_desc != '' && $prod_img != '') {
      $create_product = $Admin->create_product($prod_img, $prod_name, $prod_price, $prod_desc, $id);
      if ($create_product > 0) {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'Product Not Added';
      } else {
         $returnArr['action'] = 1;
         $returnArr['message'] = 'Product Added Successfully';
      }
   } else if (empty($prod_name)) {
      $returnArr['action'] = 2;
      $returnArr['message'] = 'Please Enter Product Name';
   } else if (empty($prod_price)) {
      $returnArr['action'] = 3;
      $returnArr['message'] = 'Please Enter Product Price';
   } else if (empty($prod_desc)) {
      $returnArr['action'] = 4;
      $returnArr['message'] = 'Please Enter Product Description';
   } else if (empty($prod_img)) {
      $returnArr['action'] = 5;
      $returnArr['message'] = 'Please Enter Product Image';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = "Something went wrong please check the input data";
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'update_product') {
   $id = $_POST['id'];
   $prod_name = $_POST['prod_name'];
   $prod_price = $_POST['prod_price'];
   $prod_desc = $_POST['prod_description'];
   $prod_image = $_POST['prod_image'];
   $update_product = $Admin->update_product($prod_image, $prod_name, $prod_price, $prod_desc, $id);
   if ($update_product) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'Product Updated Successfully';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'Product Not Updated';
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'delete_prod') {
   $id = $_POST['id'];
   $delete_prod = $Admin->delete_prod($id);
   if ($delete_prod) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'Product Deleted Successfully';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'Product  Not Deleted';
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'edit_prod') {
   $id = $_POST['id'];
   $edit_prod = $Admin->edit_prod($id);
   echo json_encode($edit_prod);
}
