function showLoader() {
    $('body').append('<div class="progress-loader" id="progress-loader">&nbsp;</div>');
}

function removeLoader() {
    $('.progress-loader').remove();
}

$(document).ready(function () {
    $('.button-collapse').sideNav('destroy');
    $('.button-collapse').sideNav({
        menuWidth: 350,
        edge: 'left'
    });

    $('.close-side-nav').click(function () {
        $('.button-collapse').sideNav('hide');
    });

    $('.btn-user-action').sideNav({
        menuWidth: 300,
        closeOnClick: true,
        edge: 'right'
    });

    $('#close-user-action').click(function () {
        $('.btn-user-action').sideNav('hide');
    });

    $('.collapsible').collapsible();

    $('.open-fullscreen').click(function () {
        $('body').fullscreen();
    });

    $('.exit-fullscreen').click(function () {
        $.fullscreen.exit();
    });
});

$(window).load(function () {
    if ($('#body-content img').length > 0) {
        $('#body-content img').load(function () {
            removeLoader();
        });
    } else {
        removeLoader();
    }
});