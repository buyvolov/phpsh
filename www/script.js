$(document).ready(function() {
	
	var sSiteUrl = 'http://localhost:8080/';

	function sendData(){
		
		var name 	= $('#name').val();
		var email 	= $('#email').val();
		var phone 	= $('#phone').val();
		var message = $('#message').val();

		$.ajax({
			type: "POST",
			url: sSiteUrl + "feedback.php",
			dataType: "json",
			data: {
				name: name,
				email: email,
				phone: phone,
				message: message,
			},
			success: function(response_data){

			}
		});
	}

	function showError(node, noticeNode, text){

		node.addClass('error');
		noticeNode.removeClass("block-none");
		noticeNode.html(text);
	}

	function validate(node, lengthValue, isEmail){

		var noticeNode 	= node.parent().children('.notice');
		var value 		= node.val();
		var pattern 	= /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		
		node.removeClass('error');
		noticeNode.addClass("block-none");

		if(value == ''){

			showError(node, noticeNode, 'Поле не заполнено');
			return false;
		}
		if(value.length > lengthValue){
			
			showError(node, noticeNode, 'Не больше ' + lengthValue + '!');
			return false;
		} 
		if(isEmail == true && !pattern.test(value)){

			showError(node, noticeNode, 'Email не валиден');
			return false;
		}

		return true;
	}
	
	$('#first').on("click", function(){
	
		$('.first-text').toggle();
	});    

	$('.close-popup').on("click", function(){
	  
		$('.popup').addClass("block-none");
		$('.over').addClass("block-none");
	});
	
	$('.showPopup').on("click", function(){
	  
		$('.popup').removeClass("block-none");
		$('.over').removeClass("block-none");
	});

	$('#sendForm').on("click", function(){
			
		var isValid = true;

		$(".field").each(function(){

			if($(this).attr('name') == 'email'){

				if (!validate($(this), 255, true)) isValid = false;

			} else {

				if (!validate($(this), 255, false)) isValid = false;
			}
		});
		if(isValid){
			sendData();
			$('.popup').addClass("block-none");
			$('.over').addClass("block-none");
		}
	});
});