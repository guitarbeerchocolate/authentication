<?php
session_start();
if($_GET['sessionid']==session_id())
{
	echo 'Welcome '.$_SESSION['AUTH_USERNAME'];	
}
else
{
	header('Location:index.php');
}
require_once 'classes/authenticate.class.php';
echo '<br />private';
?>