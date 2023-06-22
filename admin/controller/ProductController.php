<?php
session_start();
include '../model/AdminModel.php';

if (isset($_POST['add_prod'])) {
   $prod_name = $_POST['prod_name'];
   $prod_price = $_POST['prod_price'];
   $prod_desc = $_POST['prod_desc'];
   $prod_img = $_FILES['prod_img']['name'];
   $tmp_name = $_FILES['prod_img']['tmp_name'];
   $id = $_POST['catId'];
   if (
      $prod_name != ''
      && $prod_price != ''
      && $prod_desc != ''
      && $prod_img != ''
   ) {
      $create_product = $Admin->create_product($prod_img, $prod_name, $prod_price, $prod_desc, $id);
      copy($tmp_name, '../asset/img/products/' . $prod_img);
      if (!$create_product) {
         $_SESSION['status'] = 'success';
         $_SESSION['message'] = 'created successful';
      } else {
         $_SESSION['status'] = 'error';
         $_SESSION['message'] = 'created failed';
      }
   } else if (empty($prod_name)) {
      $_SESSION['status'] = 'error';
      $_SESSION['message'] = 'Please Enter Product Name';
   } else if (empty($prod_price)) {
      $_SESSION['status'] = 'error';
      $_SESSION['message'] = 'Please Enter Product Price';
   } else if (empty($prod_desc)) {
      $_SESSION['status'] = 'error';
      $_SESSION['message'] = 'Please Enter Product Description';
   } else if (empty($prod_img)) {
      $_SESSION['status'] = 'error';
      $_SESSION['message'] = 'Please Enter Product Image';
   } else {
      $_SESSION['status'] = 'error';
      $_SESSION['message'] = "Something went wrong please check the input data";
   }
   header("location:../view/product.php?id=$id");
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
