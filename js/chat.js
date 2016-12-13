/**
 * Created by kenny on 13/12/16.
 */

$("#chat-global").draggable();

$('#chat-global').on("drag", function () {
    $('#chat-drag').hide();
    $('#chat-reset').show();
});

$("#chat-global").data({
    'originalLeft': $("#chat-global").css('left'),
    'origionalTop': $("#chat-global").css('top')
});

$("#chat-reset").click(function() {
    $("#chat-global").css({
        'left': $("#chat-global").data('originalLeft'),
        'top': $("#chat-global").data('origionalTop')
    });
    $('#chat-reset').hide();
    $('#chat-drag').show();
});

$('#chat-close').click(function () {
    $("#chat-global").css({
        'left': $("#chat-global").data('originalLeft'),
        'top': $("#chat-global").data('origionalTop')
    });
    $('#chat-reset').hide();
    $('#chat-drag').show();
    $("#chat-global").delay(200).slideUp("slow");
    $("#chat-fake").delay(680).show(0);
});

$('#chat-fake').click(function () {
    $("#chat-fake").delay(100).hide(0);
    $("#chat-global").slideDown("slow");
    // $("#chat-fake").delay(480).show(0);
});