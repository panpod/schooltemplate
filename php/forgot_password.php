<?php
include_once("function/common_function.php");

$error_msg = '';
$error_set = '';

if(isset($_POST['email']))
{
	$email = mysql_real_escape_string($_POST['email']);

	$select_user = mysql_fetch_assoc(mysql_query("Select * from users where email = '".$email."' "));

// multiple recipients

$to .= $email;

// subject
$subject = 'Forgot password detail';

// message
$message = '
<html>
<head>
  <title>Forgot password</title>
</head>
<body>
  <p>Schoolzandmore is sending your password detail!</p>
  <table>
    <tr>
      <th>Email</th><td>'.$email.'</td>
    </tr>
   <tr>
      <th>Password</th><td>'.$select_user['password'].'</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: Schoolzandmore <info@schoolzandmore.com>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);



	
    $error_set 				= 1;
    $error_msg = "Email or Password detail incorrect";
    
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
						<h1 class="page-title">Forgot password</h1>
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
					<div class="alert alert-success">
  						<strong>Error!</strong> <?php echo $error_msg; ?>
					</div>
				<?php } ?>
						<div class="login col-sm-5 col-sm-offset-1">
							<h1 class="center">Forgot password</h1>
							
							<div class="col-sm-12">
								<form class="form-style" name="user_login_form" id="user_login_form" method="post">
									<input type="text" name="email" id="email" placeholder="Email Address" class="form-control" />
									<button type="submit" class="btn btn-fullcolor">Submit</button>
								</form>
							
								
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
					email: true,
					remote:'check_email_fp.php'
				}
			},
			messages: {				
				email: {
					required: "Please enter a email",
					email: "Please provide valid email",
					remote: "Please provide registered email"
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