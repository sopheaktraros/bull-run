$(document).ready(function() {
    let id = $("#report-subscriber-history-table").attr('data-id');
    $('#report-subscriber-history-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/report_subscriber/responseHistory/'+id,
        "columnDefs": [
            {
                "targets": [ 2 ],
                "visible": false,
                "searchable": false
            }
        ],
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "subscriber" },
            { mData : "package" },
            { mData : "price" },
            { mData : "started" },
            { mData : "due_date" },
            { mData : "payment_status" },
            { mData : "status" } 
        ],
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(2, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group" style="background:#506EFA;color:white"><td colspan="8">Package : '+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        },
        "order": [[4, 'desc']]
    });

    $('#report-subscriber-history-table').dataTable().api().on('order.dt search.dt', function (){
        $('#report-subscriber-history-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });


    $("#frm-customer-retail").on('submit', function (e) {
        e.preventDefault();
        var df, dt;
        df = $("#from_date").val();
        dt = $("#to_date").val();
        
        var url = '/report_subscriber/responseSearchHistory?' + 'df=' + df + '&dt=' + dt + '&id=' + id;

        $.getJSON(url, null, function (json)
        {
            oSettings = $('#report-subscriber-history-table').dataTable().fnSettings();
            $('#report-subscriber-history-table').dataTable().fnClearTable(this);

            for (var i = 0; i < json.data.length; i++)
            {
        
                $('#report-subscriber-history-table').dataTable().oApi._fnAddData(oSettings, json.data[i]);
       
            }
            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
            $('#report-subscriber-history-table').dataTable().fnDraw();
        });
    });
});