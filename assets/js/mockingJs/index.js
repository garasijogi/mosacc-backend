// var $ = require('jquery');



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
    $('.datepicker').datepicker();
});

// Select/Dropdown select
$(document).ready(function () {
    $('select').formSelect();
});

// SideNav
$(document).ready(function () {
    $('.sidenav').sidenav();
});

// Tabs
$(document).ready(function () {
    $('.tabs').tabs();
});

// Chart.js
// var ctx = document.getElementById('myChart').getContext('2d');
// var chart = new Chart(ctx, {
//     // The type of chart we want to create
//     type: 'bar',

//     // The data for our dataset
//     data: {
//         labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
//         datasets: [{
//             label: 'My First dataset',
//             backgroundColor: 'rgb(255, 99, 132)',
//             borderColor: 'rgb(255, 99, 132)',
//             data: [0, 10, 5, 2, 20, 30, 45]
//         }]
//     },

//     // Configuration options go here
//     options: {}
// });

// Profil Menu AJAX 

// Data Tables
// $('document').ready(() => {
//     $('#tabel-akun').DataTable();
// })