/**
 * Created by kenny on 13/12/16.
 */
/* Adding a like */
$(document).on("click", ".btn-like", function () {

    var id = $( this ).attr('id');
    var idm = id.split('_')[1];

    var options = {};
    options.data = {id:idm};

    //console.log(options.data);

    ajaxRequest("likeMessage", options, function (result) {
        //console.log(result);
        $('#like_' + idm + ' .badge').text(result);
    }, function() {
        alert("error like");
    });

});