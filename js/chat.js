/**
 * Created by kenny on 13/12/16.
 */

function initChat() {

    $("#chat-global").draggable({
        containment: $('#main-container'),

        stop: function(event, ui) {
            if(ui.position.top < 70) {
                $('#chat-drag').trigger('click');
            } else if(ui.position.top + $(this).height() > (window.screen.height)){
                resetChat();
            }
        }
    });

    $("#chat-global").resizable({
        minHeight: 370,
        minWidth: 300,
    });

    $("#chat-global").data({
        'originalLeft': $("#chat-global").css('left'),
        'origionalTop': $("#chat-global").css('top'),
        'origionalWidth': $("#chat-global").css('width'),
        'origionalHeight': $("#chat-global").css('height'),
    });

}

function resetChat() {
    $("#chat-reset").trigger('click');
}


function initChatEvents() {

    $("#chat-reset").click(function() {
        $("#chat-global").css({
            'left': $("#chat-global").data('originalLeft'),
            'top': $("#chat-global").data('origionalTop'),
            'width': $("#chat-global").data('origionalWidth'),
            'height': $("#chat-global").data('origionalHeight'),
        });
        $('#chat-reset').hide();
        $('#chat-drag').show();
        resizeChatContent();
    });

    $('#chat-global').on("drag", function () {
        $('#chat-drag').hide();
        $('#chat-reset').show();
    });

    $('#chat-close').click(function () {
        resetChat();
        $("#chat-global").delay(200).slideUp("slow");
        $("#chat-fake").delay(700).show(0);
    });

    $('#chat-fake').click(function () {
        $("#chat-fake").delay(100).hide(0);
        $("#chat-global").slideDown("slow");
    });


    $('#chat-drag').click(function () {
        $("#chat-global").css({
            'width': "100%",
            'height': "calc(100vh - 70px)",
            'left' : 0,
            'top' : '70px'
        });
        $('#chat-drag').hide();
        $('#chat-reset').show();
        resizeChatContent();
    });


    $("#chat-global").resize(function () {
        resizeChatContent();
    });

}


function resizeChatContent() {
    var chatHeight = document.getElementById('chat-global').getBoundingClientRect().height;
    var headerHeight = document.getElementById('chat-header').getBoundingClientRect().height;
    var areaHeight = document.getElementById('chat-area').getBoundingClientRect().height;

    var messagesHeight = chatHeight - ( headerHeight + areaHeight + 80 );

    //console.log("msg height:", messagesHeight);

    $('#chat-messages').css('height', messagesHeight);
}


function ajaxGetMessages() {

    $.ajax({
        type: 'POST',
        async: true,
        url:'ajaxCall.php?action=ajaxGetChatMessages',
        cache: false,
        //data: ,
        success: function (result) {
            console.log(result);
            $("#chat-messages").append(result);
        },
        error: function() {
            console.log("error get chat messages");
        }
    });

}

initChat();
initChatEvents();
//ajaxGetMessages();
