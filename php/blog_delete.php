<?php
include_once("function/common_function.php");
$id = mysql_real_escape_string($_GET['id']);

$fetch_detail_array = mysql_fetch_assoc(mysql_query("Select * from user_blog  where id='".$id."' "));
$img = $fetch_detail_array['user_image'];
unlink('images/blog/'.$img);

$update_query = mysql_query("delete from user_blog where id = '".$id."' ");
header("location:user_blog.php");
 
