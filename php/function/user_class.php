<?php  
 
    class User {  
            
        function __construct() {  
              
            // connecting to database  
            $db = new dbConnect();;  
               
        }  
        // destructor  
        function __destruct() {  
              
        }  

        public function list_portal_user()
        {
             $res = mysql_query("SELECT * FROM users  ORDER by f_name asc ");
            return $res;
        }  

        public function add_portal_user($f_name,$l_name,$email,$password,$acc_status)
        { 
            $str = "INSERT into users set f_name = '".$f_name."' , l_name = '".$l_name."', status = '".$acc_status."', email = '".$email."', password = '".$password."' , created_id = '0' ,   created = '".date("Y-m-d h:i:s")."'    "; 
            $qr = mysql_query($str) or die(mysql_error());  
             
            return $qr; 
        }
        public function delete_portal_user($id){  
                $qr = mysql_query("delete from users where id='".$id."' ") or die(mysql_error());  
                return $qr;  
               
        } 
        public function user_login($emailid, $password){  
            $res = mysql_query("SELECT * FROM users WHERE email = '".$emailid."' AND password = '".$password."' and status='2' ");  
            $user_data = mysql_fetch_array($res);  
            //print_r($user_data);  
            $no_rows = mysql_num_rows($res);  
              
            if ($no_rows == 1)   
            {  
           
                $_SESSION['login'] = true;  
                $_SESSION['user_id']    = $user_data['id'];
                $_SESSION['email']      = $user_data['email'];
                $_SESSION['f_name']     = $user_data['f_name'];
                $_SESSION['l_name']     = $user_data['l_name'];
                return TRUE;  
            }  
            else  
            {  
                return FALSE;  
            }  
               
                   
        }   

        public function isUserExist($emailid){  
            $qr = mysql_query("SELECT * FROM users WHERE emailid = '".$emailid."'");  
            echo $row = mysql_num_rows($qr);  
            if($row > 0){ 
                return false;  
            } else {   
                return true;  
            }  
        }

        
    }  
?>    