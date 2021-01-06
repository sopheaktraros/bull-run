$(document).ready(function() {
    
    $('#house-types-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/house_types/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "name" },
            { mData : "created_by" },
            { mData : "created_at" },
            { mData : "edit" },
        ],
        
        "order": [[0, 'desc']]
    });

    $('#house-types-table').dataTable().api().on('order.dt search.dt', function (){
        $('#house-types-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });    
});