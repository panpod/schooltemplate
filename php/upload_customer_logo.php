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
					
						
				<div class="alert alert-danger" id="message" style="display:none;">
  						<strong>Error!</strong> <?php echo $error_msg; ?>
					</div>
						<div class="login col-sm-5 col-sm-offset-3">
							<h1 class="center">Upload your logo</h1>
							
							<div id="image_preview"><img id="previewing" src="noimage.png" /></div>
							<div class="col-sm-12">
								<form class="form-style" id="uploadimage" name="uploadimage" method="post">
									<input type="file" name="file" id="file" placeholder="Upload logo" />
									<button type="submit" class="btn btn-fullcolor">Submit</button>
								</form>
							
								
								<a href="index.php" class="btn btn-default-color">Skip</a>
							</div>
							
							
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
$("#uploadimage").on('submit',(function(e) {
e.preventDefault();
$("#message").empty();
$('#loading').show();
$.ajax({
url: "ajax_php_file.php", // Url to which the request is send
type: "POST",             // Type of request to be send, called as method
data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
contentType: false,       // The content type used when sending data to the server.
cache: false,             // To unable request pages to be cached
processData:false,        // To send DOMDocument or non processed data file it is set to false
success: function(data)   // A function to be called if request succeeds
{
$('#message').show();
console.log(data);
if(data==1)
{
	window.location.href= 'index.php';
}
$("#message").html(data);
}
});
}));


$(function() {
$("#file").change(function() {
$("#message").empty(); // To remove the previous error message
var file = this.files[0];
var imagefile = file.type;
var match= ["image/jpeg","image/png","image/jpg"];
if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])))
{
$('#previewing').attr('src','noimage.png');
$("#message").html("Error: Please Select A valid Image File. Only jpeg, jpg and png Images type allowed");
return false;
}
else
{
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
}
});
});
function imageIsLoaded(e) {
$("#file").css("color","green");
$('#image_preview').css("display", "block");
$('#previewing').attr('src', e.target.result);
$('#previewing').attr('width', '250px');
$('#previewing').attr('height', '230px');
};
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