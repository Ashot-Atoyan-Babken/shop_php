<?php
session_start();
include '../model/AdminModel.php';



$userNameVerify = "/^[a-z\d_]{5,20}$/i";
$emailVerify = "/\w+[\@]\w+[\.]\w+/";
$passwordVerify = "/^[a-z\d_]{5,20}$/i";

if (isset($_POST['action']) && $_POST['action'] == 'registration') {


   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $comf = $_POST['comf'];

   if (
      $username != '' && $email != '' && $password != ''
      && $password == $comf
      && preg_match_all($userNameVerify, $username)
      && preg_match_all($emailVerify, $email)
      && preg_match_all($passwordVerify, $password)
   ) {
      $check_email = $Admin->check_email($email);
      if ($check_email > 0) {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'This email already exists. Please try using a different email.';
      } else {
         $returnArr['action'] = 1;
         $person = $Admin->registration($username, $email, sha1($password));
         $returnArr['message'] = 'You have successfully registered';
      }
   } else if (empty($username)) {
      $returnArr['action'] = 2;
      $returnArr['message'] = 'Please fill in the username field ';
   } else if (empty($email)) {
      $returnArr['action'] = 3;
      $returnArr['message'] = 'Please fill in the email field ';
   } else if (empty($password)) {
      $returnArr['action'] = 4;
      $returnArr['message'] = "Please fill in the password field";
   } else if (empty($comf)) {
      $returnArr['action'] = 5;
      $returnArr['message'] = "Please fill in the confirm password field";
   } else if ($password != $comf) {
      $returnArr['action'] = 6;
      $returnArr['message'] = "The password doesn't match";
   } else {
      $returnArr['action'] = 0;
      $returnArr['message'] = "Something went wrong please check the input data";
   }

   echo json_encode($returnArr);
}
