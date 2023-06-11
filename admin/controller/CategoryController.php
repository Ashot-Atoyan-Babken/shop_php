<?php
session_start();
include '../model/AdminModel.php';

if (isset($_POST['action']) && $_POST['action'] == 'create_category') {
   $category = $_POST['category'];
   if ($category != '') {
      $create_category = $Admin->add_category($category);
      if ($create_category > 0) {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'Category Not Added';
      } else {
         $returnArr['action'] = 1;
         $returnArr['message'] = 'Category Added Successfully';
      }
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = "Please enter a category name";
   }

   echo json_encode($returnArr);
}


if (isset($_POST['action']) && $_POST['action'] == 'update') {
   $id = $_POST['id'];
   $category = $_POST['category_name'];
   $update_category = $Admin->update_category($id, $category);
   if ($update_category) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'Category Updated Successfully';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'Category Not Updated';
   }
   echo json_encode($returnArr);
}

if (isset($_POST['action']) && $_POST['action'] == 'delete') {
   $id = $_POST['id'];
   $delete_category = $Admin->delete_category($id);
   if ($delete_category) {
      $returnArr['action'] = 1;
      $returnArr['message'] = 'Category Deleted Successfully';
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'Category Not Deleted';
   }
   echo json_encode($returnArr);
}
