/**
 * Created by jonathan on 13/12/16.
 */

$('.notification .close').click(function () {
    $('.navbar').removeClass('navbar-success');
    $('.navbar').removeClass('navbar-danger');
    $('.navbar').addClass('navbar-info');
});