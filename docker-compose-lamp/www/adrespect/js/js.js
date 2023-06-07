$(document).ready( function () {
    $('#exchangeRate').DataTable({
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
        info: false,
    });
    $('#conversion').DataTable({
        scrollY: '200px',
        scrollCollapse: true,
        paging: false,
        info: false,
    });
} );
