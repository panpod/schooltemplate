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
						<h1 class="page-title">Contact Us</h1>
						
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="contacts.php">Contacts</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content contacts">
			<div id="contacts_map"></div>
			
			<script type="text/javascript">
				var singleMarker = [
					{
						"id": 0,
						"title": "Cozy Real State",
						"latitude": 40.727815,
						"longitude": -73.993544,
						"image": "http://placehold.it/700x603",
						"description": "Lafayette St New York, NY <br> Phone: 00351 123 456 789",
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
				
					<div id="contacts-overlay" class="col-sm-7">
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
						<p class="col-sm-12 center">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse facilisis purus sed justo egestas dapibus. <strong>Etiam vel sagittis</strong> nisi. Curabitur ac egestas lorem. Sed ut odio iaculis, interdum magna non, mattis dolor. Vestibulum id dignissim elit. <a href="#">Learn more</a></p>
						
						<form>						
							<div class="col-sm-12">
								<input type="text" name="Name" placeholder="Name" class="form-control required fromName" />
							
								<input type="email" name="Email" placeholder="Email" class="form-control required fromEmail"  />
							
								<input type="text" name="Subject" placeholder="Subject" class="form-control required subject"  />
								<textarea name="Message" placeholder="Message" class="form-control required"></textarea> 
							</div>
							
							<div class="center">
								<button type="submit" class="btn btn-default-color btn-lg submit_form"><i class="fa fa-envelope"></i> Send Message</button>
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
	<!-- END WRAPPER -->

</body>
</html>