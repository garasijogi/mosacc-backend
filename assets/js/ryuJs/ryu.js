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