/**
 * Created by jonathan on 13/12/16.
 */
$(document).ready(function () {

    $(document).on("click", '.notification .close', function () {
        $('.navbar').removeClass('navbar-success');
        $('.navbar').removeClass('navbar-danger');
        $('.navbar').addClass('navbar-info');
    });

});