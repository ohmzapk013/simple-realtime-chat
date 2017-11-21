<?php
if (!defined("SYSTEM_PATH"))
	die("Bad request");

 if (hasRegister())
	 redirect("chat-room");

if (isSubmit("register")){
	$name = getPostVal('name');
	if (!preg_match('/^[ a-zA-Z0-0_+]+$/', $name))
		$error = true;
	else {
		register($name);
		redirect("chat-room");
    }
}
?>
<?php require_once MODULE_PATH . 'common/header.php'; ?>

<div class="register-box">
	<form method="post">
		<input type="text" placeholder="Enter your nickname" autocomplete="false" name="name" value="Unknown" required>
		<input type="hidden" name="request-name" value="register">
		<button name="btn-join">Join</button>
	</form>
	<span class="error" style="display: <?php echo empty($error) ? "none": "inline-block"; ?>;">Your nickname is not valid</span>
</div>

<?php require_once MODULE_PATH . 'common/footer.php'; ?>