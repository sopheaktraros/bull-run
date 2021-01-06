$(document).ready(function() {
    
    $('#period-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/period/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "name" },
            { mData : "period" },
            { mData : "rate" },
            { mData : "created_by" },
            { mData : "created_at" },
            { mData : "edit" },
            { mData : "delete" }
        ],
        
        "order": [[0, 'desc']]
    });

    $('#period-table').dataTable().api().on('order.dt search.dt', function (){
        $('#period-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });    
});