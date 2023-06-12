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
   public function registration($username, $email, $password)
   {
      $query = "INSERT INTO `users`(`id`, `USERNAME`, `E-MAIL`, `PASSWORD`) VALUES (NULL,'$username','$email','$password')";
      $res = mysqli_query($this->conn, $query);
   }
   public function check_email($email)
   {
      $query = "SELECT * FROM `users` WHERE `E-MAIL`='$email'";
      $res = mysqli_query($this->conn, $query);
      if (mysqli_num_rows($res) > 0) {
         return $result = '1';
      } else {
         return $result = '0';
      }
   }
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
   public function add_category($category)
   {
      $query = "INSERT INTO `categories` (`id`, `title`) VALUES (NULL,'$category')";
      $res = mysqli_query($this->conn, $query);
   }
   public function show_all_active_categories()
   {
      $query = "SELECT * FROM categories WHERE `category_status`='ACTIVE'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
   public function update_category($id, $category)
   {
      $query = "UPDATE `categories` SET `title`='$category' WHERE `id`='$id'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function delete_category($id)
   {
      $query = "UPDATE `categories` SET `category_status`='PASSIVE' WHERE `id`='$id'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function all_products($id)
   {
      $query = "SELECT * FROM product WHERE `product_status`='ACTIVE' AND `category_id`='$id'";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
   public function create_product($prod_img, $prod_name, $prod_price, $prod_desc, $id)
   {
      $query = "INSERT INTO `product`(`id`, `product_image`, `product_name`, `product_price`, `product_content`, `product_status`, `category_id`)
       VALUES (NULL,'$prod_img','$prod_name','$prod_price','$prod_desc',DEFAULT,'$id')";
      $res = mysqli_query($this->conn, $query);
   }
   public function update_product($prod_image, $prod_name, $prod_price, $prod_desc, $id)
   {
      $query = "UPDATE `product` SET `product_image`='$prod_image',`product_name`='$prod_name',
      `product_price`='$prod_price',`product_content`='$prod_desc' WHERE `id`='$id'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function delete_prod($id)
   {
      $query = "UPDATE `product` SET `product_status`='PASSIVE' WHERE `id`='$id'";
      $res = mysqli_query($this->conn, $query);
      return $res;
   }
   public function edit_prod($id)
   {
      $query = "SELECT `product_image`, `product_name`, `product_price`, `product_content` FROM `product` WHERE `id`=$id";
      $res = mysqli_query($this->conn, $query);
      $result = mysqli_fetch_all($res, MYSQLI_ASSOC);
      return $result;
   }
}
$Admin = new Register();
