<?php
session_start();
require_once 'classes/autoload.php';
$config = NULL;
$config = (object) parse_ini_file('classes/config.ini', true);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login form</title>
<?php
include 'includes/loginstyle.inc.php';
include 'includes/jquery.inc.php';
?>
</head>
<body>
<h1>Login</h1>
<img src="<?php echo $config->IMAGE_LOC; ?>loading.gif" />
<?php
include 'includes/loginform.inc.php';
include 'includes/loginscript.inc.php';
?>
</body>
</html>