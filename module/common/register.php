<?php
if (!defined("SYSTEM_PATH"))
	die("Bad request");

 if (hasRegister())
	 redirect("chat-room");

if (isSubmit("register")){
	$name = getPostVal('name');
	$avt = getPostVal('avt');
	if (!preg_match('/^[a-zA-Z0-9 àảãáạằẳẵắặầẩẫấậèẻẽéẹềểễếệìỉĩíịòỏõóọồổỗốộờởỡớợùủũúụừửữứựỳỷỹýỵoôơđưăâê_+-]+$/', $name))
		$error = true;
	else {
		register($name, $avt);
		redirect("chat-room");
    }
}
?>
<?php require_once WIDGETS_PATH . 'header.php'; ?>

<div class="register-box">
	<form method="post">
		<input type="text" placeholder="Enter your nickname" autocomplete="false" name="name" required>
		<input type="hidden" name="avt" value="1">
		<input type="hidden" name="request-name" value="register">
		<button name="btn-join">Join</button>
		<span class="error" style="display: <?php echo empty($error) ? "none": "inline-block"; ?>;">Your nickname is not valid</span>
		<hr>
		<div class="choose-avt">
			<span style="margin: 3px auto; font-size: 13px">Choose avatar</span>
			<ul class="avt-list">
				<li class="avt-item active" data-avt="1" ><img src="res/img/avt (1).png"></li>
				<li class="avt-item" data-avt="2"><img src="res/img/avt (2).png"></li>
				<li class="avt-item" data-avt="3"><img src="res/img/avt (3).png"></li>
				<li class="avt-item" data-avt="4"><img src="res/img/avt (4).png"></li>
				<li class="avt-item" data-avt="5"><img src="res/img/avt (5).png"></li>
				<li class="avt-item" data-avt="6"><img src="res/img/avt (6).png"></li>
				<li class="avt-item" data-avt="7"><img src="res/img/avt (7).png"></li>
				<li class="avt-item" data-avt="8"><img src="res/img/avt (8).png"></li>
			</ul>
		</div>
	</form>
</div>

<?php require_once WIDGETS_PATH . 'footer.php'; ?>