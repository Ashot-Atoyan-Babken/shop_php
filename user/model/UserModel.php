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
   public function show_all_category()
   {
      $query = "SELECT * FROM `categories` WHERE `category_status`='ACTIVE'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
   public function show_all_prod($catId)
   {
      $query = "SELECT * FROM `product` WHERE `product_status`='ACTIVE' AND `category_id`='$catId'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }

   public function add_carts($username, $prodId)
   {
      $query = "INSERT INTO `carts` VALUES (NULL,'$prodId', DEFAULT ,'$username')";
      $res = mysqli_query($this->conn, $query);
   }
   public function check_cart($username, $prodId)
   {
      $query = "SELECT * FROM `carts` WHERE `username` = '$username' AND `product_id` = '$prodId'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = 1;
      } else {
         return $result = 0;
      }
   }
   public function cart_update($username, $prodId, $quantity)
   {
      $query = "UPDATE `carts` SET `quantity`= quantity + $quantity WHERE `product_id`='$prodId' AND `username`='$username'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function get_all_products_in_cart()
   {
      $query = "SELECT * FROM `carts`";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function get_all_products($prodId)
   {
      $query = "SELECT * FROM `product` WHERE `product_id`='$prodId'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
   public function cart_quantity_update_plus($username, $prodId, $quantity)
   {
      $query = "UPDATE `carts` SET `quantity`= quantity + $quantity WHERE `product_id`='$prodId' AND `username`='$username'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function cart_quantity_update_minus($username, $prodId, $quantity)
   {
      $query = "UPDATE `carts` SET `quantity`= quantity - $quantity WHERE `product_id`='$prodId' AND `username`='$username'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function cart_quantity_update($username, $prodId, $quantity)
   {
      $query = "UPDATE `carts` SET `quantity` = $quantity WHERE `product_id` = '$prodId' AND `username`='$username'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function create_order($id, $value, $username)
   {
      $query = "INSERT INTO `orders` VALUES (NULL,'$id','$value','$username', DEFAULT, DEFAULT)";
      $res = mysqli_query($this->conn, $query);
   }
   public function delete_carts_item($id)
   {
      $query = "DELETE FROM `carts` WHERE `product_id` = '$id'";
      $res = mysqli_query($this->conn, $query);
   }
   public function get_all_products_in_order_on_false()
   {
      $query = "SELECT * FROM `orders` WHERE `com_or_pend` = 'False'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
   public function remove_order($id)
   {
      $query = "DELETE FROM `orders` WHERE `order_product_id` = $id";
      $res = mysqli_query($this->conn, $query);
   }
   public function send_order($username)
   {
      $query = "UPDATE `orders` SET `com_or_pend` = 'True' WHERE `username`='$username' AND `com_or_pend` = 'False' AND `order_status` = 'Active'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function get_all_products_in_order_on_true()
   {
      $query = "SELECT * FROM `orders` WHERE `com_or_pend` = 'True'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
}
$UserModel = new User();
