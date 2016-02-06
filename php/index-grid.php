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
		
		<?php require_once 'blocks/home-grid.php'; ?>
		
		<!-- BEGIN HOME ADVANCED SEARCH (class="gray" for a gray background) -->
		<div id="home-advanced-search" class="gray open">
			<?php require_once 'blocks/advanced-search.php'; ?>
		</div>
		<!-- END HOME ADVANCED SEARCH -->
		
		<div class="home3-hero">
			<div class="container">
				<div class="row">
					<div class="col-sm-7">
						<h2 data-animation-direction="from-left" data-animation-delay="100">We will help you find the perfect property that fits all your needs.</h2>
						<p data-animation-direction="from-left" data-animation-delay="300">Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque, enim elit sodales leo, id pharetra mi tortor at tellus. Etiam ornare, enim at tincidunt congue, nibh dui suscipit augue, pellentesque hendrerit ligula lorem vehicula sapien. Nunc aliquet pulvinar porta. Sed et ligula at lacus posuere convallis.</p>
						<a href="agent-listing.php" class="btn btn-default-color" data-animation-direction="from-left" data-animation-delay="500">Find an Agent</a>
					</div>
					
					<div class="col-sm-5" data-animation-direction="from-right" data-animation-delay="150">
						<?php require_once 'blocks/widgets/agencies-map.php'; ?>
					</div>
				</div>
			</div>
		</div>
		
		<!-- BEGIN PROPERTIES SLIDER WRAPPER-->
		<div class="parallax colored-bg" id="home-grid-latest-properties" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						<h1 class="section-title" data-animation-direction="from-bottom" data-animation-delay="50">Latest Properties</h1>
						
						<?php require_once 'blocks/properties-slider.php'; ?>
						
					</div>
				</div>
			</div>
		</div>
		<!-- END PROPERTIES SLIDER WRAPPER -->
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">
				
					<div class="main">
						<div class="col-sm-12">
							
							<?php require_once 'blocks/features-2.php'; ?>
							
						</div>
					
						<div class="content-divider col-sm-12"></div>
					
						<?php require_once 'blocks/our-agents.php'; ?>
					
						<!-- BEGIN TESTIMONIALS -->
						<div id="testimonials" class="col-sm-4">
							<h2 class="section-title" data-animation-direction="from-right" data-animation-delay="50">Testimonials</h2>
							
							<?php require_once 'blocks/widgets/testimonials.php'; ?>
						</div>
						<!-- END TESTIMONIALS -->
					</div>
				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/latest-news-gray.php'; ?>
		
		<?php require_once 'blocks/newsletter.php'; ?>
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->

</body>
</html>