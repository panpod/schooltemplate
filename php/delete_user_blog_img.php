<?php
include_once("function/common_function.php");

$img = mysql_real_escape_string($_GET['img']);
$id = mysql_real_escape_string($_GET['id']);

unlink('images/blog/'.$img);

$update_query = mysql_query("Update user_blog set user_image = ''  where id = '".$id."' ");
header("location:edit_blog.php?id=".$id);
 
