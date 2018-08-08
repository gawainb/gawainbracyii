(function($) {
    "use strict";
	
	 var options1 = { success: showResponse, beforeSubmit: showRequest}; 
    $('#evaluation-form').submit(function() { 
        $(this).ajaxSubmit(options1); 
        return false; 
    });
	})(jQuery);


function showResponse(responseText, statusText)  { 
	if (statusText == 'success') {
		$('#evaluation-form-holder').html('<h5 class="alignc">Message sent</h5>'); 
		$('#output-evaluation').html('<p>' + $('someText', responseText).html()  + '</p>'); 
	} else {
		alert('status: ' + statusText + '\n\nSomething is wrong here');
	}
}

function showRequest(formData, jqForm, options1) { 
	var form = jqForm[0];
	var validRegExp = /^[^@]+@[^@]+.[a-z]{2,}$/i;
	
	if (!form.nameeval.value) { 
		$('#output-evaluation').html('<div class="output2">Please fill the Name field!</div>'); 
		return false; 
	} else if (!form.emaileval.value) {
		$('#output-evaluation').html('<div class="output2">Please fill the Email field!</div>'); 
		return false; 
	} else if (form.emaileval.value.search(validRegExp) == -1) {
		$('#output-evaluation').html('<div class="output2">Please provide a valid Email address!</div>'); 
		return false; 
	}
	else if (!form.subjecteval.value) {
		$('#output-evaluation').html('<div class="output2">Please fill the Subject field!</div>'); 
		return false; 
	}
	else if (!form.messageeval.value) {
		$('#output-evaluation').html('<div class="output2">Please fill the Message field!</div>'); 
		return false; 
	}
	 else {	   
	 $('#output-evaluation').html('Sending message...!');  		
		return true;
	}
}