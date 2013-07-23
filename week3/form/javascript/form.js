$(document).ready(function(){
	$('input').tooltip({
		track: true,
		position: {
			my: "left+15 center",
			at: "right center"
		}
	});
	$('#birthday').datepicker({
		dateFormat: "'day' d 'of' MM 'in the year' yy",
		showAnim: "slideDown",
		changeMonth: true,
		changeYear: true,
		yearRange: "1960:2013"
	});
	$('input').focus(function() {
	         $(this).css("background-color","#FFFFFF");
	    });
	$('input').blur(function(){
	         $(this).css("background-color","	#C0C0C0");
	  });
});

function validateForm(){
	var a = document.sampleForm.firstname.value;
	var b = document.sampleForm.middlename.value;
	var c = document.sampleForm.lastname.value;
	var d = document.sampleForm.birthday.value;
	var e = document.sampleForm.street.value;
	var f = document.sampleForm.city.value;
	var g = document.sampleForm.state.value;
	var h = document.sampleForm.zipcode.value;
	var i = document.sampleForm.email.value;
	var atpos = i.indexOf("@");
	var dotpos = i.lastIndexOf(".");

	if (a==null || a==""){
		alert("First name must be filled out");
		document.sampleForm.firstname.focus();
		return false;
	}
	if (b==null || b==""){
		alert("Middle name must be filled out");
		document.sampleForm.middlename.focus();
		return false;
	}
	if (c==null || c==""){
		alert("Last name must be filled out");
		document.sampleForm.lastname.focus();
		return false;
	}
	if (d==null || d==""){
		alert("Birth Date must be filled out");
		document.sampleForm.birthday.focus();
		return false;
	}
	if (e==null || e==""){
		alert("Street address must be filled out");
		document.sampleForm.street.focus();
		return false;
	}
	if (f==null || f==""){
		alert("City must be filled out");
		document.sampleForm.city.focus();
		return false;
	}
	if (g==null || g=="" || g.length != 2){
		alert("State must be filled out");
		document.sampleForm.state.focus();
		return false;
	}
	if (h==null || h=="" || isNaN(h) || h.length != 5){
		alert("Please enter a complete zipcode with five digits");
		document.sampleForm.zipcode.focus();
		return false;
	} 
	if (i==null || i==""){
	  	alert("Email address must be filled out");
		document.sampleForm.email.focus();
		return false;
	} else if (atpos < 1 || ( dotpos - atpos < 2 )){
	       alert("Please enter a correct email ID")
	       document.sampleForm.email.focus() ;
	       return false;
	}
}