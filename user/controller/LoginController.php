<?php
include '../model/UserModel.php';

session_start();
if (isset($_POST['login'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];
   if ($username != '' && $password != '') {
      $check_user_login = $UserModel->check_user_login($username, sha1($password));
      if ($check_user_login <= 0) {
         $_SESSION['action'] = 'Failed';
      } else {
         $_SESSION['username'] = $username;
         header('location:../index.php');
      }
   } else {
      header('location:../view/userLogin.php');
      $_SESSION['action'] = 'please fill all fields';
   }
}
