						<!-- BEGIN AGENCIES LISTING -->
						<ul id="agencies-results" class="agencies-list">
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map1" class="map"></div>
								<div class="info">
									<h2>Agency 1 <small>New York</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map2" class="map col-md-5"></div>
								<div class="info col-md-7">
									<h2>Agency 2 <small>California</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map3" class="map col-md-5"></div>
								<div class="info col-md-7">
									<h2>Agency 3 <small>New York</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map4" class="map col-md-5"></div>
								<div class="info col-md-7">
									<h2>Agency 4 <small>New York</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map5" class="map col-md-5"></div>
								<div class="info col-md-7">
									<h2>Agency 5 <small>Florida</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
							<li class="col-md-6"><!-- Set width to 6 columns for grid view mode only -->
								<div id="agency_map6" class="map col-md-5"></div>
								<div class="info col-md-7">
									<h2>Agency 6 <small>Florida</small></h2>
									
									<p>Mauris hendrerit risus a arcu dapibus varius. Quisque dictum, erat molestie vehicula pellentesque.</p>
									
									<ul class="contact-us">
										<li><a href="mailto:agency.name@yourdomain.com"><i class="fa fa-envelope"></i> agency.name@yourdomain.com</a></li>
									</ul>
									
									<a href="agency-detail.php" class="btn btn-default-color">More Details</a>
								</div>
							</li>
						</ul>
						<!-- END AGENCIES LISTING -->
						
						
						<!-- Agencies list -->
						<script src="js/agencies.js"></script>
						
						<script type="text/javascript">
							(function($){
								"use strict";
								
								$(document).ready(function(){
									//Create agencies maps
									Cozy.agencyMap(agencies, 'agency_map1', 0);
									Cozy.agencyMap(agencies, 'agency_map2', 1);
									Cozy.agencyMap(agencies, 'agency_map3', 2);
									Cozy.agencyMap(agencies, 'agency_map4', 3);
									Cozy.agencyMap(agencies, 'agency_map5', 4);
									Cozy.agencyMap(agencies, 'agency_map6', 5);
								});
							})(jQuery);
						</script>