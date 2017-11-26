<style type="text/css">
.emoji {
    border: 1px solid gray;
    display: inline-block;
    padding: 0;
    width: 280px;
    height: 300px;
    border-radius: 5px;
    box-shadow: 0 0 2px 2px lightgray;
    position: fixed;
    background-color: white;
    display: none;
    z-index: 1;
}

.emoji-body {
    overflow-y: auto;
    height: 250px;
}

.emoji-header {
    border-bottom: 1px solid lightgray;
}

.emoji-header ul {
    margin: 2px 2px 2px 10px;
    padding: 0;
}

.emoji-header li {
    display: inline-block;
    list-style: none;
    /*border: 1px solid black;*/
    margin: 0 4px;
    box-sizing: border-box;
    border-bottom: 2px solid transparent;
    transition: border 0.5s;
    cursor: pointer;
}

.emoji-header li img {
    width: 24px;
}

li.emoji-active {
    border-bottom: 2px solid dodgerblue;
}

li#emoji-close {
    float: right;
    font-size: 20px;
    font-weight: bold;
}

.emoji-item {
    width: 26px;
    height: 26px;
    display: inline-block;
    margin-top: 2px;
}
</style>
<div class="emoji" id="emoji">
    <div class="emoji-header">
        <ul>
            <li class="emoji-active"  id="emoji-dragon"><img data-name="emoji-dragon" src="res/img/dragon/dragon (1).gif"></li>
            <li id="emoji-smile"><img data-name="emoji-smile" src="res/img/smile/smile (1).jpg"></li>
            <li id="emoji-close">&times;</li>
        </ul>
    </div>
    <div class="emoji-body">
        <div class="emoji-list emoji-dragon">
            <!-- <a href=""><img src=""></a> -->
        </div>
        <div class="emoji-list emoji-smile" style="display: none;">
            
        </div>
    </div>
</div>
<script type="text/javascript">
$(function() {
    let htmlEmoji = '';
    for (let i = 1; i <= 36; i++) {
        let url = `res/img/dragon/dragon (${i}).gif`;
        let link = `<img data-name="dragon-${i}" src="${url}">`;
        htmlEmoji += link;
    }
    $('.emoji-dragon').html(htmlEmoji);

    htmlEmoji = '';
    for (let col = 0; col < 3; col++) {
        for (let i = 0; i <= 40; i++) {
            if (col === 2 && i === 3)
                break;
            let link = `<span class="emoji-item" data-name="s-${col}-${i}" style="background: url('res/img/emoji.png') ${col*50}% ${2.5*i}% / 300%;"></span>`;
            htmlEmoji += link;
        }
    }
    $('.emoji-smile').html(htmlEmoji);


    $('li').click(function(e) {
        if ($(this).attr('id') === "emoji-close")
            return;
        $('.emoji-header li').removeClass('emoji-active');
        $(this).addClass('emoji-active');
        $('.emoji-list').hide();
        $(`.${$(this).attr('id')}`).show();
    });

    $('#emoji-close').click(() => $('#emoji').hide());

});
</script>