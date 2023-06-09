<?php
include '../model/RegistrationModel.php';
if (isset($_POST['action'])) {
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = sha1($_POST['username']);
   $person = $user->register($username, $email, $password);
}
