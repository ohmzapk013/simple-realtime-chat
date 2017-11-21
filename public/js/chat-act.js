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

function wrapSendingData(msg, time){
    let name = typeof NAME === "undefined" ? "Unknown": NAME;
    return {
        sender: name,
        message: msg,
        sendTime: time
    };
}

function getTime(){
    let date = new Date();
    return date.toLocaleString('en-US', { hour: 'numeric',minute:'numeric', hour12: true });
}

function sendMessage(){
    $('#msg-box').focus();
    let txt = getInputText();
    if (txt === "")
        return;
    let data = wrapSendingData(txt, getTime());
    // updateMessageBox(data, true);
    sendMessageToServer(data);
}

function updateMessageBox(data){
    let msgContentBox = $('#msg-content-box');
    let isMine = data.sender === NAME;
    if (isMine){
        let htmlMe = `<div class="clear"></div><div class="msg-content me">
            <div class="avt"></div><div class="msg-text">${data.message}</div></div>`;
        $(msgContentBox).append(htmlMe);
    } else {
        let htmlSt = `<div class="clear"></div><div class="msg-content stranger">
            <div class="name"><strong>${data.sender}</strong><span class="time">, ${data.sendTime}</span>
            </div><div class="avt"></div>
            <div class="msg-text">${data.message}</div></div>`;
        $(msgContentBox).append(htmlSt);
    }
    $(msgContentBox).scrollTop($(msgContentBox)[0].scrollHeight);
}

function sendMessageToServer(sendingData){
    // console.log(JSON.stringify(sendingData));
    $.post(
        "send-message", 
        {content: JSON.stringify(sendingData)},
        (respondData, status) => {
            console.log(respondData);
            if (!(status === "success" && respondData.hasOwnProperty("success"))){
                alert("Unable to send message :((");
            }
        },
        'json'
    );
}
