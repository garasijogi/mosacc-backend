$(document).ready(function () {
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
});

//  loginpage
function showPass() {
	var x = document.getElementById("password");
	if (x.type === "password") {
		x.type = "text";
	} else {
		x.type = "password";
	}
}

function modalSucesssRegister() {
	$(document).ready(function () {
		$('#modal1').modal();
		$('#modal1').modal('open');
	});
}
