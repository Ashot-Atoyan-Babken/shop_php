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
}
$user = new Register();
