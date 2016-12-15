/**
 * Easy ajax handler
 * @param action
 * @param options
 * @param success
 * @param error
 */
function ajaxRequest(action, options, success, error) {

    if(options == undefined) {
        var options = {};
    }

    if(options.type == undefined) {
        options.type = "POST";
    }

    if(options.async == undefined) {
        options.async = true;
    }

    if(options.cache == undefined) {
        options.cache = false;
    }

    options.url = 'ajaxCall.php?action=' + action;

    options.success = success;
    options.error = error;

    $.ajax(options);
}