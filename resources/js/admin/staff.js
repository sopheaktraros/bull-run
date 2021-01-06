$(document).ready(function() {

    $('#staff-table').DataTable( {
        "bProcessing": true,
        "sAjaxSource": '/staff/response',
        "columnDefs": [
            {
                "targets": [ 1 ],
                "visible": false,
                "searchable": false
            }
        ],
        "orderable": false,
        "aoColumns": [
            { mData : "id" },
            { mData : "role" },
            { mData : "name" },
            { mData : "gender" },
            { mData : "contact_number" },
            { mData : "address" },
            { mData : "created_at" },
            { mData : "edit" },
            { mData : "delete" } 
        ],
        "aoColumnDefs": [
            { "sClass": "hidden", "aTargets": [1] },
        ],
        "drawCallback": function ( settings ) {
            var api = this.api();
            var rows = api.rows( {page:'current'} ).nodes();
            var last=null;

            api.column(1, {page:'current'} ).data().each( function ( group, i ) {
                if ( last !== group ) {
                    $(rows).eq( i ).before(
                        '<tr class="group" style="background:#506EFA;color:white"><td colspan="9">Role : '+group+'</td></tr>'
                    );

                    last = group;
                }
            } );
        },
        "order": [[1, 'desc']]
    });

    $('#staff-table').dataTable().api().on('order.dt search.dt', function (){
        $('#staff-table').dataTable().api().column(0, {search: 'applied', order: 'applied'}).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1;
        });
    });

    
});



