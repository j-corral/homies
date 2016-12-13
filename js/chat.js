/**
 * Created by kenny on 13/12/16.
 */

$("#chat-global").draggable();

$('#chat-header').click(function () {
    $("#chat-global").slideUp("slow");
    $("#chat-fake").delay(480).show(0);
});

$('#chat-fake').click(function () {
    $("#chat-fake").delay(100).hide(0);
    $("#chat-global").slideDown("slow");
    // $("#chat-fake").delay(480).show(0);
});