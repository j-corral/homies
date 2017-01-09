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

    if(options.dataType == undefined) {
        options.dataType = "JSON";
    }

    options.url = 'ajaxCall.php?action=' + action;

    options.success = success;
    options.error = error;

    $.ajax(options);
}


function escapeHtml(text) {
    'use strict';
    return text.replace(/[\"&'\/<>]/g, function (a) {
        return {
            '"': '&quot;', '&': '&amp;', "'": '&#39;',
            '/': '&#47;',  '<': '&lt;',  '>': '&gt;'
        }[a];
    });
}


function urlExists(testUrl) {
    var http = $.ajax({
        type:"HEAD", //Not get
        url: testUrl,
        async: false
    });

    console.log(http);
    return http.status==200;
}