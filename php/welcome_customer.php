<?php
include_once("function/common_function.php");
$error_msg = '';
$error_set = '';
if(isset($_POST['business_id']))
{
	include_once('function/category_class.php');

	$obj_cat_type = new Category();

	$post_visiable 	= 1;
    $user_id 		= $_SESSION['user_id'];
    $post_name  = $_POST['name'];
    $post_category_type_id  = $_POST['business_id'];
    $post_city    = $_POST['city'];

    if(!empty($post_name) && !empty($post_category_type_id)){
    // Check duplicate data 
        $check_cat = $obj_cat_type->isCategoryExist($post_name,$post_category_type_id,$post_city,$user_id);
        
        if($check_cat)
        {
            $check_portal_id = $obj_cat_type->add_portal_category($post_name,$post_category_type_id,$post_city,$post_visiable,$user_id);
            $arr_attr_id = $_POST['attr_id'];
            $arr_attr_val = $_POST['attr_arr'];
          if(!empty($arr_attr_id))
          {

              $i =0;
              $cat_id = $check_portal_id;
              foreach ($arr_attr_id as $key => $value) {
                if(!empty($arr_attr_val[$i]))
                {
                 
                  $attr_id  = trim($arr_attr_id[$i]);
                  $value    = trim($arr_attr_val[$i]);
                 $obj_cat_type->add_user_category_attribute($attr_id,$value,$user_id,$cat_id);
                }
                $i++;
              }
          }


          $query = "SELECT * FROM `category_attribute` inner join user_category_attribute on user_category_attribute.attr_id = `category_attribute`.id WHERE cat_id = '".$check_portal_id."' and  short_name = 'address' ";
			$sel_result = mysql_fetch_assoc(mysql_query($query));

			/* Update lat lang of category */    
			$address_gmap = $sel_result['value']+$post_city ;
			$json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address_gmap&sensor=false");
			$json = json_decode($json);

			$lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
			$long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
			

			$str = "Update category set lat = '".$lat."' , lang = '".$long."'  where id = '".$check_portal_id."' "; 
            $qr = mysql_query($str) or die(mysql_error()); 
            
            $error_set = 2;
            $error_msg = "Category added successfully";
            $_SESSION['tmp_business_id'] 	= $_POST['business_id'];
            header('location:upload_customer_logo.php');

        }
        else
        {
            $error_set = 1;
            $error_msg = "Category already in list";
        }
    }
    else
    {
        $error_set = 1;
        $error_msg = "Please enter category detail first";
    }
        
	
}
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php 
			$page_title = 'SchoolzAndMore: Customer business detail';
			require_once 'blocks/head.php';  
	?>

</head>
<body>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
	
		
		
		
		<!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Your business detail </h1>
						<?php /* ?>
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Pages</a></li>
							<li><a href="register.php">Register</a></li>
						</ul>
						<?php */  ?>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">
		
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-12">
					<?php if($error_set==2){ ?>
					<div class="alert alert-success">
  						<strong>Success!</strong> <?php echo $error_msg; ?>
					</div>
				<?php } else if($error_set==1){ ?>
					<div class="alert alert-danger">
  						<strong>Error!</strong> <?php echo $error_msg; ?>
					</div>
				<?php } ?>
						<div class="login col-sm-5 col-sm-offset-1">
							<h1 class="center">Your business detail </h1>
							
							<div class="col-sm-12">
								<form class="form-style" name="user_reg" id="user_reg" method="post">
									 <?php 
                        				$query = " Select *  from category_type  order by name asc";
                       					$cat_data = mysql_query($query); 
                        			?>
									<select name="business_id" id="business_id" class="form-control" onchange="return get_cat_list(this.value)">
										<option value="">Select your business</option>
										 <?php while($res = mysql_fetch_assoc($cat_data)){ 
                              $qry_count = mysql_num_rows(mysql_query(" SELECT category_type.id FROM category_attribute Inner join category_type on category_type.id = category_attribute.category_type_id where category_type.id = '".$res['id']."' group by category_type.id   "));
                              

                              if(!empty($qry_count)){
                                $sel = '';
                                if(isset($_GET['id']))
                                {
                                  if($_GET['id']==$res['id'])
                                  {
                                    $sel = " selected ";
                                    $txt = $res['name'];
                                  }
                                }
                              ?>
                            <option <?php echo $sel; ?> value="<?php echo $res['id'] ?>" ><?php echo $res['name'] ?></option>
                          <?php } } ?>
									</select>
									<input type="text" id="name" name="name" placeholder="<?php echo $txt; ?> Name*" class="form-control" />
									<?php 
				                        $query = " Select * from city order by name asc";
				                        $cat_data = mysql_query($query); 
				                        ?>
				                    <select class="form-control" name="city" id="city" >
				                    	<option value="">Select city</option>
				                          <?php while($res = mysql_fetch_assoc($cat_data)){ ?>
				                            <option value="<?php echo $res['id'] ?>" ><?php echo $res['name'] ?></option>
				                    	<?php } ?>
				                    </select>
									
									<?php 
                    $attr_query = mysql_query(" SELECT category_attribute.title,category_attribute.id FROM category_attribute Inner join category_type on category_type.id = category_attribute.category_type_id where category_type.id = '".$_GET['id']."'   "); 
                      if(mysql_num_rows($attr_query)>0)
                      {

                        while($res1 = mysql_fetch_assoc($attr_query)){

                    ?>
                    <input type="hidden" name="attr_id[]" id="attr_id[]" value="<?php echo $res1['id']; ?>"> 
                    <input type="text" class="form-control" id="attr_arr[]" name="attr_arr[]" value="" placeholder="Enter <?php echo $res1['title'] ?>">
                    
                    <?php } } ?>
									<?php /* ?>
									<div class="checkbox">
										<label >
											<input type="checkbox" name="agree" id="agree"> I confirm that I have read, understood and accept the <a href="#">Terms of Use</a> and the <a href="#">Privacy Policy</a>.
										</label>
									</div>
									<?php */ ?>
									
									<button type="submit" class="btn btn-fullcolor">Complete your profile</button>
								</form>
							</div>
							
							
						</div>
						
						<div class="login-info col-sm-4 col-sm-offset-1">
							<h1>Why should you create an account?</h1>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis purus sed justo egestas dapibus. Etiam vel sagittis nisi. Curabitur ac egestas lorem. Sed ut odio iaculis, interdum magna non, mattis dolor. Vestibulum id dignissim elit. Cras ut scelerisque dolor.</p>
							
							<h1>Sell you property with us.</h1>
							<p>Vestibulum rhoncus consequat aliquet. Mauris varius posuere mattis. Duis vitae molestie arcu. Curabitur sollicitudin, velit ut eleifend auctor, nibh orci pharetra risus, a malesuada nisi felis vel turpis. Aliquam fermentum nulla felis, sed molestie libero porttitor in. Vestibulum aliquet eu purus quis pellentesque. Nam eget lacus dolor.</p>
						</div>
					</div>	
					<!-- END MAIN CONTENT -->

				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript">
		$().ready(function() {
		// validate signup form on keyup and submit
		$("#user_reg").validate({
			ignore: [],
			rules: {
				business_id: "required",
				firstname: "required",
				lastname: "required",
				phone: {
					required: true,
					minlength: 10
				},
				email: {
					required: true,
					email: true,
					remote:'check_email.php'
				},
				password: {
					required: true,
					minlength: 5
				},
				confirm_password: {
					required: true,
					minlength: 5,
					equalTo: "#password"
				}
			},
			messages: {
				business_id: "Please select your business",
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				phone: {
					required: "Please enter a phone",
					minlength: "Your phone must consist of 10 characters"
				},
				email: {
					required: "Please enter a email",
					email: "Please provide a password",
					remote: "Email already in list"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				},
				confirm_password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long",
					equalTo: "Please enter the same password as above"
				}
			}
		});
		
	});

      function get_cat_list(id)
      {
        if(id=='')
        {
            window.location.href="welcome_customer.php";
        }
        else
        {
          window.location.href="welcome_customer.php?id="+id;  
        }
        
      }
      </script>
		<style>
form.user_reg label.error, label.error {
    color: red;
    font-style: italic;
}
input.error {
    border: 1px solid red;
}
		</style>
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>