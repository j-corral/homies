/**
 * Created by kenny on 13/12/16.
 */
/* Adding a like */
$('[id^="like_"]').click( function () {
    var id = $( this ).attr('id');
    var idm = id.split('_')[1];

    var options = {};
    options.data = {id:idm};

    ajaxRequest("likeMessage", options, function (result) {
        console.log(result);
        $('#like_' + idm + ' .badge').text(result);
    }, function() {
        alert("error");
    });

});