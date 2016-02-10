$(function() {
	
			function enableSubmit(){
				if($emailStatus && $passwordStatus)
					$(".login-submit").button("enable");
				
			};
	
	
	
			$( "#check" ).button();
			$( ".login-button, .login-bigbutton, .login-submit" )
				.button();
			$(".login-submit").button("disable");
			$emailStatus = false;
			$passwordStatus = false;
			$(".error").dialog();	
			$("#email").blur(function(){
				var email = $("#email").val();
				if(email.length < 4 || !email.match(/[\d\w\-\_\.]+@[\d\w\-\_\.]+\.[\w]{2,4}/i)){
					$(".login-submit").button("disable");
					$("#email").css({'border-color': 'red'});
					$("#email-label").show("blind",1000);
					setTimeout("$('#email-label').hide('blind',2000);",1000);
				}else{
					$emailStatus = true;
					$("#email").css({'border-color':'green'});
					enableSubmit();
				}
			});

			$("#password").blur(function(){
				var password = $("#password").val();
				if(password.length < 6){
					$(".login-submit").button("disable");
					$("#password").css({'border-color': 'red'});
					$("#password-label").show("blind",1000);
					setTimeout("$('#password-label').hide('blind',2000);",1000);
				}else{
					$passwordStatus = true;
					$("#password").css({'border-color':'green'});
					enableSubmit();
				}
			})
		});