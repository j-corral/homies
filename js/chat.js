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


    $("#chat-send").click(function () {
        ajaxSendMessage();
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

    var options = {};

    ajaxRequest("ajaxGetChatMessages", options, function (result) {

        if(result != undefined) {

            result.forEach(function (item) {
                //console.log(item);

                if(item.emetteur != undefined) {
                    //$("#chat-messages").append(item.emetteur.id);
                    $("#chat-messages").append(item.emetteur.prenom + ' ' + item.emetteur.nom);

                    if(item.emetteur.avatar != undefined) {
                        $("#chat-messages").append('<img src="'+item.emetteur.avatar+'" alt="avatar"/>');
                    }

                }

                if(item.post != undefined) {
                    $("#chat-messages").append(item.post.date);
                    //$("#chat-messages").append('<p>'+item.post.texte+'</p>');
                }

            });

        } else {
            $("#chat-messages").append("No messages");
        }

    }, function() {
        console.log("error get chat messages");
    });

}


function ajaxSendMessage() {


    var msg = $("#chat-area textarea").val();
    msg = $.trim(msg);

    if(msg.length > 0 && msg != ' ') {

        var options = {};
        options.data = {msg:msg};

        ajaxRequest("ajaxSendChatMessage", options, function (result) {

            if(result) {
                console.log(result);
                console.log('message sent');
                $("#chat-area textarea").val('');
            } else {
                console.log('message not sent');
            }
        }, function() {
            console.log('Error sending message !');
        });

    }

}

initChat();
initChatEvents();
ajaxGetMessages();
