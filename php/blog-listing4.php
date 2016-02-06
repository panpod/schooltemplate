<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php require_once 'blocks/head.php'; ?>
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
						<h1 class="page-title">Blog Listing 4</h1>
						
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Blog</a></li>
							<li><a href="blog-listing2.php">Blog Listing 4</a></li>
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
					
						<div id="listing-header" class="clearfix">
							<div class="form-control-small">
								<select id="sort_by" name="sort_by" data-placeholder="Sort">
									<option value=""> </option>
									<option value="data">Sort by Date</option>
									<option value="area">Sort by Area</option>
								</select>
							</div>
							
							<div class="sort">
								<ul>
									<li class="active"><i data-toggle="tooltip" data-placement="top" title="Sort Descending" class="fa fa-chevron-down"></i></li>
									<li><i data-toggle="tooltip" data-placement="top" title="Sort Ascending" class="fa fa-chevron-up"></i></li>
								</ul>
							</div>
							
							<div class="view-mode">
								<span>View Mode:</span>
								<ul>
									<li data-view="grid-style1" data-target="blog-listing"><i class="fa fa-th"></i></li>
									<li data-view="list-style" data-target="blog-listing" class="active"><i class="fa fa-th-list"></i></li>
								</ul>
							</div>
						</div>
						
						<?php require_once 'blocks/blog-rows.php'; ?>
						
						<?php require_once 'blocks/pagination.php'; ?>
						
					</div>	
					<!-- END MAIN CONTENT -->
					
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar gray col-sm-4">
						
						<?php require_once 'blocks/widgets/categories.php'; ?>
						
						<?php require_once 'blocks/widgets/archives.php'; ?>
						
						<?php require_once 'blocks/widgets/tags.php'; ?>
						
						<?php require_once 'blocks/widgets/latest-news.php'; ?>
						
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