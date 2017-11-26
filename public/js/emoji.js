$(function(){
	$('.emoji-dragon').click((e) => {
        if (!e.target)
            return;
        if (e.target.nodeName === "IMG") {
            addEmojiToTextBox($(e.target).data('name'));
        }
    });
	$('.emoji-smile').click((e) => {
        if (!e.target)
            return;
        if (e.target.nodeName === "SPAN") {
            addEmojiToTextBox($(e.target).data('name'));
        }
    });
});

function addEmojiToTextBox(emojiName) {
    let msgBox = $('#msg-box');
    $(msgBox).val($(msgBox).val() + " :" + emojiName);
}

function convertSignToEmoji(contentText) {
    contentText = convertSignToDragon(contentText);
    return convertSignToSmile(contentText);
}

function convertSignToDragon(contentText){
	const TOTAL_EMOJI_DRAGON = 36;
    for (let i = TOTAL_EMOJI_DRAGON; i >= 1; i--) {
        contentText = contentText
            .split(`:dragon-${i}`)
            .join(`<img src="res/img/dragon/dragon (${i}).gif">`);
    }
    return contentText;
}

function convertSignToSmile(contentText) {
	for (let col = 2; col >= 0; col--){
		for (let row = 40; row >= 0; row--){
			let sign = `:s-${col}-${row}`;
			contentText = contentText
            .split(sign)
            .join(`<span class="emoji-item" style="background: 
            	url('res/img/emoji.png') ${col*50}% ${2.5*row}% / 300%;">
            	</span>`);
		}
	}
    return contentText;
}