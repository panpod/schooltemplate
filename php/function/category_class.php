<?php  
 
    class Category {  
            
        function __construct() {  
              
            // connecting to database  
            $db = new dbConnect();  
               
        }  
        // destructor  
        function __destruct() {  
              
        }  

        public function list_portal_category($id)
        {
            $res = mysql_query("SELECT * FROM category where category_type_id = '".$id."' ORDER by category_name asc ");
            return $res;
        }

          public function list_portal_category_attr_count($cat_type_id)
        {
            $res = mysql_query("SELECT count(id) as cat_count FROM category_attribute where category_id = '".$cat_type_id."' ");
            $res = mysql_fetch_assoc($res); 
            return $res;
        }

        

        public function display_portal_category_type_detail($id){  
            $res = mysql_query("SELECT * FROM category_type WHERE id = '".$id."' ");  
            $cat_data = mysql_fetch_assoc($res);  
            return $cat_data;
        }  

        public function display_portal_category_detail($id){  
            $res = mysql_query("SELECT * FROM category WHERE id = '".$id."' ");  
            $cat_data = mysql_fetch_assoc($res);  
            return $cat_data;
        } 
         public function display_duplicate_portal_category($id,$name,$city_id,$category_type_id){  
            $res = mysql_query("SELECT count(id) as row_count FROM category WHERE id != '".$id."' and ( category_name ='".$name."' and city_id = '".$city_id."' and category_type_id='".$category_type_id."' ) ");  
            $cat_data = mysql_fetch_assoc($res);  
            if($cat_data['row_count']==0)
            {
                return true;
            }
            else
            {
                return false;
            }
           
        }  


        public function update_portal_category($post_id,$post_name,$post_visiable, $city_id ,$category_type_id,$user_id){  
                $str = "Update category set category_name = '".$post_name."' , city_id = '".$city_id."' , is_visible = '".$post_visiable."' , user_id = '".$user_id."' , category_type_id = '".$category_type_id."'  where id = '".$post_id."' "; 
                $qr = mysql_query($str) or die(mysql_error());  
                return $qr;  
               
        } 

        public function add_portal_category($post_name,$post_category_type_id,$post_city,$post_visiable,$user_id){  
                $str = "INSERT into category set category_name = '".$post_name."' , category_type_id = '".$post_category_type_id."', is_visible = '".$post_visiable."',city_id = '".$post_city."' , user_id = '".$user_id."' , created = '".date('Y-m-d h:i:s')."'   "; 
                $qr = mysql_query($str) or die(mysql_error());  
                return mysql_insert_id();  
               
        } 

         public function add_user_category_attribute($attr_id,$value,$user_id,$cat_id){  
                $str = "INSERT into user_category_attribute set attr_id = '".$attr_id."' , value = '".$value."', user_id = '".$user_id."',cat_id = '".$cat_id."' , created = '".date("Y-m-d h:i:s")."'   "; 
                $qr = mysql_query($str) or die(mysql_error());  
                return mysql_insert_id();  
               
        }

         public function insert_user_cat_attr($attr_id,$value,$user_id,$cat_id){  
                $str = "INSERT into category set category_name = '".$post_name."' , category_type_id = '".$post_category_type_id."', is_visible = '".$post_visiable."',city_id = '".$post_city."'    "; 
                $qr = mysql_query($str) or die(mysql_error());  
                return $qr;  
               
        } 
        

        public function isCategoryExist($post_name,$post_category_type_id,$post_city,$user_id){  
            $qr = mysql_query("SELECT * FROM category WHERE category_name = '".$post_name."' and category_type_id = '".$post_category_type_id."' and city_id = '".$post_city."' and user_id = '".$user_id."' ");  
            $row = mysql_num_rows($qr);  
            if($row > 0){  
                return false;  
            } else {  
                return true;  
            }  
        }

        public function delete_portal_category($id){ 
            $res = mysql_query("SELECT * FROM category WHERE id = '".$id."' ");  
            $cat_data = mysql_fetch_assoc($res);
            $user_id = $cat_data['user_id'];

            $result = mysql_query("delete FROM user_category_attribute WHERE user_id = '".$user_id."' and cat_id = '".$id."'  "); 
            $res = mysql_query("delete FROM category WHERE id = '".$id."'  "); 
        }    
    }  
?>    