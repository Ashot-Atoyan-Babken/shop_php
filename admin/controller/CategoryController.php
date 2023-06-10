<?php
session_start();
include '../model/RegistrationModel.php';

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
