<?php
session_start();
include '../model/AdminModel.php';


if (isset($_POST['action']) && $_POST['action'] == 'login') {
   $username = $_POST['username'];
   $password = $_POST['password'];
   if ($username != '' && $password != '') {
      $check_admin_login = $Admin->check_admin_login($username, sha1($password));
      if ($check_admin_login > 0) {
         $_SESSION['username'] = $username;
         $returnArr['action'] = 1;
         $returnArr['message'] = 'you are logged in';
      } else {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'Failed';
      }
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = 'please fill all fields';
   }

   echo json_encode($returnArr);
}
