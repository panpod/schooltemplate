<?php
include_once("function/common_function.php");
user_location_by_ip();

$user_id = $_SESSION['user_id'];



if(empty($user_id))
{
	header("location:login.php");
	exit;
}

if(isset($_POST['title']))
{
	$title = mysql_real_escape_string($_POST['title']);
	$tag = mysql_real_escape_string($_POST['tag']);
	$detail = mysql_real_escape_string($_POST['detail']);
	$edit_id = mysql_real_escape_string($_POST['edit_id']);
	
	

	if(!empty($title) && !empty($detail))
	{
		// Update data in user block 
		$update_query = mysql_query("INSERT into user_blog set title = '".$title."' , detail = '".$detail."' , tag= '".$tag."', user_id = '".$user_id."' , created='".date('Y-m-d h:i:s')."' ");
		$id = mysql_insert_id();
	}

	if(isset($_FILES['user_file']))
	{
		$file_type = $_FILES['user_file']['type'];
		if($file_type=='image/jpeg' ||  $file_type=='image/png' )
		{
			$file_detail = pathinfo($_FILES['user_file']['name']);
			if(!empty($file_detail))
			{
				//Unlink image 
				

				$tmp_name = $_FILES["user_file"]["tmp_name"];
				$image_name  = $id.'.'.$file_detail['extension'];
				$image_path  = 'images/blog/'.$image_name;
				move_uploaded_file($tmp_name, "$image_path");
				$update_query = mysql_query("Update user_blog set user_image = '".$image_name."'  where id = '".$id."' ");

			}
		}
	}
	header("location:user_blog.php");
}



$fetch_user_blog = mysql_query("Select * from user_blog where user_id= '".$user_id."' order by created desc  ");
$tag_query = '';
if(mysql_num_rows($fetch_user_blog)>0)
{

	$tag_query = mysql_fetch_assoc(mysql_query("Select GROUP_CONCAT(distinct tag,',') as user_tag from user_blog  where user_id= '".$user_id."' group by user_id "));

}


?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php 
	$page_title = 'User blog Page';
	require_once 'blocks/head.php';
	?>
</head>
<body>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
	
		<?php require_once 'blocks/header.php'; ?>
		<script src="ckeditor/ckeditor.js"></script>
		
		<!-- BEGIN PAGE TITLE/BREADCRUMB -->
		<div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="page-title">Add new blog</h1>
						<?php /* ?>
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="blog-listing3.php">Blog Listing 3</a></li>
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
					
					
						<div class=" main col-sm-8">
							<h1 class="center">Add new blog</h1>
							
							<div class="col-sm-12">
								<form method="post" id="user_login_form" name="user_login_form" class="form-style" novalidate="novalidate" enctype="multipart/form-data" >
									<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $_GET['id'] ?>">
									<input type="text" class="form-control" placeholder="Blog title" id="title" value="" name="title">
									<input type="text" class="form-control" placeholder="Tags like: school,tution" name="tag" id="tag" value="">
									
									<br><input type="file" name="user_file" id="user_file">
									<br>
									<textarea rows="10" cols="80" name="detail" id="detail"></textarea>
									<br/><button class="btn btn-fullcolor" type="submit">Submit</button>

									<button onclick="javascript:window.location.href='user_blog.php';" class="btn btn-primary" type="button">Back</button>
								</form>
							
								<p class="recover-pass"><a href="forgot_password.php"></a></p>
								
								<a class="" href="register.php"></a>
							</div>
							
							
						</div>
						
					 <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'detail' );
            </script>
					<!-- END MAIN CONTENT -->
					
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar gray col-sm-4" style="padding-top:0px;">
						
						<?php // require_once 'blocks/widgets/categories.php'; ?>
						
						<?php // require_once 'blocks/widgets/archives.php'; ?>
						
						<?php require_once 'blocks/widgets/tags.php'; ?>
						
						<?php require_once 'blocks/widgets/latest-news.php'; ?>
					</div>
					<!-- END SIDEBAR -->
					</div>	

				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>