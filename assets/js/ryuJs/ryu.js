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
        labels: bulan,
        datasets: [
            {
                data: sum_saldo,
                label: "Saldo",
                borderColor: "#00BFA5",
                backgroundColor: "#26A69A",
                fill: false
            },
            {
                data: sum_penerimaan,
                label: "Penerimaan",
                borderColor: "#03A9F4",
                backgroundColor: "#0288D1",
                fill: false
            },
            {
                data: sum_pengeluaran,
                label: "Pengeluaran",
                borderColor: "#ff1744",
                backgroundColor: "#E53935",
                fill: false
            }

        ]
    },
    options: {
        responsive: false,
        legend: {
            display: true,
            position: 'bottom'
        }
    }
});

// ChartJs Penerimaan -------------------------------------
// label buat di axis X
// console.log(bulan);
// //buat menggambar garis di graphnya
// console.log(sum_penerimaan);

var ctx = $('#dChart_penerimaan');
var dChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: bulan,
        datasets: [
            {
                data: s_terima01,
                label: "Infaq Peminjaman Peralatan",
                borderColor: "#F44336",
                fill: false
            },
            {
                data: s_terima02,
                label: "Infaq Pemakaian Ruangan",
                borderColor: "#9C27B0",
                fill: false
            },
            {
                data: s_terima03,
                label: "Pendapatan Parkir",
                borderColor: "#3F51B5",
                fill: false
            },
            {
                data: s_terima04,
                label: "Infaq Pengurusan",
                borderColor: "#2196F3",
                fill: false
            },
            {
                data: s_terima05,
                label: "Pendapatan Non-Halal",
                borderColor: "#03A9F4",
                fill: false
            },
            {
                data: s_terima06,
                label: "Pendapatan Lainnya",
                borderColor: "#00BCD4",
                fill: false
            },
            {
                data: s_terima07,
                label: "Infaq Kotak Jumat ",
                borderColor: "#009688",
                fill: false
            },
            {
                data: s_terima08,
                label: "Infaq Perayaan Hari Besar Islam",
                borderColor: "#4CAF50",
                fill: false
            },
            {
                data: s_terima09,
                label: "Infaq Pengajian",
                borderColor: "#8BC34A",
                fill: false
            },
            {
                data: s_terima10,
                label: "Infaq Ramadhan",
                borderColor: "#CDDC39",
                fill: false
            },
            {
                data: s_terima11,
                label: "Infaq TPA dan Tahfidz",
                borderColor: "#FFEB3B",
                fill: false
            },
            {
                data: s_terima12,
                label: "Infaq dari Donatur",
                borderColor: "#FFC107",
                fill: false
            },
            {
                data: s_terima13,
                label: "Infaq Kotak Dana Operasional",
                borderColor: "#FF9800",
                fill: false
            },
            {
                data: s_terima14,
                label: "Infaq Kotak Dana Sosial",
                borderColor: "#FF5722",
                fill: false
            },
            {
                data: s_terima15,
                label: "Zakat Fitrah",
                borderColor: "#795548",
                fill: false
            },
            {
                data: s_terima16,
                label: "Fidyah",
                borderColor: "#9E9E9E",
                fill: false
            },
            {
                data: s_terima17,
                label: "Infaq untuk Baksos",
                borderColor: "#607D8B",
                fill: false
            }
        ]
    },
    options: {
        responsive: false,
        legend: {
            display: true,
            position: 'bottom'
        }
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
        labels: bulan,
        datasets: [
            {
                data: s_keluar01,
                label: "Pembelian Perlengkapan",
                borderColor: "#0000CD",
                fill: false
            },
            {
                data: s_keluar02,
                label: "Pembelian Peralatan",
                borderColor: "#008000",
                fill: false
            },
            {
                data: s_keluar03,
                label: "Pembelian Kendaraan",
                borderColor: "#D3D3D3",
                fill: false
            },
            {
                data: s_keluar04,
                label: "Beban Listrik, Air, dan Telepon ",
                borderColor: "#000000",
                fill: false
            },
            {
                data: s_keluar05,
                label: "Beban Pemeliharaan",
                borderColor: "#696969",
                fill: false
            },
            {
                data: s_keluar06,
                label: "Beban Administrasi",
                borderColor: "#800000",
                fill: false
            },
            {
                data: s_keluar07,
                label: "Beban Perlengkapan",
                borderColor: "#EEE8AA",
                fill: false
            },
            {
                data: s_keluar08,
                label: "Beban Kerusakan dan Kehilangan Aset",
                borderColor: "#FF00FF",
                fill: false
            },
            {
                data: s_keluar09,
                label: "Beban Transportasi ",
                borderColor: "#B0E0E6",
                fill: false
            },
            {
                data: s_keluar10,
                label: "Insentif Pengurus Masjid",
                borderColor: "#DA70D6",
                fill: false
            },
            {
                data: s_keluar11,
                label: "Beban Lainnya",
                borderColor: "#2E8B57",
                fill: false
            },
            {
                data: s_keluar12,
                label: "Insentif Penceramah/Khatib",
                borderColor: "#708090",
                fill: false
            },
            {
                data: s_keluar13,
                label: "Insentif Marbot",
                borderColor: "#FFA07A",
                fill: false
            },
            {
                data: s_keluar14,
                label: "Beban Perayaan Hari Besar Islam",
                borderColor: "#FFE4C4",
                fill: false
            },
            {
                data: s_keluar15,
                label: "Beban Buletin Dakwah",
                borderColor: "#FAFAD2",
                fill: false
            },
            {
                data: s_keluar16,
                label: "Peribadatan Lainnya",
                borderColor: "#ADD8E6",
                fill: false
            },
            {
                data: s_keluar17,
                label: "Shalat Tarawih",
                borderColor: "#B8860B",
                fill: false
            },
            {
                data: s_keluar18,
                label: "Konsumsi Buka Puasa dan Sahur",
                borderColor: "#FFFFF0",
                fill: false
            },
            {
                data: s_keluar19,
                label: "Peringatan Nuzulul Quran",
                borderColor: "#DAA520",
                fill: false
            },
            {
                data: s_keluar20,
                label: "Penyaluran Zakat Fitrah dan Fidyah",
                borderColor: "#00FA9A",
                fill: false
            },
            {
                data: s_keluar21,
                label: "Penyaluran untuk Beasiswa",
                borderColor: "#BA55D3",
                fill: false
            },
            {
                data: s_keluar22,
                label: "Penyaluran untuk Besuk Orang Sakit",
                borderColor: "#ADFF2F",
                fill: false
            },
            {
                data: s_keluar23,
                label: "Penyaluran untuk Aktivitas Kepemudaan",
                borderColor: "#006400",
                fill: false
            },
            {
                data: s_keluar24,
                label: "Sumbangan untuk Anak Yatim",
                borderColor: "#90EE90",
                fill: false
            },
            {
                data: s_keluar25,
                label: "Sumbangan Ta’ziyah",
                borderColor: "#F08080",
                fill: false
            },
            {
                data: s_keluar26,
                label: "Sumbangan untuk Bencana Alam",
                borderColor: "#FFF5EE",
                fill: false
            },
            {
                data: s_keluar27,
                label: "Penyaluran untuk TPA dan Tahfidz",
                borderColor: "#BC8F8F",
                fill: false
            },
            {
                data: s_keluar28,
                label: "Beban Pelatihan",
                borderColor: "#B22222",
                fill: false
            },
            {
                data: s_keluar29,
                label: "Pembelian Material",
                borderColor: "#8FBC8F",
                fill: false
            },
            {
                data: s_keluar02,
                label: "Upah Tukang",
                borderColor: "#FFC0CB",
                fill: false
            }
        ]
    },
    options: {
        responsive: false,
        legend: {
            display: true,
            position: 'bottom'
        }
    }
});

//Select option initialization
$(document).ready(function () {
    $('select').formSelect();
});

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

//aset perlengkapan submit button
$("#btn-submit-perlengkapan").click(function () {
    /* when the submit button in the modal is clicked, submit the form */
    $("#form_aset-perlengkapan").submit();
});

//aset kendaraan submit button
$("#btn-submit-kendaraan").click(function () {
    /* when the submit button in the modal is clicked, submit the form */
    $("#form_aset-kendaraan").submit();
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