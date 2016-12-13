/**
 * Created by kenny on 13/12/16.
 */
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