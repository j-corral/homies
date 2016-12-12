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


    $('.notification .close').click(function () {
        $('.navbar').removeClass('navbar-success');
        $('.navbar').removeClass('navbar-danger');
        $('.navbar').addClass('navbar-info');
    });

    /* Adding a like */
    $('[id^="like_"]').click( function () {
        var id = $( this ).attr('id');
        var idm = id.split('_')[1];

        /*alert("Like : Message n°" + idm);*/ // TEST

        $.ajax({
            type: 'POST',
            async: true,
            url:'ajaxCall.php?action=likeMessage',
            data: {id:idm},
            success: function (result) {
                console.log(result);
                $('#like_' + idm + ' .badge').text(result);
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
