<?php
class User
{
   public $conn;
   public function __construct()
   {
      $this->conn = mysqli_connect('localhost', 'root', '', 'shop');
      if (!$this->conn) {
         die(mysqli_connect_error());
      }
   }
   public function registration($username, $email, $password)
   {
      $query = "INSERT INTO `user` VALUES (NULL,'$username','$email','$password')";
      $res = mysqli_query($this->conn, $query);
   }
   public function check_user_email($email)
   {
      $query = "SELECT * FROM `user` WHERE `e-mail`='$email'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = '1';
      } else {
         return $result = '0';
      }
   }
   public function check_user_username($username)
   {
      $query = "SELECT * FROM `user` WHERE `username`='$username'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = '1';
      } else {
         return $result = '0';
      }
   }
   public function check_user_login($username, $password)
   {
      $query = "SELECT 'USERNAME','PASSWORD' FROM `user` WHERE `username`='$username' AND `password` ='$password'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = '1';
      } else {
         return $result = '0';
      }
   }
}
$UserModel = new User();
