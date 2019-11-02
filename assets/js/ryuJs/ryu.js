$(document).ready(function () {
    $('#view_data').DataTable();
});

//>>Bayuw
// Dropdown
const dropdown = document.querySelectorAll('.dropdown-trigger');
M.Dropdown.init(dropdown, {
    coverTrigger: false,
    inDuration: 300,
    outDuration: 300,
    alignment: 'center'
});

// Collapsible
$(document).ready(() => {
    $('.collapsible').collapsible()
});

// Modals
$(document).ready(function () {
    $('.modal').modal();
});

// Date Picker
$(document).ready(function () {
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
});

// Tabs Initiation
$(document).ready(function () {
    $('.tabs').tabs({
        swipeable: true,
        responsiveThreshold: 1920
    });
});

// ChartJs Saldo -------------------------------------
// label buat di axis X
// console.log(bulan);
// //buat menggambar garis di graphnya
// console.log(sales_order);

var ctx = $('#dChart_saldo');
var dChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [21,22],
        datasets: [
            {
                data: [20, 10],
                label: "Sales Order",
                borderColor: "#ffff00",
                backgroundColor: "#9b8400",
                fill: true
            }
        ]
    },
    options: {
        responsive: false
    }
});

// ChartJs Penerimaan -------------------------------------
// label buat di axis X
// console.log(bulan);
// //buat menggambar garis di graphnya
// console.log(sales_order);

var ctx = $('#dChart_penerimaan');
var dChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [21, 22],
        datasets: [
            {
                data: [20, 10],
                label: "Sales Order",
                borderColor: "#ffff00",
                backgroundColor: "#9b8400",
                fill: true
            }
        ]
    },
    options: {
        responsive: false
    }
});

// ChartJs Pengeluaran -------------------------------------
// label buat di axis X
// console.log(bulan);
// //buat menggambar garis di graphnya
// console.log(sales_order);

var ctx = $('#dChart_pengeluaran');
var dChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [21, 22],
        datasets: [
            {
                data: [20, 10],
                label: "Sales Order",
                borderColor: "#ffff00",
                backgroundColor: "#9b8400",
                fill: true
            }
        ]
    },
    options: {
        responsive: false
    }
});

//Select option initialization
$(document).ready(function () {
    $('select').formSelect();
});

// modal form check on wizard
const wizardFormChecker = () => {
	let forms = document.querySelectorAll('.wizard-form-check');
	let wizardFormButton = document.getElementsByClassName('btn-wizard-checker')[0];
	let linkTarget = document.querySelector('.btn-form-wrapper a');

	forms.forEach((item) => {
		if (item.value === '') {
			wizardFormButton.classList.add('modal-trigger')
		} else {
			wizardFormButton.classList.remove('modal-trigger');
			if (linkTarget.classList.contains('wizard-struktur-dkm-simpan')) {
				linkTarget.removeAttribute('href'); //hapus atribut href
				$("#wizard-form-dkm").submit(); //submit form wizard profil form
			} else if (linkTarget.classList.contains('wizard-profil-masjid-simpan')) {
                linkTarget.removeAttribute('href');//hapus atribut href
				$("#wizard-form-profil").submit();//submit form wizard profil form
			}
		}
	})
}

//multiform-template initiation
$(".multiform-template").multiFormTemplate({
	postAddFunction: function () {
		$('select').formSelect();
	}
});

//aset peralatan submit button
$("#btn-submit-peralatan").click(function () {
	/* when the submit button in the modal is clicked, submit the form */
	$("#form_aset-peralatan").submit();
});

//aset peralatan submit button
$("#btn-submit-bangunan_tanah").click(function () {
	/* when the submit button in the modal is clicked, submit the form */
	$("#form_aset-bangunan_tanah").submit();
});

$("#btn-submit-kas_bank").click(function () {
	/* when the submit button in the modal is clicked, submit the form */
	$("#form_aset-kas_bank").submit();
});


// //dynamic multiform old
// $(function() {
//     var scntDiv = $('#aset-f');
//     var i = $('#aset-f f').size() + 1;

//     $('#addForm').live('click', function() {
//         $('<div id="aset-f" class="row"> <div class = "input-field col s4" > <input name = "nama-alat-' + i + '" type="text" class="validate" id="rename-nama-peralatan"> <label for = "rename-nama-peralatan">Masukkan Nama Peralatan</label> </div> <div class="input-field col s4"> <input name = "jumlah-alat-' + i + '" id="rename-jumlah-peralatan" type="number" class="validate"> <label for = "rename-jumlah-peralatan">Masukkan Jumlah</label> </div> <div class="input-field col s4"> <input name = "nilai-alat-' + i + '" id="rename-nilai-peralatan" type="number" class="validate"> <label for ="rename-nilai-peralatan">Masukkan Nilai Peralatan</label> </div> </div>').appendTo(scntDiv);
//         i++;
//         return false;
//     });

//     $('#rmvForm').live('click', function() { 
//         if (i > 2) {
//             $(this).parents('p').remove();
//             i--;
//         }
//         return false;
//     });
// });