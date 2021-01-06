// $('select').material_select();

$('#subscript-box').change(function () {
    var subscription = $(this).is(':checked');
    var url = $(this).closest('form').attr('action');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'subscription': subscription,
            '_token': $('meta[name="token"]').attr('content')
        },
        success: function (response) {
            console.log(response);
        }
    });
});

$('.remove-notification').click(function (e) {
    e.preventDefault();

    var btn = $(this);

    var url = $(this).attr('href');
    var id = $(this).data('id');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'id': id,
            '_method': 'DELETE',
            '_token': $('meta[name="token"]').attr('content')
        },
        success: function (response) {
            btn.closest('li').fadeOut();
        }
    });
});

$('#tab-4 li a.title').click(function () {
    var btn = $(this);

    var id = $(this).data('id');
    var url = $(this).data('url');

    $.ajax({
        url: url,
        type: 'POST',
        data: {
            'id': id,
            '_token': $('meta[name="token"]').attr('content')
        },
        success: function (response) {
            btn.closest('li').addClass('viewed');
        }
    });
});