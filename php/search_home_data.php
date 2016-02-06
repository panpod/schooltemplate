<?php
include_once("function/common_function.php");
$_data = mysql_real_escape_string($_GET['term']);
$search_query =mysql_query("Select user_category_attribute.value,category.category_name from user_category_attribute 
	INNER join category ON category.id=user_category_attribute.cat_id 
	INNER join category_attribute on category_attribute.id = user_category_attribute.attr_id
	WHERE category.is_visible=1 and value like  '%".$_data."%' group by category.id limit 0,10 "); 
	$array = array();
	$count = mysql_num_rows($search_query);
	{
		while($result = mysql_fetch_assoc($search_query))
		{
			$array[] = $result['category_name'];
		}
		
	}

	echo json_encode ($array); //Return the JSON Array

?>
