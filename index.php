<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login form</title>
<style>
img
{
	display:none;
}
</style>
<script src="http://www.google.com/jsapi"></script>
<script>
	google.load("jquery", "1");
</script>
</head>
<body>
<img src="images/loading.gif" />
<form>
username: <input type="text" name="username" id="username" /><br />
password: <input type="password" name="password" id="password" /><br />
<input type="submit" value="Submit" />
</form>
<script>
(function()
{
	$('input:text:visible:first').focus();  
	$('form').submit(function()
	{
		thisForm = $(this);
		thisUsername = thisForm.find('#username');
		thisPassword = thisForm.find('#password');
		thisForm.hide();
		$('img').show();	
		$.post('posthandler.class.php',
		{
			method:'login',
			username:thisUsername.val(),
			password:thisPassword.val()
		}, function(data)
		{
			$('img').hide(),
			thisForm.show(),			
			window.location.replace(data)
		});
	return false;
	});
})();
</script>
</body>
</html>
