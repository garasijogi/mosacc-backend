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
    $('.datepicker').datepicker();
});