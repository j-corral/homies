/**
 * Created by jonathan on 13/12/16.
 */

var last_msg = 0;

function initChat() {


    $("#chat-global").draggable({
        containment: $('#main-container'),

        stop: function (event, ui) {
            if (ui.position.top < 70) {
                $('#chat-drag').trigger('click');
            } else if (ui.position.top + $(this).height() > (window.screen.height)) {
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

    $("#chat-reset").click(function () {
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

        height = parseInt($("#chat-messages")[0].scrollHeight);
        $("#chat-messages").animate({scrollTop: height}, 0);

    });


    $('#chat-drag').click(function () {
        $("#chat-global").css({
            'width': "100%",
            'height': "calc(100vh - 70px)",
            'left': 0,
            'top': '70px'
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


    $("#chat-area textarea").keypress(function (e) {

        if(e.which == 13 && !e.shiftKey) {
           $("#chat-send").trigger('click');
        }

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

    var height = 0;

    var options = {};

    options.data = {last:last_msg};

    ajaxRequest("ajaxGetChatMessages", options, function (result) {

        if (result != undefined) {

            if(result.length > 0 && result[result.length - 1].id != undefined) {

                //console.log('new messages');

                last_msg = result[result.length - 1].id;
                //console.log(last_msg);

                // notify when closed


            result.forEach(function (item) {
                    //console.log(item.id);

                    var id = '';
                    var avatar = default_avatar;
                    var prenom = 'undefined';
                    var nom = 'name';

                    var msg_text = '...';
                    var msg_date = 'undefined date';

                    if (item.emetteur != undefined) {
                        id = item.emetteur.id;

                        if(item.emetteur.prenom != undefined) {
                            prenom = ucfirst(item.emetteur.prenom);
                        }

                        if(item.emetteur.nom != undefined) {
                            nom =   ucfirst(item.emetteur.nom);
                        }

                        if (item.emetteur.avatar != undefined && item.emetteur.avatar.length > 0) {

                            if(urlExists(item.emetteur.avatar)) {
                                avatar = item.emetteur.avatar;
                            }

                        }

                    }

                    if (item.post != undefined) {
                        msg_date = item.post.date;

                        if(item.post.texte != undefined) {

                            var msg = $.trim(item.post.texte);

                            if(msg.length > 0 && msg != ' ') {
                                msg_text = escapeHtml(msg);
                            }

                        }
                    }

                    var html = '<div class="row msg-row"> ' +
                        '<div class="author pull-left msg-author"> ' +
                        '<a href="'+ profile_link + id +'"> ' +
                        '<img class="avatar img-rounded" src="'+avatar+'"> ' +
                        '<span class="text-bold">'+ prenom + ' ' + nom +'</span> ' +
                        '</a> ' +
                        '</div> ' +
                        '<div class="card content-info msg-card"> ' +
                        '<h4>'+msg_text+'</h4> ' +
                        '<span class="text-gray pull-right msg-date">'+msg_date+'</span> ' +
                        '</div> ' +
                        '</div>';

                    $("#chat-messages").append(html);



                });


                height = parseInt($("#chat-messages")[0].scrollHeight);
                //console.log($("#chat-messages").scrollTop());
                $("#chat-messages").animate({scrollTop: height}, 0);

            }

        } else {
            $("#chat-messages").append("No messages");
        }

    }, function () {
        setNotif("error get chat messages", 'error');
    });

}


function ajaxSendMessage() {


    var msg = $("#chat-area textarea").val();
    msg = $.trim(msg);

    if (msg.length > 0 && msg != ' ') {

        var options = {};
        options.data = {msg: msg};

        ajaxRequest("ajaxSendChatMessage", options, function (result) {

            if (result) {
                //console.log(result);
                setNotif('Chat message sent', 'success');
                $("#chat-area textarea").val('');
                ajaxGetMessages();
            } else {
                setNotif('Chat message not sent', 'error');
            }
        }, function () {
            setNotif('Error sending chat message !', 'error');
        });

    }

}

initChat();
initChatEvents();
ajaxGetMessages();

//$('#chat-fake').trigger('click');

setInterval(ajaxGetMessages, 6000);


