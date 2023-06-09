<?php
session_start();
include '../model/RegistrationModel.php';

$userNameVerify = "/^[A-Za-z][A-Za-z0-9]{5-31}$/";
$emailVerify = "/\w+[\@]\w+[\.]\w+/";
$passwordVerify = "/^[A-Z][a-z0-9]{5-20}$/";

if (isset($_POST['action']) && $_POST['action'] == 'registration') {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $comf = $_POST['comf'];
   if (
      $username != "" && $email != "" && $password != "" && $password == $comf
   ) {
      $check_email = $Admin->check($email);
      if ($check_email > 0) {
         $returnArr['action'] = 1;
         $returnArr['message'] = 'You have successfully registered';
         $person = $Admin->register($username, $email, sha1($password));
      } else {
         $returnArr['action'] = 0;
         $returnArr['message'] = 'This email already exists try to change something';
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
   } else if ($password !== $comf) {
      $returnArr['action'] = 6;
      $returnArr['message'] = "The password doesn't match";
   }

   echo json_encode($returnArr);
}
//stugumner@ controller
// emali uniqid()


// && preg_match_all($userNameVerify, $username) && preg_match_all($emailVerify, $email)
// && preg_match_all($passwordVerify, $password)