/**
 * Created by jonathan on 13/11/16.
 */
$(document).ready(function () {

    $('#logout0').click(function () {

        $.ajax({
            url:'ajaxCall.php?action=logout',
            success: function (result) {
                alert(result);
            }
        });

    });

    /* Adding a like */
    $('[id^="like_"]').click( function () {
        var id = $( this ).attr('id');
        var idm = id.split('_')[1];

        /*alert("Like : Message n°" + idm);*/ // TEST

        $.ajax({
            type: 'POST',
            async: true,
            url:'ajaxCall.php?action=like',
            data: idm,
            success: function (result) {
                $('#like_' + idm + ' badge').val(result);
            },
            error: function() {
                alert("error");
            }
        });
    });

    $('#chat-header').click( function () {
       $('#chat-body').
    });

});
