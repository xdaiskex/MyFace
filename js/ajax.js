$(document).ready(function(){
	$("#username").on('blur', function(event){
		event.preventDefault();
		var user = $(this).serialize();
		$.post('username.php', user, function(data){
			$("#usernameMessage").html(data);
		});
	});

	$("#password").on('blur', function(event){
		event.preventDefault();
		var user = $(this).serialize();
		$.post('password.php', user, function(data){
			$("#passwordMessage").html(data);
		});
	});

	$("#signup").on('submit', function(event){
		event.preventDefault();
		var signup = $(this).serialize();
		$.post('signup.php', signup, function(data){
			var result = $.trim(data);
			if(result == "success"){
				$("#signup").addClass("animated");
				$("#signup").addClass("bounceOut");
				setTimeout(function(){
					$("#signup").remove();
				},800);

				setTimeout(function(){
					$("#signupSuccess").css("display", "block");
					$("#signupSuccess").addClass("animated");
					$("#signupSuccess").addClass("bounceIn");
				},1200);
			}
		});
	});

	$("#login").on('submit', function(event){
		event.preventDefault();
		var login = $(this).serialize();
		$.post('login.php', login, function(data){
			var result = $.trim(data);
			if(result == "success"){
				window.location.href = "index.php";
			}
			else{
				Materialize.toast('<b>Invalid login credentials</b>', 4000, 'red');
			}
		});
	});
});