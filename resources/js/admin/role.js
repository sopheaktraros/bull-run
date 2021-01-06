$(document).ready(function() {

    $('#roles-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/roles/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "name" },
            { mData : "description" },
            { mData : "created_at" },
            { mData : "edit" },
            { mData : "delete" } 
        ]
    });

    $('#roles-table').dataTable().api().on('order.dt search.dt', function (){
        $('#roles-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });

    
});



