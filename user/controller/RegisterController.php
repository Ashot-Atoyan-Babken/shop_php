<?php
session_start();

$userNameVerify = "/^[a-z\d_]{5,20}$/i";
$passwordVerify = "/^[a-z\d_]{5,20}$/i";



include '../model/UserModel.php';
if (isset($_POST['register'])) {
   $username = $_POST['username'];
   $email = $_POST['your_email'];
   $password = $_POST['password'];
   $comfirm_password = $_POST['comfirm_password'];
   if ($username !== '' && $email !== '' && $password !== '' && $comfirm_password !== '' && $password == $comfirm_password) {
      if (
         preg_match_all($userNameVerify, $username)
         && preg_match_all($passwordVerify, $password)
      ) {
         $check_user_username = $UserModel->check_user_username($username);
         if ($check_user_username <= 0) {
            $check_user_email = $UserModel->check_user_email($email);
            if ($check_user_email <= 0) {
               $user_register = $UserModel->registration($username, $email, sha1($password));
               if (!$user_register) {
                  header('location:../view/userLogin.php');
               } else {
                  header('location:../view/userRegister.php');
                  $_SESSION['error'] = 'Sorry, an error occurred during registration. Please double-check the entered information and try again.';
               }
            } else {
               header('location:../view/userRegister.php');
               $_SESSION['error'] = 'Sorry, an error occurred. An account with this email already exists.';
            }
         } else {
            header('location:../view/userRegister.php');
            $_SESSION['error'] = 'Sorry, an error occurred. An account with this username already exists.';
         }
      } else if (!preg_match_all($userNameVerify, $username)) {
         header('location:../view/userRegister.php');
         $_SESSION['error'] = 'Sorry, an error occurred. Username must be between 5 and 20';
      } else if (!preg_match_all($passwordVerify, $password)) {
         header('location:../view/userRegister.php');
         $_SESSION['error'] = 'Sorry, an error occurred. Password must be between 5 and 20';
      }
   } else if (empty($username)) {
      header('location:../view/userRegister.php');
      $_SESSION['error'] = 'please input username field';
   } else if (empty($email)) {
      header('location:../view/userRegister.php');
      $_SESSION['error'] = 'please input email field';
   } else if (empty($password)) {
      header('location:../view/userRegister.php');
      $_SESSION['error'] = 'please input password field';
   } else if (empty($comfirm_password)) {
      header('location:../view/userRegister.php');
      $_SESSION['error'] = 'please input comfirm_password field';
   } else if ($password != $comfirm_password) {
      header('location:../view/userRegister.php');
      $_SESSION['error'] = 'password and comfirm_password not match';
   }
}
