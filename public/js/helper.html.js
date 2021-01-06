
var helper = {};

/**
 * Button To Edit form
 *
 * @param url
 * @param param
 * @returns {string}
 */
helper.btnToEdit = function (url, param) {
    var actionUrl = backendUrl + '/' + url;
    if(typeof param != 'undefined') {
        actionUrl = backendUrl + '/' + url + '/' + param +'/edit';
    }

    return '<a href="' + actionUrl + '" class="btn btn-primary btn-mini btnToEdit"><i class="fa fa-wrench"></i></a>';
}

/**
 * Button Delete
 * @param url
 * @param id
 * @param disabled
 * @returns {string}
 */
helper.btnDelete = function (url, id, disabled) {
    if(typeof disabled == 'undefined') {
        disabled = '';
    } else {
        disabled = ' disabled'
    }

    return '<form method="POST" action="' + backendUrl + '/' + url + '/' + id + '" accept-charset="UTF-8" class="form-inline" id="formDelete' + id + '">' +
        '<input type="hidden" name="_token" value="' + csrf_token +'">' +
        '<input name="_method" type="hidden" value="DELETE">' +
        '<button type="submit" class="btn btn-danger btn-mini btnDelete" id="btnSubmitDelete2"' + disabled + '>' +
        '<i class="fa fa-remove"></i>' +
        '</button>' +
        '</form>';
}