$(document).ready(function() {
    $('#report-ar-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/report_ar/response',
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
        ]
    });

    $('#report-ar-table').dataTable().api().on('order.dt search.dt', function (){
        $('#report-ar-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });

    function formToObject(form) {
        const formData = form.serializeArray();
        let jsonObject = {};
    
        for (var i = 0; i < formData.length; i++) {
            jsonObject[formData[i].name] = formData[i].value;
        }
    
        return jsonObject;
    }

    $("#frm-report-ar").on('submit', function (e) {
        e.preventDefault();
        var subscriber, contact, df, dt;
        df = $("#from_date").val();
        dt = $("#to_date").val();
        subscriber = $("#select_subscriber").val();

        var url = '/report_ar/responseSearch?' + 'df=' + df + '&dt=' + dt + '&subscriber=' + subscriber;

        $.getJSON(url, null, function (json)
        {
            oSettings = $('#report-ar-table').dataTable().fnSettings();
            $('#report-ar-table').dataTable().fnClearTable(this);

            for (var i = 0; i < json.data.length; i++)
            {
        
                $('#report-ar-table').dataTable().oApi._fnAddData(oSettings, json.data[i]);
       
            }
            oSettings.aiDisplay = oSettings.aiDisplayMaster.slice();
            $('#report-ar-table').dataTable().fnDraw();
        });
    });
});
