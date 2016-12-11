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

});
