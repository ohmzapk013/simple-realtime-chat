<?php 
require_once 'constant.php';

require_once MODULE_PATH . "/common/header.php";
 ?>

	<div class="wrapper">
		
	<div id="msg-content-box">
		<div class="msg-content me">
			<div class="avt"></div>
			<div class="msg-text">
				hahahah
			</div>
		</div>
		<div class="clear"></div>
		<div class="msg-content stranger">

			<div class="name">
				<strong>Nguyễn Văn A</strong>, 11:20PM
			</div>
			<div class="avt"></div>
			<div class="msg-text">
				fdsafdsa đừng gọi tên nhau khi gió mưa fdsafdsa đừng gọi tên nhau khi gió mưa fdsafdsa đừng gọi tên nhau khi gió mưa fdsafdsa đừng gọi tên nhau khi gió mưa 
			</div>
		</div>
		<div class="clear"></div>
		<div class="msg-content me">
			<div class="avt"></div>
			<div class="msg-text">
				hihi <br> aha
				hihi <br> aha
				hihi <br> aha
			</div>
		</div>
	</div>
	<div class="clear" style="height: 100px"></div>
	<div id="type-msg-wrapper">
		<div id="msg-input-box">
			<input id="msg-box">
		</div>
		<div class="msg-button">
			<button id="btn-send">Send</button>
		</div>
	</div>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
	<script type="text/javascript" src="public/js/chat-act.js"></script>
</body>
</html>
<?php require_once MODULE_PATH . "/common/footer.php"; ?>