
$(document).on('click', '.btn-search-profit', function(e){
    var dateFrom = $('#date-from').val();
    var dateTo = $('#date-to').val();

    $.ajax({
        type: "GET",
        async: false,
        url: "/get_report_monthly_income",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'date_from': dateFrom,
            'date_to' : dateTo,
        },
        success: function(response) {
            $('.total-income').text('$ ' + response.income);
            $('.net-income').text('$ ' + response.income);
            $('.package-tr').remove();
            let item = "";
            $.each(response.packages, function (i, data) {
                if(data.package_id != null){
                    item += `
                        <tr class="package-tr">
                            <td>${data.package.name}</td>
                            <td>${data.total_qty}</td>
                            <td>${'$ ' + data.package.price}</td>
                        </tr>
                    `;
                }else{
                    return;
                }
            });

            $('.package-detail').append(item);
        },
    });
});


$( document ).ready(function() {
    var dateFrom = $('#date-from').val();
    var dateTo = $('#date-to').val();

    $.ajax({
        type: "GET",
        async: false,
        url: "/get_report_monthly_income",
        data: {
            "_token": $('meta[name="csrf-token"]').attr('content'),
            'date_from': dateFrom,
            'date_to' : dateTo,
        },
        success: function(response) {
            $('.total-income').text('$ ' + response.income);
            $('.net-income').text('$ ' + response.income);
            $('.package-tr').remove();
            let item = "";
            console.log(response.packages);
            $.each(response.packages, function (i, data) {
                if(data.package_id != null){
                    item += `
                        <tr class="package-tr">
                            <td>${data.package.name}</td>
                            <td>${data.total_qty}</td>
                            <td>${'$ ' + data.package.price}</td>
                        </tr>
                    `;
                }else{
                    return;
                }
            });

            $('.package-detail').append(item);
        },
    });
});

