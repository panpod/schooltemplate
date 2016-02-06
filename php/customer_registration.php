<?php
include_once("function/common_function.php");
$error_msg = '';
$error_set = '';
if(isset($_POST['firstname']))
{
	include_once('function/user_class.php');

	$fname = mysql_real_escape_string($_POST['firstname']);
	$lname = mysql_real_escape_string($_POST['lastname']);
	$phone_no = mysql_real_escape_string($_POST['phone']);
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	$business_id = mysql_real_escape_string($_POST['business_id']);
	$acc_status = 2;
	$obj_user = new User();
	

	$check_user = $obj_user->isUserExist($email);
	if($check_user)
    {

        $add_user = $obj_user->add_portal_user($fname,$lname,$email,$password,$acc_status,$phone_no);
        $user_id = mysql_insert_id();
        $_SESSION['user_id'] 	= $user_id;
        $_SESSION['email'] 		= $email;
        $_SESSION['f_name'] 	= $fname;
        $_SESSION['l_name'] 	= $lname;
        $_SESSION['tmp_business_id'] 	= $business_id;
        $error_set 				= 2;
        $error_msg = "Your account cerated successfully.Please check your email for account activation.";
        header("location:welcome_customer.php?id=$business_id");exit;

    }
    else
    {
        $error_set = 1;
        $error_msg = "User already in list";
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
			$page_title = 'SchoolzAndMore: Customer Registration page';
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
						<h1 class="page-title">Customer Registration </h1>
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
							<h1 class="center">Create New Account</h1>
							
							<div class="col-sm-12">
								<form class="form-style" name="user_reg" id="user_reg" method="post">
									 <?php 
                        				$query = " Select *  from category_type  order by name asc";
                       					$cat_data = mysql_query($query); 
                        			?>
									<select name="business_id" id="business_id" class="form-control">
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
                                  }
                                }
                              ?>
                            <option <?php echo $sel; ?> value="<?php echo $res['id'] ?>" ><?php echo $res['name'] ?></option>
                          <?php } } ?>
									</select>
									<input type="text" name="firstname" placeholder="First Name*" class="form-control" />
									<input type="text" name="lastname" placeholder="Last Name*" class="form-control" />
									<input type="text" name="phone" placeholder="Phone*" class="form-control" />
									<input type="email" name="email" placeholder="Email Address*" class="form-control" />
									<input type="password" name="password" id="password" placeholder="Password*" class="form-control" />
									<input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password*" class="form-control" />
									<?php /* ?>
									<div class="checkbox">
										<label >
											<input type="checkbox" name="agree" id="agree"> I confirm that I have read, understood and accept the <a href="#">Terms of Use</a> and the <a href="#">Privacy Policy</a>.
										</label>
									</div>
									<?php */ ?>
									
									<button type="submit" class="btn btn-fullcolor">Create Account</button>
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