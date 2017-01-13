/**
 * Author : Jonathan
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

/**
 * @autor: none (stackoverflow)
 * @param text
 * @returns {void|XML|string}
 */
function escapeHtml(text) {
    'use strict';
    return text.replace(/[\"&'\/<>]/g, function (a) {
        return {
            '"': '&quot;', '&': '&amp;', "'": '&#39;',
            '/': '&#47;',  '<': '&lt;',  '>': '&gt;'
        }[a];
    });
}

/**
 * @autor: none (stackoverflow)
 * @param testUrl
 * @returns {boolean}
 */
function urlExists(testUrl) {

    // todo fix issue caused by external links
    return true;

    var http = $.ajax({
        type:"HEAD", //Not get
        url: testUrl,
        async: false
    });

    //console.log(http);
    return http.status==200;
}


/**
 * @author : https://jsfiddle.net/gabrieleromanato/vBBnR/
 * @param str
 * @returns {string}
 */
function ucfirst(str, force) {

    var force = force || true;

    str=force ? str.toLowerCase() : str;
    return str.replace(/(\b)([a-zA-Z])/,
        function(firstLetter){
            return   firstLetter.toUpperCase();
        });
};

/**
 * @author: Jonathan
 * @param message
 * @param type
 */
function setNotif(message, type) {

    if(message.length > 0) {

        var icon = 'info_outline';

        if(type == 'success') {
            type = '-success ';
            icon = 'done';
        } else if (type == 'error') {
            type = '-danger ';
            icon = 'error_outline';
        } else {
            type = '-info ';
        }



        var html = '<div class="notification alert alerts'+type+'"> ' +
            '<div class="container-fluid"> ' +
            '<div class="alert-icon"> ' +
            '<i class="material-icons text'+type+'">'+icon+'</i> ' +
            '</div> ' +
            '<button type="button" class="close" data-dismiss="alert" aria-label="Close"> ' +
            '<span aria-hidden="true"><i class="material-icons">clear</i></span> ' +
            '</button> ' +
            '<p>'+message+'</p> ' +
            '</div> ' +
            '</div>';



        $("#notification").html(html);
        $('.navbar').removeClass('navbar-info');
        $('.navbar').removeClass('navbar-success');
        $('.navbar').removeClass('navbar-danger');
        $('#nav').addClass('navbar'+type);

    }

}
