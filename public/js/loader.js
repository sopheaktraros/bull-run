/**
 * Object Loader
 *
 * @constructor
 */
function LoaderDark() {
    if ($('#LoaderDark').length == 0) {
        $('body').append("<div id='LoaderDark' style='display: none; background-color: #222125; position: fixed; left: 0; right: 0; top: 0; bottom: 0; z-index: 3999'>&nbsp;</div>");
    }

    this.show = function () {
        $('#LoaderDark').show();
    },
        this.hide = function () {
            $('#LoaderDark').hide();
        }
};
