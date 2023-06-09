/****Verify */
let userNameVerify = /^[A-Za-z][A-Za-z0-9]{7,18}$/
let emailVerify = /[A-Za-z0-9-_]+@.*[a-z]+\..*[a-z]$/
let passwordVerify = /^[A-Z][a-z0-9]{6,20}$/


$('.register').on('click', function (event) {
   event.preventDefault();
   let username = $('#username').val();
   let email = $('#your_email').val();
   let password = $('#password').val();
   if (userNameVerify.test($('#username').val()) && emailVerify.test($('#your_email').val()) && passwordVerify.test($('#password').val()) && $('#password').val() === $('#comfirm_password').val()) {
      $('.message').fadeIn(3000).text("you have successfully registered").fadeOut(3000).css({
         'display': 'flex',
         'justify-content': 'center',
         'align-items': 'center',
         'width': '300px',
         'height': '40px',
         'margin': '0 auto 25px',
         'border-radius': '5px',
         'border': '1px solid lightgreen',
         'background-color': 'lightgreen',
      })
      $.ajax({
         url: '../controller/RegistrationController.php',
         type: 'POST',
         data: {
            username,
            email,
            password,
            action: 'action',
         },
         success: function (data) {
            location.reload();
         }
      })
   } else {
      $('.message').fadeIn(3000).text("something went wrong please check the input data").fadeOut(3000).css({
         'display': 'flex',
         'justify-content': 'center',
         'align-items': 'center',
         'width': '300px',
         'height': '40px',
         'margin': '0 auto 25px',
         'border-radius': '5px',
         'border': '1px solid red',
         'background-color': 'red',
      })
   }
})