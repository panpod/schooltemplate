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
		
		<?php require_once 'blocks/revolution-slider.php'; ?>
		
		<div id="home-advanced-search" class="open">
			<?php require_once 'blocks/advanced-search.php'; ?>
		</div>
		
		<?php require_once 'blocks/properties-slider-fullwidth.php'; ?>
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">
				
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-8">
					
						<?php require_once 'blocks/recent-properties.php'; ?>
						
						<?php require_once 'blocks/latest-news-grid.php'; ?>
						<div class="center"><a href="blog-listing1.php" class="btn btn-default-color" data-animation-direction="from-bottom" data-animation-delay="850">View All News</a></div>
					</div>
					<!-- END MAIN CONTENT -->
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar col-sm-4">
						
						<!-- BEGIN SIDEBAR ABOUT -->
						<div class="col-sm-12">
							<h2 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">About Us</h2>
							<p class="center" data-animation-direction="from-bottom" data-animation-delay="200">
								Aliquam faucibus elit sed tempus molestie, aenean sodales venenatis. 
								<strong>Vestibulum pulvinar</strong> arcu suscipit, volutpat velit nec, euismod nibh vestibulum ut 
								sodales lacus, eget mattis arcu. Curabitur quis augue magna.
								<a href="about.php">Learn More</a>
							</p>
						</div>
						<!-- END SIDEBAR ABOUT -->
						
						<?php require_once 'blocks/widgets/our-agents.php'; ?>
						
						<div id="agencies" class="col-sm-12" data-animation-direction="fade" data-animation-delay="250">
							<h2 class="section-title">Our Agencies</h2>
								
								<?php require_once 'blocks/widgets/agencies-map.php'; ?>
								
								<select id="agency" name="agency" data-placeholder="Choose an agency">
								<option value=""> </option>
								<!-- The list of agencies will be automatically created. 
									Set the list of agencies in the file js/agencies.js -->
							</select>
						</div>
						
					</div>
					<!-- END SIDEBAR -->
					
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/testimonials.php'; ?>
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>