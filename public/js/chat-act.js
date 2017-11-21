let me = false;
$(() => {
    $('#btn-send').click((e) => {
        e.preventDefault();
        sendMessage();
    });

    $('#msg-box').keyup((e) => {
        if (e.keyCode === 13)
            sendMessage();
    });
});

function wrapSendingData(msg, time){
    return {
        sender: "me",
        message: msg,
        sendTime: time
    };
}

/**
 *  Validate and return valid input text
 */
function getInputText(){
    let msgBox = $('#msg-box');
    let txt = $(msgBox).val().trim();
    $(msgBox).val("");
    if (txt === "")
        return "";
    if (/(script|alert|prompt|eval|confirm)/.test(txt))
        return "";
    return txt;
}

function sendMessage(){
    $('#msg-box').focus();
    let txt = getInputText();
    if (txt === "")
        return;
    let data = wrapSendingData(txt, Date());
    updateMessageBox(data, true);
    sendMessageToServer(data);
}

function updateMessageBox(data, isMine){
    let msgContentBox = $('#msg-content-box');
    if (isMine){
        let htmlMe = `<div class="clear"></div><div class="msg-content me">
            <div class="avt"></div><div class="msg-text">${data.message}</div></div>`;
        $(msgContentBox).append(htmlMe);
    } else {
        let htmlSt = `<div class="clear"></div><div class="msg-content stranger">
            <div class="avt"></div><div class="msg-text">${data.message}</div></div>`;
        $(msgContentBox).append(htmlSt);
    }
    $(msgContentBox).scrollTop($('#msg-content-box')[0].scrollHeight);
}

function sendMessageToServer(data){
    $.post()
}
