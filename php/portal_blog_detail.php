<?php
include_once("function/common_function.php");
user_location_by_ip();

if(isset($_SESSION['user_id'])){
$user_id = $_SESSION['user_id'];


if(isset($_POST['action']))
{
	$action = $_POST['action'];
	if($action == 'post_user_blog')
	{
		// Insert new post 
		$query = mysql_query("INSERT into blog_comment set b_id = '".$_POST['blog_id']."' , level_id = '0' , user_id= '".$user_id."' , comment = '".mysql_real_escape_string($_POST['Comment'])."' , created = '".date('Y-m-d h:i:s')."' "); 

		header("location:user_blog_detail.php?id=".$_POST['blog_id']);
		exit;
	}

}

$fetch_user_blog = mysql_query("Select * from user_blog where user_id= '".$user_id."' order by created desc  ");
$tag_query = '';
if(mysql_num_rows($fetch_user_blog)>0)
{

	$tag_query = mysql_fetch_assoc(mysql_query("Select GROUP_CONCAT(distinct tag,',') as user_tag from user_blog   where user_id= '".$user_id."' group by user_id "));

}

}
$fetch_blog_detail = mysql_fetch_assoc((mysql_query("Select users.f_name,users.l_name,user_blog.* from user_blog Left join users on users.id=user_blog.user_id where user_blog.id = '".mysql_real_escape_string($_GET['id'])."'  ")));

//SELECT users.id as user_id,users.f_name,users.l_name,user_blog.id as blog_id,user_blog.title,user_blog.detail,admin_approve FROM user_blog Left join users on users.id=user_blog.user_id
?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php
	$page_title = 'SchoolzAndMore: User blog detail page'; 
	require_once 'blocks/head.php'; 
	?>
	
	<!-- Meta Tags for Social Networks sharing -->
	<meta content="en_US" property="og:locale">
	<meta content="article" property="og:type">
	<meta content="Cozy - Real Estate Template" property="og:site_name">
	<meta content="Cozy Blog Post" property="og:title">
	<meta content="Curabitur dapibus hendrerit dui, vel sagittis lectus laoreet et. Cras vitae purus dictum, fringilla urna sit amet, elementum leo. Etiam blandit enim eu arcu blandit sagittis. Aliquam ligula mi, luctus ut est non, hendrerit scelerisque eros. Integer a velit massa..." property="og:description">
	<meta content="http://www.wiselythemes.com/html/cozy/blog-detail.php" property="og:url">
	<meta content="http://www.wiselythemes.com/html/cozy/http://placehold.it/765x362" property="og:image">
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
						<h1 class="page-title" stle="color: #ccc;">Blog Detail</h1>
						
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="blog-detail.php">Blog Detail</a></li>
						</ul>
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
					<div class="main col-sm-8">
					
						<h1 class="blog-title"><?php echo $fetch_blog_detail['title'] ; ?></h1>
						
						<?php if(!empty($result['user_image'])){ ?>
						<div class="blog-main-image">
							<img src="images/blog/<?php echo $result['user_image'] ?>" alt="" />
						</div>
						<?php } ?>
						
						<?php
						$count_comment = mysql_fetch_assoc(mysql_query("select count(c_id) as count_data from blog_comment where b_id = '".$_GET['id']."'  "));
								
						?>
						<div class="blog-bottom-info">
							<ul>
								<li><i class="fa fa-calendar"></i> <?php echo date('d M, Y',strtotime($fetch_blog_detail['created'])) ?></li>
								<li><i class="fa fa-comments-o"></i> <?php echo $count_comment['count_data']; ?> Comments</li>
								<li><i class="fa fa-tags"></i> <?php echo str_replace(',', ' , ', $fetch_blog_detail['tag']); ?></li>
							</ul>
							
							<div id="post-author"><i class="fa fa-pencil"></i> By <?php echo $fetch_blog_detail['f_name'].' '.$fetch_blog_detail['l_name']; ?></div>
						</div>
						
						<div class="post-content">
							
							
							<?php echo $fetch_blog_detail['detail']; ?>
							
							
							
							
						</div>
						<?php 
						$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
						?>
						<div class="share-wraper col-sm-12 clearfix">
							<h5>Share this Post:</h5>
							<ul class="social-networks">
								<li><a target="_blank" href="http://www.facebook.com/sharer.php?s=<?php echo $actual_link; ?>"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/intent/tweet?url=<?php echo $actual_link; ?>"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="https://plus.google.com/share?url=<?php echo $actual_link; ?>"><i class="fa fa-google"></i></a></li>
								<li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php echo $actual_link; ?>"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="mailto:?subject=<?php echo $fetch_blog_detail['detail']; ?>&amp;body=<?php echo $actual_link; ?>"><i class="fa fa-envelope"></i></a></li>
							</ul>
							
							<a class="print-button" href="javascript:window.print();">
								<i class="fa fa-print"></i>
							</a>
						</div>
						
						<?php require_once 'blocks/widgets/user_comments.php'; ?>
						
					</div>	
					<!-- END MAIN CONTENT -->
					
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar gray col-sm-4">
						
						<?php // require_once 'blocks/widgets/categories.php'; ?>
						
						<?php // require_once 'blocks/widgets/archives.php'; ?>
						
						<?php require_once 'blocks/widgets/tags.php'; ?>
						
						<?php require_once 'blocks/widgets/portal_latest_news.php'; ?>
						
					</div>
					<!-- END SIDEBAR -->

				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>