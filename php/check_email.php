<?php
include_once("function/common_function.php");

$email = mysql_real_escape_string($_GET['email']);

$check_email_count = mysql_fetch_assoc(mysql_query("Select count(email) as row_count from users where email='".$email."' "));

if($check_email_count['row_count']==0)
{
	echo 'true';
}
else
{
	echo 'false';
}
