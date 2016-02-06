<?php
include_once("function/common_function.php");
if($_GET['type'])
{
	$_SESSION['city'] = $_GET['type'];
	header('location:'.$_SERVER['HTTP_REFERER']);
}

?>