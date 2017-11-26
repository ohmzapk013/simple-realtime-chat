<?php
if (!defined("SYSTEM_PATH"))
	die("Bad request");

if (hasRegister())
   echo "<script>const NAME = '" . getCurrentName() ."'; const AVT = '" . getAvtName() ."';</script>";
else redirect("involve");
 ?>
<?php require_once WIDGETS_PATH . "header.php"; ?>
	<div class="wrapper">
	<div id="msg-content-box">
        <!-- <div class="msg-content me">
            <div class="avt avt-1"></div>
            <div class="msg-img">
                <img src="http://localhost/realtime-chat/upload/img/97f6f231819d4a090445c25028c34581.png" width="250">
            </div>
        </div>
		<div class="clear"></div>
		<div class="msg-content stranger">

			<div class="name">
				<strong>Nguyễn Văn A</strong>, 11:20PM
			</div>
			<div class="avt avt-4"></div>
			<div class="msg-img">
				<img src="http://localhost/realtime-chat/upload/img/97f6f231819d4a090445c25028c34581.png" width="250">
			</div>
		</div>
		<div class="clear"></div> -->
		<?php require_once WIDGETS_PATH . 'emoji.php'; ?>
	</div>
	<div class="clear" style="height: 100px"></div>
	<div id="type-msg-wrapper">
		<div id="msg-input-box">
			<input id="msg-box">
		</div>
		<div class="msg-button">
			<button id="btn-upload-img" class="btn-media btn-picture">&nbsp;</button>
			<button id="btn-upload-file" class="btn-media btn-file">&nbsp;</button>
			<button id="btn-open-emoji" class="btn-media btn-emoji">&nbsp;</button>
			<button id="btn-send">Send</button>
		</div>
	</div>
	</div>

	<form id="form-upload-img" enctype="multipart/form-data">
		<input type="file" style="display: none;" name="img" id="choose-img" accept="image/jpeg,image/x-png">
	</form>

	<form id="form-upload-file" enctype="multipart/form-data">
		<input type="file" style="display: none;" name="file" id="choose-file">
	</form>

	<div id="loading">
		<img width="80" src="res/img/control/loading.gif">
		<p id="total-complete">0%</p>
	</div>

	<div id="view-img" class="modal">
		<a href="#view-img" class="close">&times;</a>
		<img src="">
	</div>

	<div class="navigation">
		<a id="chat-notify" href="chat-notify" title="Thông báo tin nhắn mới"><div class="notify"></div></a>
		<a href="chat-leave" title="Thoát"><div class="leave"></div></a>
	</div>


<?php require_once WIDGETS_PATH . 'footer.php'; ?>