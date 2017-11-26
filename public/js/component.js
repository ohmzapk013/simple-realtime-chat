$(function() {
    $('.avt-item').click(function() {
        $('.avt-item').removeClass('active');
        $(this).addClass('active');
        $('[name="avt"]').val($(this).data('avt'));
    });

    $('#msg-content-box').click((e) => {
        if (!(e.target && e.target.nodeName === "IMG"))
            return;
        console.log($(e.target).data('name'));
        if (typeof $(e.target).data('name') !== "undefined")
            return;
        $('#view-img').find('img').attr('src', e.target.src);
        $('#view-img').show();

    });

    $('.close').click(function(e) {
        e.preventDefault();
        let href = $(this).attr('href');
        $(href).hide();
    });

    $('#btn-open-emoji').click((e) => {
        e.preventDefault();
        let top = $('#btn-open-emoji').offset().top;
        let left = $('#btn-open-emoji').offset().left;
        let emoji = $('#emoji');
        let beginTop = top - $(emoji).height() - 20;
        let beginLeft = left - $(emoji).width() / 2;
        $(emoji).css({
            top: beginTop,
            left: beginLeft
        });
        $('#emoji').fadeToggle(50);
    });

    $('#chat-notify').click((e) => {
        e.preventDefault();
        requestNotification();
    });

    document.addEventListener('visibilityChange', changeTabStatus);
});

function playSound(){
    let audio = new Audio("res/msg.wav");
    audio.play();
}

function requestNotification(){
    if (typeof Notification === "undefined"){
        alert('Sorry, your browser not support notification!');
        return;
    }
    if (Notification.permission !== "granted")
        Notification.requestPermission();
    else alert("Success");
}

function notifyWhenNotFocus(){
    invokeNotification();
    changeTabStatus();
}

function invokeNotification(){
    if (!document.hidden)
        return;
    let title = "Chat with stranger";
    let msg = "New message received!";
    let iconLink = "res/img/favicon.png";
    let notice = new Notification(title, {body: msg, icon: iconLink});
    setTimeout(() => notice.close(), 2000);
}

function changeTabStatus(){
    document.title = document.hidden ? 
            "(*) New message": "Chat with stranger";
}