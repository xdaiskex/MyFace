$(document).ready(function(){
	$(".side-nav .sideOptions a").hover(function(){
		$(this).css('background-color','black');
		$(this).css('color', 'white');
		$(this).find("i").css('color', 'white');
		$(this).css('transition', '0s');
		$(this).find("i").css('transition', '0s');
	}, function(){
		$(this).css('background-color','white');
		$(this).css('color', 'black');
		$(this).find("i").css('color', 'black');
		$(this).css('transition', '0s');
		$(this).find("i").css('transition', '0s');
	});

	$("#nav-mobile li").hover(function(){
        $(this).css("box-shadow", "inset 0 -8px 0 0 white");
        $(this).css("color", "orange");
        $(this).css("transition", "1s");
    },
    function(){
        $(this).css("box-shadow", "none");
        $(this).css("color", "white");
        $(this).css("transition", "1s");
    });

	$(".changePhoto").hover(function(){
		$(this).css('cursor', 'pointer');
		$(this).css('opacity','1');
		$(this).css('transition', '1s');
	}, function(){
		$(this).css('cursor', 'pointer');
		$(this).css('opacity','.5');
		$(this).css('transition', '1s');
	});

	$(".changeCover .profileBtn").hover(function(){
		$(this).css('cursor', 'pointer');
		$(this).css('filter','brightness(100%)');
		$(this).css('transition', '1s');
	}, function(){
		$(this).css('cursor', 'pointer');
		$(this).css('filter','brightness(50%)');
		$(this).css('transition', '1s');
	});

	$("#musicForm .btn").hover(function(){
		$(this).css('cursor', 'pointer');
		$(this).css('filter','brightness(100%)');
		$(this).css('transition', '1s');
	}, function(){
		$(this).css('cursor', 'pointer');
		$(this).css('filter','brightness(50%)');
		$(this).css('transition', '1s');
	});

	$(".friends li").hover(function(){
		$(this).css('background-color', '#1976D2');
		$(this).css('cursor', 'pointer');
		$(this).css('margin-right','-20px');
		$(this).css('margin-left','-5px');
		$(this).css('transition', '1s');
	}, function(){
		$(this).css('background-color', 'black');
		$(this).css('cursor', 'pointer');
		$(this).css('margin-right','0px');
		$(this).css('margin-left','0px');
		$(this).css('transition', '.5s');
	});

	$(".status").focus(function(){
		$(".friends").css('filter','brightness(50%)');
		$(".friends").css('pointer-events','none');
		$(".friends").css('transition', '1s');
		$("nav").css('filter','brightness(50%)');
		$("nav").css('pointer-events','none');
		$("nav").css('transition', '1s');
		$("body").css('background-color','black');
		$("body").css('transition', '1s');
		$(".content .feed").css('filter','brightness(50%)');
		$(".content .feed").css('pointer-events','none');
		$(".content .feed").css('transition', '1s');
	});

	$(".status").blur(function(){
		$(".friends").css('filter','brightness(100%)');
		$(".friends").css('pointer-events','auto');
		$(".friends").css('transition', '1s');
		$("nav").css('filter','brightness(100%)');
		$("nav").css('pointer-events','auto');
		$("nav").css('transition', '1s');
		$("body").css('background-color','#e0e0e0');
		$("body").css('transition', '1s');
		$(".content .feed").css('filter','brightness(100%)');
		$(".content .feed").css('pointer-events','auto');
		$(".content .feed").css('transition', '1s');
	});

	$("#profilePicture").change(function(){
	    $("#profileForm").submit();
	});

	$("#coverPicture").change(function(){
	    $("#coverForm").submit();
	});

	$("#music").change(function(){
	    $("#musicForm").submit();
	});

	$("#statusForm").on('submit', function(event){
		event.preventDefault();
		var status = $(this).serialize();
		$.post('status.php', status, function(data){
			var result = $.trim(data);
			if(result != "error"){
				//Materialize.toast('<b>Success</b>', 4000, 'green');
				$(".feed").prepend(result);
				$(".status").val("");
			}
			else{
				//Materialize.toast('<b>Failure</b>', 4000, 'red');
			}
		});
	});
});