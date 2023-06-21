<?php
include '../model/AdminModel.php';
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../asset/img/svg/product.svg" type="image/x-icon">
   <title>Product</title>
</head>

<body>
   <?php
   include 'header.php';
   ?>

   <div class="mx-auto mt-5 w-25 p-3" style="border:1px solid #000; border-radius: 15px; box-shadow: 0px 0px 33px 0px rgba(0,0,0,1)">
      <div class="row ">
         <div class="col">
            <label for="Product_Name" class="form-label">Name</label>
            <input type="text" class="form-control" id="Product_Name" name="prod_name" placeholder="Product Name">
            <div class="alert alert-danger" role="alert" id="name_alert" style="display:none;"></div>
         </div>
         <div class="col">
            <label for="Product_Price" class="form-label">Price</label>
            <input type="number" class="form-control" id="Product_Price" name="prod_price" placeholder="Product Price">
            <div class="alert alert-danger" role="alert" id="price_alert" style="display:none;"></div>
         </div>
      </div>
      <div class="mb-3 mt-5">
         <label for="Description" class="form-label">Description</label>
         <textarea class="form-control" id="Description" rows="3" name="prod_desc" placeholder="Product Description"></textarea>
         <div class="alert alert-danger" role="alert" id="desc_alert" style="display:none;"></div>
      </div>
      <div class="mb-3 mt-3">
         <label for="formFile" class="form-label">image</label>
         <input type="file" name="prod_img" id="formFile">
         <div class="alert alert-danger" role="alert" id="img_alert" style="display:none;"></div>
      </div>
   </div>
   <div class="mb-3 mx-auto w-25 text-center">
      <button type="submit" class="btn btn-success mt-3  mx-auto add_prod">ADD PRODUCT</button>
   </div>

   <div class="alert alert-danger" role="alert" id="email_not_verify" style="display:none;"></div>
   <div class="alert alert-success mx-auto" role="alert" id="email_verify" style="display:none;"></div>
   <?php
   $all_products = $Admin->all_products($id);
   if (count($all_products) > 0) { ?>
      <table class="table table-hover mx-auto mt-5" style="width: 80%;border:1px solid #000">
         <thead class="thead-dark">
            <tr>
               <th class="text-center">Image</th>
               <th class="text-center">Name</th>
               <th class="text-center">Price</th>
               <th class="text-center">Description</th>
               <th class="text-center">Status</th>
               <th class="text-center">Action</th>
            </tr>
         </thead>
         <tbody>
            <?php
            foreach ($all_products as $product) { ?>
               <tr>
                  <td class="product_image text-center"><img class="img-fluid" style="width:50px;height:50px;" src="../asset/img/products/<?= $product['product_image'] ?>" alt="<?= $product['product_image'] ?>">
                  </td>
                  <td class="product_name text-center"><?= $product['product_name'] ?></td>
                  <td class="product_price text-center"><?= $product['product_price'] ?> USD</td>
                  <td class="product_content text-center"><?= $product['product_content'] ?></td>
                  <td class="product_status text-center"><?= $product['product_status'] ?></td>
                  <td class="text-center">
                     <button type="button" class="btn btn-primary edit_prod" data-id="<?= $product['product_id'] ?>" data-toggle="modal" data-target="#Modal">
                        EDIT
                     </button>
                     <button type="button" class="btn btn-danger delete_prod" data-id="<?= $product['product_id'] ?>">DELETE</button>
                  </td>
               </tr> <?php  } ?>
         </tbody>
      </table>
      <div class="alert alert-danger" role="alert" id="delete_failed" style="display:none;"></div>
      <div class="alert alert-success mx-auto" role="alert" id="delete_succ" style="display:none;"></div>
   <?php } else { ?>
      <p class="text-center">NO result to display</p>
   <?php } ?>
   <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
         <div class="modal-content">
            <div class="modal-header">
               <h5 class="modal-title" id="ModalLabel"></h5>
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
               </button>
            </div>
            <div class="modal-body">
               <div class="row">
                  <div class="col" id="col">
                     <label for="new_Product_Name" class="form-label">Name</label>
                     <input type="text" class="form-control" id="new_Product_Name" name="prod_name" placeholder="Product Name">
                  </div>
                  <div class="col">
                     <label for="new_Product_Price" class="form-label">Price</label>
                     <input type="number" class="form-control" id="new_Product_Price" name="prod_price" placeholder="Product Price">
                  </div>
               </div>
               <div class="mb-3 ">
                  <label for="Product Description" class="form-label">Description</label>
                  <textarea class="form-control" id="new_Description" rows="3" name="prod_desc" placeholder="Product Description"></textarea>
               </div>
               <div class="mb-3">
                  <label for="new_formFile" class="form-label">Image</label>
                  <input type="file" name="prod_img" id="new_formFile">
               </div>
            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
               <button type="submit" class="btn btn-primary update_product">Save
                  changes</button>
            </div>
            <div class="alert alert-danger" role="alert" id="up_fa" style="display:none;"></div>
            <div class="alert alert-success mx-auto" role="alert" id="up_suc" style="display:none;"></div>
         </div>
      </div>
   </div>
</body>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="../asset/js/script.js"></script>

</html>