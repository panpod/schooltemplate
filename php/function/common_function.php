<?php  
 
    include_once("dbConnect.php");

    // User location 
    function user_location_by_ip()
    {
        $ip = $_SERVER['REMOTE_ADDR'];
        $details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));

        if(isset($details->city))
        {
            $arr['city']    = $details->city;
            $arr['country'] = $details->country;
        }
        else
        {
            $arr['city']    = 'Pune';
            $arr['country'] = 'IN';
        }
        /*
          "ip": "8.8.8.8",
          "loc": "37.385999999999996,-122.0838",
          "city": "Mountain View",
          "region": "California",
          "country": "US"
        */
        return $arr;
    }

    function city_list($id=NULL)
    {
        $city_arr = array();
        // Fetch city list array
        $select_query = mysql_query("Select id,name from city order by name asc limit 0,20 ");
        $count = mysql_num_rows($select_query);
        if($count>0)
        {
            while ($result=mysql_fetch_assoc($select_query)) {
                    $city_arr[] = array('id'=>$result['id'], 'name'=>$result['name']);
            }
        }
        return $city_arr;
    }

    function list_category_type()
    {
        $cat_arr = array();
        // Fetch city list array
        $select_query = mysql_query("Select id,name from category_type where is_visible='1' order by order_id asc limit 0,20 ");
        $count = mysql_num_rows($select_query);
        if($count>0)
        {
            while ($result=mysql_fetch_assoc($select_query)) {
                    $cat_arr[] = array('id'=>$result['id'], 'name'=>$result['name']);
            }
        }
        return $cat_arr;
    }

    function category_detail($cat_id)
    {
        $result_arr = array();
        $search_query = mysql_query("Select user_category_attribute.value,category.*,city.name as city_name from user_category_attribute 
    INNER join category ON category.id=user_category_attribute.cat_id 
    INNER join category_attribute on category_attribute.id = user_category_attribute.attr_id
    INNER join city on city.id = category.city_id   
    WHERE category.is_visible=1 and category.id = '".$cat_id."' limit 0,1"); 
        if(mysql_num_rows($search_query)>0)
        {
            $result_arr = mysql_fetch_assoc($search_query);
        }
        return $result_arr;
    }


    function category_image($cat_id)
    {
        $result_arr = array();
        $search_query = mysql_query("Select * from category_image  
    WHERE cat_id = '".$cat_id."' ");
        if(mysql_num_rows($search_query)>0)
        {
            while($result = mysql_fetch_assoc($search_query))
            {
                $result_arr[] = $result;
            }
            
        }
        return $result_arr;
    }

    function category_attribute_list($cat_id,$count_low,$count_up)
    {
        $result_arr = array();
        $search_query = mysql_query("SELECT title,value FROM `user_category_attribute` 
inner join category_attribute on category_attribute.id = user_category_attribute.`attr_id` 
    WHERE cat_id = '".$cat_id."' and is_feature='y' limit $count_low,$count_up ");
        if(mysql_num_rows($search_query)>0)
        {
            while($result = mysql_fetch_assoc($search_query))
            {
                $result_arr[] = $result;
            }
        }
        return $result_arr;
    }

    function user_info($id)
    {
         $result_arr = array();
        $search_query = mysql_query("Select * from users WHERE id = '".$id."' limit 0,1"); 
        if(mysql_num_rows($search_query)>0)
        {
            $result_arr = mysql_fetch_assoc($search_query);
        }
        return $result_arr;
    }

    function category_type_detail($id)
    {
         $result_arr = array();
         //echo "Select * from category_type WHERE id = '".$id."' limit 0,1";
        $search_query_1 = mysql_query("Select * from category_type WHERE id = '".$id."' limit 0,1"); 
        if(mysql_num_rows($search_query_1)>0)
        {
            $result_arr = mysql_fetch_assoc($search_query_1);
        }
        return $result_arr;
    }
?>    