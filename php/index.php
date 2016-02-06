<?php
include_once("function/common_function.php");
user_location_by_ip();

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php 
	$page_title = 'Home Page';
	require_once 'blocks/head.php'; 

	?>
</head>
<body>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
	
		<?php require_once 'blocks/header.php'; ?>
		
		<?php require_once 'blocks/home-search-hero.php'; ?>
		<?php /* ?>
		<!-- BEGIN PROPERTIES SLIDER WRAPPER-->
		<div class="parallax pattern-bg" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">New Properties Available</h1>
						
						<?php require_once 'blocks/properties-slider.php'; ?>
						
						</div>
				</div>
			</div>
		</div>
		<!-- END PROPERTIES SLIDER WRAPPER -->
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content colored">
			<div class="container">
				<div class="row">
				
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-8">
					
						<?php require_once 'blocks/features.php'; ?>
						
						<?php require_once 'blocks/property-gallery.php'; ?>
						
						<?php require_once 'blocks/latest-news-list.php'; ?>
						
					</div>
					<!-- END MAIN CONTENT -->
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar colored col-sm-4">
						
						<?php require_once 'blocks/widgets/find-an-agent.php'; ?>
						
						<div id="agencies" class="col-sm-12" data-animation-direction="fade" data-animation-delay="250">
							<h2 class="section-title">Our Agencies</h2>
								
								<?php require_once 'blocks/widgets/agencies-map.php'; ?>
								
								<select id="agency" name="agency" data-placeholder="Choose an agency">
								<option value=""> </option>
								<!-- The list of agencies will be automatically created. 
									Set the list of agencies in the file js/agencies.js -->
							</select>
						</div>
						
						<!-- BEGIN TESTIMONIALS -->
						<div id="testimonials" class="col-sm-12" data-animation-direction="from-bottom" data-animation-delay="200">
							<h2 class="section-title">Testimonials</h2>
							
							<?php require_once 'blocks/widgets/testimonials.php'; ?>
						</div>
						<!-- END TESTIMONIALS -->
						
						<?php require_once 'blocks/widgets/newsletter.php'; ?>
						
					</div>
					<!-- END SIDEBAR -->
					
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/partners-horizontal.php'; ?>
		<?php 
		*/ ?>
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>