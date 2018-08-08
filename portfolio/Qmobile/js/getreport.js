$(document).ready(function() {

	// Ajax request for Executive Summary - Sales By Pharmacy (HTML)
	 var xhr = new XMLHttpRequest();
	xhr.onreadystatechange = function () {
		if (xhr.readyState === 4) {
			if (xhr.status === 200) {
			document.getElementById("ajax").innerHTML = xhr.responseText;	
			} else {
				alert(xhr.statusText);
			}
		}
	};
	xhr.open("GET", "url");
	xhr.send();

}); // End Ready