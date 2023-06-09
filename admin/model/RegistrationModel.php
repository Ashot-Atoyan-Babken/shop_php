<?php
class Register
{
   public $conn;
   public function __construct()
   {
      $this->conn = mysqli_connect('localhost', 'root', '', 'shop');
      if (!$this->conn) {
         die(mysqli_connect_error());
      }
   }
   public function register($username, $email, $password)
   {
      $query = "INSERT INTO `users`(`id`, `USERNAME`, `E-MAIL`, `PASSWORD`) VALUES (NULL,'$username','$email','$password')";
      $res = mysqli_query($this->conn, $query);
   }
   // public function check($email)
   // {
   //    $res = "SELECT * FROM ";
   // }
   public function check_admin_login($username, $password)
   {
      $query = "SELECT 'USERNAME','PASSWORD' FROM users WHERE USERNAME='$username' AND PASSWORD='$password'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = '1';
      } else {
         return $result = '0';
      }
   }
}
$user = new Register();
