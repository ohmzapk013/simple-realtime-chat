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
function getInputText() {
    let msgBox = $('#msg-box');
    let txt = $(msgBox).val().trim();
    $(msgBox).val("");
    if (txt === "")
        return "";
    txt = txt.replace(/</g, '&lt;')
        .replace(/>/g, '&gt;')
        .replace(/\"/, "&quote;")
        .replace(/(script|alert|prompt|eval|confirm)/igm, "");
    return txt;
}

function wrapSendingData(msg, time) {
    let name = typeof NAME === "undefined" ? "Unknown" : NAME;
    return {
        sender: name,
        avt: AVT,
        message: msg,
        sendTime: time
    };
}

function getTime() {
    let date = new Date();
    return date.toLocaleString('en-US', { hour: 'numeric', minute: 'numeric', hour12: true });
}

function sendMessage() {
    $('#msg-box').focus();
    let txt = getInputText();
    if (txt === "")
        return;
    let data = wrapSendingData(txt, getTime());
    updateMessageBox(data, true);
    sendMessageToServer(data);
}

function updateMessageBox(data) {
    if (data.hasOwnProperty("img"))
        updateImageMessage(data.sender, data.sendTime, data.avt, data.img);
    else {
        updateTextMessage(data.sender, data.sendTime, data.avt, data.message, data.hasOwnProperty("file"));
    }
    $('#loading').hide();
    let box = $('#msg-content-box');
    $(box).scrollTop($(box)[0].scrollHeight);
}

function updateTextMessage(sender, time, avt, contentText, isFile) {
    if (isFile)
        contentText = `<a target="_blank" href="upload/${contentText}">${contentText}</a>`;
    contentText = convertSignToEmoji(contentText);
    let isMine = sender === NAME;
    let html;
    if (isMine) {
        html = `
        <div class="clear"></div>
        <div class="msg-content me">
            <div class="avt avt-${avt}"></div>
            <div class="msg-text">${contentText}</div>
        </div>`;
    } else {
        html = `
        <div class="clear"></div>
        <div class="msg-content stranger">
            <div class="name">
                <strong>${sender}</strong>
                <span class="time">, ${time}</span>
            </div>
            <div class="avt avt-${avt}"></div>
            <div class="msg-text">${contentText}</div>
        </div>`;
    }
    $('#msg-content-box').append(html);
}

function updateImageMessage(sender, time, avt, imgURL) {
    let isMine = sender === NAME;
    let html;
    if (isMine) {
        html = `
        <div class="clear"></div>
        <div class="msg-content me">
            <div class="avt avt-${avt}"></div>
            <div class="msg-img">
                <img class="img-attachment" src="upload/img/${imgURL}" height="200">
            </div>
        </div>`;
    } else {
        html = `
        <div class="clear"></div>
        <div class="msg-content stranger">
            <div class="name">
                <strong>${sender}</strong>
                <span class="time">, ${time}</span>
            </div>
            <div class="avt avt-${avt}"></div>
            <div class="msg-img">
                <img class="img-attachment" src="upload/img/${imgURL}" height="200">
            </div>
        </div>`;
    }
    $('#msg-content-box').append(html);
}

function sendMessageToServer(sendingData) {
    // console.log(JSON.stringify(sendingData));
    $.post(
        "message-text", { content: JSON.stringify(sendingData) },
        (response, status) => {
            // console.log(response);
            // console.log(status);
            if (!(status === "success" && response.hasOwnProperty("success"))) {
                alert("Unable to send message :((");
            }
        },
        'json'
    );
}