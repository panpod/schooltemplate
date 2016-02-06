<?php
include_once("function/common_function.php");

$error_msg = '';
$error_set = '';

if(isset($_POST['email']))
{
	$email = mysql_real_escape_string($_POST['email']);
	$password = mysql_real_escape_string($_POST['password']);
	include_once('function/user_class.php');
	$obj_user = new User();
	$check_user = $obj_user->user_login($email,$password);
	if(!$check_user)
    {
    	$error_set 				= 1;
        $error_msg = "Email or Password detail incorrect";
    }
    else
    {
    	header("location:index.php");
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
	$page_title = 'SchoolzAndMore: User login page';
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
						<h1 class="page-title">User Login</h1>
						<?php /* ?>
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Pages</a></li>
							<li><a href="login.php">Login</a></li>
						</ul>
						<?php */ ?>
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
					
						
				<?php if($error_set==1){ ?>
					<div class="alert alert-danger">
  						<strong>Error!</strong> <?php echo $error_msg; ?>
					</div>
				<?php } ?>
						<div class="login col-sm-5 col-sm-offset-1">
							<h1 class="center">Log in to your Account</h1>
							
							<div class="col-sm-12">
								<form class="form-style" name="user_login_form" id="user_login_form" method="post">
									<input type="text" name="email" id="email" placeholder="Email Address" class="form-control" />
									<input type="password" id="password" name="password" placeholder="Password" class="form-control" />
									<button type="submit" class="btn btn-fullcolor">Log in</button>
								</form>
							
								<p class="recover-pass"><a href="forgot_password.php">Forgot your email address or password?</a></p>
								
								<a href="register.php" class="btn btn-default-color">Create New Account</a>
							</div>
							
							
						</div>
						
						<div class="login-info col-sm-4 col-sm-offset-1">
							<h1>Why should you create an account?</h1>
							<p style="margin-bottom:0px;">Your SchoolzAndMore account is always:</p>
<p style="margin-bottom:3px;">&bull; Safe and Secure</p>
<p style="margin-bottom:3px;">&bull; Quick and Easy to create</p>
<p style="margin-bottom:3px;">&bull; It’s free</p>
							
							<h1>What can you do with your account?</h1>
							<p style="margin-bottom:0px;">Access our entire listing of important information for your kids</p>
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
		
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->
<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript">
		$().ready(function() {
		// validate signup form on keyup and submit
		$("#user_login_form").validate({
			rules: {
				email: {
					required: true,
					email: true
				},
				password: {
					required: true,
					minlength: 5
				}
			},
			messages: {				
				email: {
					required: "Please enter a email",
					email: "Please provide a password"
				},
				password: {
					required: "Please provide a password",
					minlength: "Your password must be at least 5 characters long"
				}
			}
		});
		
	});
		</script>
		<style>
form.user_login_form label.error, label.error {
    color: red;
    font-style: italic;
}
input.error {
    border: 1px solid red;
}
		</style>

</body>
</html>