/**
 * Created by jonathan on 13/11/16.
 */
$(document).ready(function () {

    $.getScript("js/notification.js");

    $.getScript("js/chat.js");

    $.getScript("js/like.js");

    /*$('#logout0').click(function () {

        $.ajax({
            url:'ajaxCall.php?action=logout',
            success: function (result) {
                alert(result);
            }
        });

    });*/


});
