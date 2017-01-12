/**
 * Created by jonathan on 13/11/16.
 */
$(document).ready(function () {

    $.getScript("js/functions.js");

    if( getUrlParameter('action') == "showMessage") {

        $.getScript("js/wall.js");

    }

    $.getScript("js/chat.js");

    $.getScript("js/like.js");

    function getUrlParameter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'),
            sParameterName,
            i;

        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');

            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }


});



