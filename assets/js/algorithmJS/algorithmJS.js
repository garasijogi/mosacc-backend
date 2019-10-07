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

	var y = document.getElementById("password2");
	if (y.type === "password") {
		y.type = "text";
	} else {
		y.type = "password";
	}
}

function modalSucesssRegister() {
	$(document).ready(function () {
		$('#modal1').modal();
		$('#modal1').modal('open');
	});
}

//modal salah password
function modalSalahPasswordAkuntan() {
	$(document).ready(function () {
		$('#login-akuntan').modal();
		$('#login-akuntan').modal('open');
	});
}
function modalSalahPasswordManajer() {
	$(document).ready(function () {
		$('#login-manajer').modal();
		$('#login-manajer').modal('open');
	});
}

//submit login akuntan dan manajer
$("#login-akuntan-btn").click(function () {
	$("#form-login-akuntan").submit();
});
$("#login-manajer-btn").click(function () {
	$("#form-login-manajer").submit();
});
