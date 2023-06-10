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
})
