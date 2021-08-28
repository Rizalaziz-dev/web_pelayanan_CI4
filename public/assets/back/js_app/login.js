$(document).ready(function () {
  $.validator.setDefaults({
    submitHandler: function () {
      login();
    }
  });
  $('#loginForm').validate({
    rules: {
      email: {
        required: true,
        email: true,
      },
      password: {
        required: true,
        minlength: 5
      },
      terms: {
        required: true
      },
    },
    messages: {
      email: {
        required: "Please enter a email address",
        email: "Please enter a vaild email address"
      },
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
      terms: "Please accept our terms"
    },
    errorElement: 'span',
    errorPlacement: function (error, element) {
      error.addClass('invalid-feedback');
      element.closest('.input-group').append(error);
    },
    highlight: function (element, errorClass, validClass) {
      $(element).addClass('is-invalid');
    },
    unhighlight: function (element, errorClass, validClass) {
      $(element).removeClass('is-invalid');
    }
  });
});

function login()
{
	var email = $('#email').val();
	var password = $('#password').val();
		
	if(email != '' && password != '')
	{
		var btn_title = $('#btnLogin').html();
		$('#btnLogin').html('Sign in process..');
		$('#btnLogin').prop('disabled', true);
				
		$.ajax({
			url: base_url + 'login/check',
			type: 'POST',
			dataType: 'JSON',
			data: {
				email: email,
				password: password
			},
			success: function(response) {
				
				$('#btnLogin').html(btn_title);
				$('#btnLogin').prop('disabled', false);
				if(response.status == true) {
					toastr.success(response.message)
					setTimeout(function(){
						window.location.reload();
					},500);
				}else{
					toastr.error(response.message);
				}
			}
		}); 
	}
}