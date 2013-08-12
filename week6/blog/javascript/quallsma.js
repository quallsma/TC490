function validateComment(){
	var a = document.blogComment.fullname.value;
	var b = document.blogComment.email.value;
	var c = document.blogComment.comment.value;
	atPos = c.indexOf("@");
	dotPos = c.indexOf(".");
	
	if(a==null || a==""){
		document.getElementById("errorMessage").innerHTML = "Please enter your full name?";
		$('#errorMessage').addClass('alert alert-danger');
		document.blogComment.fullname.focus();
		return false;
	}
	if(b==null || b==""){
		document.getElementById("errorMessage").innerHTML = "Please enter your email address?";
		$('#errorMessage').addClass('alert alert-danger');
		document.blogComment.email.focus();
		return false;
	}
	else if(atPos < 1 ||  dotPos - atPos < 2 ){
		document.getElementById("errorMessage").innerHTML = "Please enter your correct email address?";
		$('#errorMessage').addClass('alert alert-danger');
		document.blogComment.email.focus();
		return false;
	};
	if(c==null || c==""){
		document.getElementById("errorMessage").innerHTML = "Please enter your comment about the blog?";
		$('#errorMessage').addClass('alert alert-danger');
		document.blogComment.comment.focus();
		return false;
	}
}