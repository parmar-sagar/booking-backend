var captcha;
function generate() {

	// Clear old input
	document.getElementById("submit").value = "";

	// Access the element to store
	// the generated captcha
	captcha = document.getElementById("image");
	var uniquechar = "";

	const randomchar =
"ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	// Generate captcha for length of
	// 5 with random character
	for (let i = 1; i < 5; i++) {
		uniquechar += randomchar.charAt(
			Math.random() * randomchar.length)
	}

	// Store generated input
	captcha.innerHTML = uniquechar;
}

function printmsg(str) {
	const usr_input = document
		.getElementById("submit").value;
	// Check whether the input is equal
	// to generated captcha or not
	
	if(usr_input.trim() == '') {
		var s = document.getElementById("key")
			.innerHTML = "**Please enter captcha**";
		     generate();
             return false;
	}
	else if(usr_input.trim() !== '' && usr_input.trim() !== captcha.innerHTML) {
		var s = document.getElementById("key")
			.innerHTML = "**Please enter valid captcha**";
		     generate();
             return false;
	}
	else if (usr_input.trim() !== '' && usr_input.trim() == captcha.innerHTML) {
		generate();
		document.getElementById("key").style.display="none";
		document.getElementById("key")
	   .innerHTML = "";
	   if(str == 'submit-form'){
			$.ajax({
				method:'POST',
				url: 'contact-us',
				data:new FormData(document.getElementById('submit-form')),
				contentType: false,
				cache: false,
				processData: false,
				success: function (response) {
					console.log(response)
					if((response.error)){
						toastr.error(response.error);
					}else{
						$("#section").load(window.location + " #section");
						toastr.success(response.success); 
						document.getElementById('submit-form').reset()
					}
					
					},error: function (error){
					toastr.warning(error);
				}
		
			});
	   }else if(str == 'registerForm'){
			$.ajax({
				method: 'POST',
				url: 'submit-supplier',
				data:new FormData(document.getElementById('registerForm')),
				contentType: false,
				cache: false,
				processData: false,
				success: function (response) {
						// window.location = "/";
						toastr.success(response.success);
						document.getElementById('registerForm').reset()
					},error: function (response){
					var text = JSON.parse(response.responseText)
						toastr.error(text.message);
					}
				
			});
				toastr.options = {
				  positionClass: 'toast-top-center'
			    }
	    }
	    
	  
	} 
	
}
