$(document).ready(function () {
	$('.datepicker').datepicker({
		format: 'yyyy-mm-dd'
	});
});

//jurnal umum sort transaction
function convertDate(d) {
	var p = d.split("-");
	return +(p[0] + p[1] + p[2]);
}

function convertDateFormat(d) {
	var x = d.split("-");
	//change format
	switch (x[1]) {
		case 01:
			x[1] = "Januari";
			break;
		case 02:
			x[1] = "Februari";
			break;
		case 03:
			x[1] = "Maret";
			break;
		case 04:
			x[1] = "April";
			break;
		case 05:
			x[1] = "Mei";
			break;
		case 06:
			x[1] = "Juni";
			break;
		case 07:
			x[1] = "Juli";
		case 08:
			x[1] = "Agustus";
			break;
		case 09:
			x[1] = "September";
			break;
		case 10:
			x[1] = "Oktober";
			break;
		case 11:
			x[1] = "November";
			break;
		case 12:
			x[1] = "Desember";
	}

	return (x[2] + "-" + x[1] + "-" + x[0]);
	//end change format
}

$(document).ready(function () {
	var tbody = document.querySelector("#table-jurnal-umum-v tbody");
	// get trs as array for ease of use
	var rows = [].slice.call(tbody.querySelectorAll("tr"));

	//sorting
	rows.sort(function (a, b) {
		return convertDate(a.cells[0].innerHTML) - convertDate(b.cells[0].innerHTML);
	});

	rows.forEach(function (v) {
		tbody.appendChild(v); // note that .appendChild() *moves* elements
	});
	//end sorting

});
//end jurnal umum sort transaction

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

//select materialize
$(document).ready(function () {
	$('select').formSelect();
});

//print
//table arus kas
$(document).ready(function () {
	var title = $("#title-print").text();
	var table = $('#table-arus-kas').DataTable({
		dom: 'Bfrtip',
		"paging": false,
		"ordering": false,
		"info": false,
		"filter": false,
		buttons: [{
				extend: 'excel',
				title: title
			},
			{
				extend: 'pdf',
				filename: 'mosacc-exported',
				title: title,
				customize: function (doc) {
					// doc.styles.title = {
					// 	color: 'black',
					// 	fontSize: '20',
					// 	alignment: 'center'
					// }
					// doc.styles.tableHeader = {
					// 	color: 'red',
					// 	background: 'blue',
					// 	alignment: 'left'
					// }
					// doc.styles.tableBodyEven = {
					// 	background: 'yellow',
					// 	alignment: 'left'
					// }
					// doc.styles.tableBodyOdd = {
					// 	background: 'blue',
					// 	alignment: 'left'
					// }
					// doc.styles.tableFooter = {
					// 	background: 'blue',
					// 	alignment: 'left'
					// }
					// doc.styles['td:nth-child(1)'] = {
					// 	background: 'blue',
					// 	alignment: 'left'
					// width: '1000px',
					// 'max-width': '100px'
					// }
				}
			}
		],
		table: {
			// headers are automatically repeated if the table spans over multiple pages
			// you can declare how many rows should be treated as headers
			headerRows: 1,
			widths: ['*', 'auto', 100, '*'],

			body: [
				['First', 'Second', 'Third', 'The last one'],
				['Value 1', 'Value 2', 'Value 3', 'Value 4'],
				[{
					text: 'Bold value',
					bold: true
				}, 'Val 2', 'Val 3', 'Val 4']
			]
		}
	});



	$("#export-pdf").on("click", function () {
		table.button('.buttons-pdf').trigger();
	});
	$("#export-excel").on("click", function () {
		table.button('.buttons-excel').trigger();
	});
});

//table jurnal umum
$(document).ready(function () {
	var title = $("#title-print").text();
	var table = $('#table-jurnal-umum').DataTable({
		dom: 'Bfrtip',
		"paging": false,
		"info": false,
		"filter": false,
		buttons: [{
				extend: 'excel',
				title: title,
				customize: function (xlsx) {
					var sheet = xlsx.xl.worksheets['sheet1.xml'];

					// jQuery selector to add a border
					$('row c', sheet).attr('s', '25');
				}
			},
			{
				extend: 'pdf',
				filename: 'mosacc-exported',
				title: title
			}
		],
		table: {
			headerRows: 1,
			widths: ['*', 'auto', 100, '*'],

			body: [
				['First', 'Second', 'Third', 'The last one'],
				['Value 1', 'Value 2', 'Value 3', 'Value 4'],
				[{
					text: 'Bold value',
					bold: true
				}, 'Val 2', 'Val 3', 'Val 4']
			]
		}
	});



	$("#export-pdf").on("click", function () {
		table.button('.buttons-pdf').trigger();
	});
	$("#export-excel").on("click", function () {
		table.button('.buttons-excel').trigger();
	});
});

//printPDFLaporan
$("#print-button").click(function printLaporan() {
	var divName = "printed";
	var printContents = document.getElementById(divName).innerHTML;
	var originalContents = document.body.innerHTML;

	document.body.innerHTML = printContents;

	window.print();

	document.body.innerHTML = originalContents;
});

window.onafterprint = function () {
	window.location.reload(true);
}

//preloader
document.addEventListener("DOMContentLoaded", function () {
	$('.preloader-background').delay(100).fadeOut('slow');

	$('.preloader-wrapper')
		.delay(100)
		.fadeOut();
});
