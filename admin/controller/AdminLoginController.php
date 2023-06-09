<?php
session_start();
include '../model/RegistrationModel.php';


if (isset($_POST['action']) && $_POST['action'] == 'login') {
   $username = $_POST['username'];
   $password = sha1($_POST['password']);
   if ($username != '' && $password != '') {
      $check_admin_login = $user->check_admin_login($username, $password);
      if ($check_admin_login > 0) {
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
