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
	$acc_status = 2;
	$obj_user = new User();
	

	$check_user = $obj_user->isUserExist($email);
	if($check_user)
    {

        $add_user = $obj_user->add_portal_user($fname,$lname,$email,$password,$acc_status,$phone_no);
        $user_id = mysql_insert_id();
        $_SESSION['user_id'] 	= $user_id;
        $_SESSION['email'] 		= $email;
        $_SESSION['f_name'] 	= $firstname;
        $_SESSION['l_name'] 	= $lastname;
        $error_set 				= 2;
        $error_msg = "Your account cerated successfully.Please check your email for account activation.";
        header("location:welcome_register.php");exit;

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
			$page_title = 'SchoolzAndMore: User Registration page';
			require_once 'blocks/head.php';  
	?>

</head>
<body>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
	
		<?php require_once 'blocks/header.php'; ?>
		
		
		<!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Register</h1>
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
							<p style="margin-bottom:0px;">Your SchoolzAndMore account is always:</p>
<p style="margin-bottom:3px;">&bull; Safe and Secure</p>
<p style="margin-bottom:3px;">&bull; Quick and Easy to create</p>
<p style="margin-bottom:3px;">&bull; It’s free</p>
							
							<h1>What can you do with your account?</h1>
							<p style="margin-bottom:0px;">&bull; Access our entire listing of important information for your kids</p>
<p style="margin-bottom:3px;">&bull; List your business with us</p>
<p style="margin-bottom:3px;">&bull; Write informative blogs</p>
<p style="margin-bottom:3px;">&bull; Find development activities for your kids</p>
<p style="margin-bottom:3px;">&bull; Plan a vacation with your kids</p>
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
			rules: {
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
				firstname: "Please enter your firstname",
				lastname: "Please enter your lastname",
				phone: {
					required: "Please enter a phone",
					minlength: "Your phone must consist of 10 characters"
				},
				email: {
					required: "Please enter a email",
					email: "Please provide valid email",
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