$(function () {
   $('.register').on('click', function (event) {
      event.preventDefault();
      let username = $('#username').val();
      let email = $('#your_email').val();
      let password = $('#password').val();
      let comf = $('#comfirm_password').val();
      $.ajax({
         url: '../controller/RegistrationController.php',
         type: 'POST',
         data: {
            username,
            email,
            password,
            comf,
            dataType: 'json',
            action: 'registration',
         },
         success: function (data) {
            let json = JSON.parse(data);
            if (json.action == 2) {
               $('#username_alert').html(json.message)
               $('#username_alert').fadeIn()
               $('#username_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 3) {
               $('#email_alert').html(json.message)
               $('#email_alert').fadeIn()
               $('#email_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 4) {
               $('#password_alert').html(json.message)
               $('#password_alert').fadeIn()
               $('#password_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 5) {
               $('#comf_pass_alert').html(json.message)
               $('#comf_pass_alert').fadeIn()
               $('#comf_pass_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 6) {
               $('#comf_pass_alert').html(json.message)
               $('#comf_pass_alert').fadeIn()
               $('#comf_pass_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 0) {
               $('#email_not_verify').html(json.message)
               $('#email_not_verify').fadeIn()
               $('#email_not_verify').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 1) {
               $('#email_verify').html(json.message)
               $('#email_verify').fadeIn()
               $('#email_verify').fadeOut(2000)
               setTimeout(() => {
                  location.href = '../view/login.php'
               }, 2500);
            }
         }
      })
   })
   $('.login').on('click', function () {
      let username = $('.username').val();
      let password = $('.password').val();
      $.ajax({
         url: '../controller/AdminLoginController.php',
         method: 'post',
         data: {
            username,
            password,
            dataType: 'json',
            action: 'login',
         },
         success: function (data) {
            let jsonparse = JSON.parse(data);
            if (jsonparse.action == 1) {
               $('.alert-success').html(jsonparse.message)
               $('.alert-success').fadeIn()
               $('.alert-success').fadeOut(2000)
               setTimeout(() => {
                  location.href = '../index.php'
               }, 2500);
            } else if (jsonparse.action == 0) {
               $('.alert-danger').html(jsonparse.message)
               $('.alert-danger').fadeIn()
               $('.alert-danger').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            }
         }
      })

   })
   $('.category').on('click', function () {
      let category = $('#category').val();
      $.ajax({
         url: '../controller/CategoryController.php',
         method: 'post',
         data: {
            category,
            dataType: 'json',
            action: 'create_category',
         },
         success: function (data) {
            let json = JSON.parse(data);
            if (json.action == 1) {
               $('.alert-success').html(json.message)
               $('.alert-success').fadeIn()
               $('.alert-success').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (json.action == 0) {
               $('.alert-danger').html(json.message)
               $('.alert-danger').fadeIn()
               $('.alert-danger').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            }
         }
      })
   })
   $('.update_cat').on('click', function () {
      let category_name = $(this).closest('tr').find('.category_name').text();
      let id = $(this).data('id');
      $.ajax({
         url: 'controller/CategoryController.php',
         method: 'post',
         dataType: 'json',
         data: {
            category_name,
            id,
            action: 'update'
         },
         success: function (data) {
            if (data['action'] == '1') {
               $('.alert-success').html(data['message']);
               $('.alert-success').fadeIn();
               $('.alert-success').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            } else {
               $('.alert-danger').html(data['message']);
               $('.alert-danger').fadeIn();
               $('.alert-danger').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            }
         }
      })

   })
   $('.delete_cat').on('click', function () {
      let id = $(this).data('id');
      $.ajax({
         url: 'controller/CategoryController.php',
         method: 'post',
         dataType: 'json',
         data: {
            id,
            action: 'delete'
         },
         success: function (data) {
            if (data['action'] == '1') {
               $('.alert-success').html(data['message']);
               $('.alert-success').fadeIn();
               $('.alert-success').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            } else {
               $('.alert-danger').html(data['message']);
               $('.alert-danger').fadeIn();
               $('.alert-danger').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            }
         }
      })

   })
   $('.add_prod').on('click', function () {
      let prod_name = $('#Product_Name').val();
      let prod_price = $('#Product_Price').val();
      let prod_description = $('#Description').val();
      let prod_image = $('input[type=file]').val().replace(/.*(\/|\\)/, '');
      $.ajax({
         url: '../controller/ProductController.php',
         method: 'post',
         dataType: 'json',
         data: {
            prod_name,
            prod_price,
            prod_description,
            prod_image,
            action: 'add_prod',
         },
         success: function (data) {
            console.log(data);
            if (data['action'] == 2) {
               $('#name_alert').html(data['message'])
               $('#name_alert').fadeIn()
               $('#name_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (data['action'] == 3) {
               $('#price_alert').html(data['message'])
               $('#price_alert').fadeIn()
               $('#price_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (data['action'] == 4) {
               $('#desc_alert').html(data['message'])
               $('#desc_alert').fadeIn()
               $('#desc_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (data['action'] == 5) {
               $('#img_alert').html(data['message'])
               $('#img_alert').fadeIn()
               $('#img_alert').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (data['action'] == 0) {
               $('#email_not_verify').html(data['message'])
               $('#email_not_verify').fadeIn()
               $('#email_not_verify').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            } else if (data['action'] == 1) {
               $('#email_verify').html(data['message'])
               $('#email_verify').fadeIn()
               $('#email_verify').fadeOut(2000)
               setTimeout(() => {
                  location.reload()
               }, 2500);
            }
         }
      })
   })
   $('.update_prod').on('click', function () {
      let product_name = $('#new_Product_Name').val();
      let product_price = $('#new_Product_Price').val();
      let product_content = $('#new_Description').val();
      let prod_image = $('#new_formFile').val().replace(/.*(\/|\\)/, '');
      let prod_option = $('#select option:selected').html();
      let id = $(this).data('id');
      $.ajax({
         url: '../controller/ProductController.php',
         method: 'post',
         dataType: 'json',
         data: {
            product_name,
            product_price,
            product_content,
            prod_image,
            prod_option,
            id,
            action: 'update_prod'
         },
         success: function (data) {
            console.log(data);
            if (data['action'] == '1') {
               $('.alert-success').html(data['message']);
               $('.alert-success').fadeIn();
               $('.alert-success').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            } else {
               $('.alert-danger').html(data['message']);
               $('.alert-danger').fadeIn();
               $('.alert-danger').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            }
         }
      })

   })
   $('.delete_prod').on('click', function () {
      let id = $(this).data('id');
      $.ajax({
         url: '../controller/ProductController.php',
         method: 'post',
         dataType: 'json',
         data: {
            id,
            action: 'delete_prod'
         },
         success: function (data) {
            if (data['action'] == '1') {
               $('#delete_succ').html(data['message']);
               $('#delete_succ').fadeIn();
               $('#delete_succ').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            } else {
               $('#delete_failed').html(data['message']);
               $('#delete_failed').fadeIn();
               $('#delete_failed').fadeOut(2500);
               setTimeout(function () {
                  location.reload();
               }, 1000);
            }
         }
      })

   })
})
