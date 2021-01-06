$(document).ready(function() {
    
    $('#project-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/project/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "project_no" },
            { mData : "name" },
            { mData : "created_by" },
            { mData : "created_at" },
            { mData : "edit" },
            { mData : "delete" }
        ],
        
        "order": [[0, 'desc']]
    });

    $('#project-table').dataTable().api().on('order.dt search.dt', function (){
        $('#project-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });    
});