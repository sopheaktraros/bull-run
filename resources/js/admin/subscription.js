
$(document).ready(function() {

    $('#subscription-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/subscription/response',
        "targets": 2,
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "subscriber" },
            { mData : "package" },
            { mData : "price" },
            { mData : "started_date" },
            { mData : "due_date" },
            { mData : "payment_status" },
            { mData : "status" },
            { mData : "edit" },
            { mData : "delete" } 
        ]
    });

    $('#subscription-table').dataTable().api().on('order.dt search.dt', function (){
        $('#subscription-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });
});


$("#package_id").change(function(){
    let price = $('option:selected', this).attr('data-price');
    let period = $('option:selected', this).attr('data-period');
    $("#price").val(price);
    $("#period").val(period);
    
})