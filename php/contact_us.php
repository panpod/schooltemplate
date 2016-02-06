<?php
include_once("function/common_function.php");
user_location_by_ip();

$user_id = $_SESSION['user_id'];

$error_msg = '';
$error_set = '';
if(isset($_POST['firstname']))
{
	include_once('function/user_class.php');

	$name = mysql_real_escape_string($_POST['name']);
	$subject = mysql_real_escape_string($_POST['subject']);
	$message = mysql_real_escape_string($_POST['message']);
	$email = mysql_real_escape_string($_POST['email']);

	$error_set 				= 2;
    $error_msg = "Your request send successfully";

    $to .= ADMIN_EMAIL;

// subject
$subject = 'Request from client';

// message
$message = '
<html>
<head>
  <title>Request from client</title>
</head>
<body>
  <p>Schoolzandmore is sending your password detail!</p>
  <table>
  <tr>
      <th>Title</th><td>'.$subject.'</td>
    </tr>
    <tr>
      <th>Name</th><td>'.$name.'</td>
    </tr>
     <tr>
      <th>Email</th><td>'.$email.'</td>
    </tr>
   <tr>
      <th>Detail</th><td>'.$message.'</td>
    </tr>
  </table>
</body>
</html>
';

// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Additional headers
$headers .= 'From: '.$name.'<'.$email.'>' . "\r\n";

// Mail it
mail($to, $subject, $message, $headers);

        
	
}

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php 
	$page_title = 'Contact us Page';
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
						<h1 class="page-title">Contact Us</h1>
						<?php /* ?>
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="contacts.php">Contacts</a></li>
						</ul>
						<?php */ ?>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
		<?php if($error_set==2){ ?>
					<div class="alert alert-success">
  						<strong>Error!</strong> <?php echo $error_msg; ?>
					</div>
		<?php } ?>
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content contacts">
			<div id="contacts_map"></div>
			
			<script type="text/javascript">
				var singleMarker = [
					{
						"id": 0,
						"title": "CorpCloud",
						"latitude": 18.59424,
						"longitude": 73.80239,
						"image": "http://placehold.it/700x603",
						"description": "B2-03 Yashodevi Avenue, Vishwashanti Lane 4, Pimple Saudagar, Pune <br> Maharashtra: 411027 ",
						"map_marker_icon": "images/markers/coral-marker-cozy.png"
					}
				];
				
				(function ($) {
					"use strict";
					
					$(document).ready(function () {
						//Create contacts map. Usage: Cozy.contactsMap(marker_JSON_Object, map canvas, map zoom);
						Cozy.contactsMap(singleMarker, 'contacts_map', 14);
					});
				})(jQuery);
			</script>
			
			<div class="container">
				<div class="row">
				
					<div id="contacts-overlay" class="col-sm-7" style="display:none;">
						<i id="contacts-overlay-close" class="fa fa-minus"></i>
						
						<ul class="col-sm-6">
							<li><i class="fa fa-map-marker"></i> 24th Street, New York, USA</li>
							<li><i class="fa fa-envelope"></i> <a href="mailto:youremail@domain.com">youremail@domain.com</a></li>
						</ul>
						
						<ul class="col-sm-6">
							<li><i class="fa fa-phone"></i> Tel.: 00351 123 456 789</li>
							<li><i class="fa fa-print"></i> Fax: 00351 456 789 101</li>
						</ul>
					</div>
					
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-4 col-sm-offset-8">
						<h2 class="section-title">Contact Form</h2>
						<p class="col-sm-12 center">B2-03 Yashodevi Avenue,  Vishwashanti Lane 4,<br/> Pimple Saudagar, Pune, Maharashtra-411027 </p>
						
						<form name="user_reg" id="user_reg" method="post" action="">						
							<div class="col-sm-12">
								<input type="text" name="name" id="name" placeholder="Name" class="form-control required fromName" />
							
								<input type="email" name="email" id="email" placeholder="Email" class="form-control required fromEmail"  />
							
								<input type="text" name="subject" id="subject" placeholder="Subject" class="form-control required subject"  />
								<textarea name="message" name="message" placeholder="Message" class="form-control required"></textarea> 
							</div>
							
							<div class="center">
								<button type="submit" class="btn btn-default-color btn-lg"><i class="fa fa-envelope"></i> Send Message</button>
							</div>
						</form>
					</div>	
					<!-- END MAIN CONTENT -->

				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript">
		$().ready(function() {
		// validate signup form on keyup and submit
		$("#user_reg").validate({
			rules: {
				name: "required",				
				email: {
					required: true,
					email: true
				},
				subject: "required",
				message: "required"
			},
			messages: {
				name: "Please enter your name",
				email: {
					required: "Please enter a email",
					email: "Please provide valid email"
				},
				subject: "Please enter your subject",
				message: "Please enter your message"
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
	<!-- END WRAPPER -->

</body>
</html>