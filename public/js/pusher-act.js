function registerPusher(){
    let pusher = new Pusher("9cb1a77ca80603cc21bd", {
        cluster: "ap1"
    });
    let channel = pusher.subscribe("public-room");
    channel.bind('new-message', (data) => {
        updateMessageBox(data);
    });
}

$(function () {
    registerPusher();
});