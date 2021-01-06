$(document).ready(function() {

    $('#subscriber-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/subscriber/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "name" },
            { mData : "phone" },
            { mData : "address" },
            { mData : "image" },
            { mData : "created_at" },
            { mData : "status" },
            { mData : "edit" },
            { mData : "delete" } 
        ]
    });

    $('#subscriber-table').dataTable().api().on('order.dt search.dt', function (){
        $('#subscriber-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });
});

