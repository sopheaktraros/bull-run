$(document).ready(function() {

    $('#report-subscriber-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/report_subscriber/response',
        
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "name" },
            { mData : "phone" },
            { mData : "address" },
            { mData : "image" },
            { mData : "status" },
            { mData : "created_at" },
            { mData : "view" } 
        ],
        "order": [[0, 'desc']]
    });

    $('#report-subscriber-table').dataTable().api().on('order.dt search.dt', function (){
        $('#report-subscriber-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });

    $("#frm-report-subscriber").on('submit', function (e) {
        e.preventDefault();
        var subscriber, contact, df, dt;
        df = $("#from_date").val();
        dt = $("#to_date").val();
        subscriber = $("#select_subscriber").val();
        contact = $("#contact").val();

        var url = '/report_subscriber/responseSearch?' + 'df=' + df + '&dt=' + dt + '&subscriber=' + subscriber + '&contact=' + contact;

        $.getJSON(url, null, function (json)
        {
            oSettings = $('#report-subscriber-table').dataTable().fnSettings();
            $('#report-subscriber-table').dataTable().fnClearTable(this);

            for (var i = 0; i < json.data.length; i++)
            {
        
                $('#report-subscriber-table').dataTable().oApi._fnAddData(oSettings, json.data[i]);
       
            }
            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
            $('#report-subscriber-table').dataTable().fnDraw();
        });
    });
});