<?php
include_once("function/common_function.php");
$id = $_GET['id'];
$cat_array = category_detail($id);


$user_array = user_info($cat_array['id']);
$category_type_detail_arr = category_type_detail($cat_array['category_type_id']);

/*
$curl = curl_init();

curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address=' . rawurlencode($address));

curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);

$json = curl_exec($curl);

curl_close ($curl);
*/

$query = "SELECT * FROM `category_attribute` inner join user_category_attribute on user_category_attribute.attr_id = `category_attribute`.id WHERE cat_id = '".$id."' and  short_name = 'address' ";
$sel_result = mysql_fetch_assoc(mysql_query($query));
$cat_img_array = category_image($id);								

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<?php 
	$page_title = 'Detail Page';
	require_once 'blocks/head.php'; 

	?>
	
	<!-- Meta Tags for Social Networks sharing -->
	<meta content="en_US" property="og:locale">
	<meta content="article" property="og:type">
	<meta content="Cozy - Real Estate Template" property="og:site_name">
	<meta content="Cozy Property" property="og:title">
	<meta content="Cras lobortis, diam et ultricies imperdiet, urna urna pharetra est, vitae euismod lectus dolor nec sapien. Morbi consectetur ut metus quis elementum. Sed condimentum dui at nulla aliquet condimentum. Nullam vitae odio a nibh scelerisque condimentum et consequat sapien..." property="og:description">
	<meta content="http://www.wiselythemes.com/html/cozy/properties-detail.php" property="og:url">
	<meta content="http://www.wiselythemes.com/html/cozy/http://placehold.it/764x423" property="og:image">
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
						<h1 class="page-title"><b><?php echo $cat_array['category_name'] ?></b> Detail</h1>
						<?php /* ?>
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Properties</a></li>
							<li><a href="properties-detail.php">Property Detail</a></li>
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

					<?php	
					$address = $sel_result['value'].','.$cat_array['city_name'] ;
					/*				
					if(empty($cat_array['lat']) or empty($cat_array['lang']))
					{
						$address = $sel_result['value'].','.$cat_array['city_name'] ;

						$curl = curl_init();
						
						curl_setopt($curl, CURLOPT_URL, 'https://maps.googleapis.com/maps/api/geocode/json?address=' . rawurlencode($address));

						curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);

						$json = curl_exec($curl);
						
						curl_close ($curl);
					}
					*/
					
					?>
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-8">
					
						<h1 class="property-title"><?php echo $cat_array['category_name'] ?>
							<small><?php if(!empty($sel_result['value'])){ echo $sel_result['value'].' , '; } ?> <?php echo $cat_array['city_name']; ?></small></h1>
						
						<div class="property-topinfo">
							<?php /* ?>
							<ul class="amenities">
								<li><i class="icon-apartment"></i> Apartment</li>
								<li><i class="icon-area"></i> 2150 Sq Ft</li>
								<li><i class="icon-bedrooms"></i> 4</li>
								<li><i class="icon-bathrooms"></i> 3</li>
							</ul>
							<?php */ ?>
							<div id="property-id">ID: #<?php echo 'sch'.$_GET['id']; ?></div>
						</div>

						<!-- BEGIN PROPERTY DETAIL SLIDERS WRAPPER -->
						<div id="property-detail-wrapper" class="style1">
							<?php /* ?>
							<div class="price">
								<i class="fa fa-home"></i>For Sale
								<span>$950,000</span>
							</div>
							<?php */ ?>		
							<!-- BEGIN PROPERTY DETAIL LARGE IMAGE SLIDER -->
							<div id="property-detail-large" class="owl-carousel">
								<?php if(count($cat_img_array)>0){ 
										foreach ($cat_img_array as $key => $value) {
											?>
												<div class="item">
													<img src="images/product/<?php echo $value['image_name']; ?>" alt="" />
												</div>
											<?php
										}
									?>
								
								<?php }else{
									?>
										<div class="item">
											<img src="images/product/No_available_image.gif" alt="" />
										</div>
									<?php
								} ?>
							</div>
							<!-- END PROPERTY DETAIL LARGE IMAGE SLIDER -->
							
							<!-- BEGIN PROPERTY DETAIL THUMBNAILS SLIDER -->
							<?php if(count($cat_img_array)>0){ 
								echo '<div id="property-detail-thumbs" class="owl-carousel">';
										foreach ($cat_img_array as $key => $value) {
											?>
												<div class="item">
													<img src="images/product/<?php echo $value['image_name']; ?>" alt="" />
												</div>
											<?php
										}
								echo '</div>';
									}
									?>
		
							<!-- END PROPERTY DETAIL THUMBNAILS SLIDER -->
						
						</div>
						
						<?php echo $cat_array['detail']; ?>
						<p>&nbsp;</p>
						
						<?php 
						$category_attribute_list_arr_1 = category_attribute_list($id,0,9);
						
						if(count($category_attribute_list_arr_1)>0){
						

							?>
						<!-- BEGIN PROPERTY AMENITIES LIST -->
						<ul class="property-amenities-list col-md-4">
							<?php foreach($category_attribute_list_arr_1 as $key=>$val){ 

								if(empty($val['value']))
								{
									$class = 'disabled';
								}
								else
								{
									if($val['value']=='y' ||  $val['value']=='y')
									{
										$class = 'disabled';
										if($val['value']=='y')
										{
											$class = 'enabled';
										}
									}
									else
									{
										$class = 'enabled';
									}
								}
								?>
							<li class="<?php echo $class; ?>"><?php print($val['title']); ?></li>
							<?php } ?>
						</ul>

						<?php } ?>

						<?php 
						$category_attribute_list_arr_2 = category_attribute_list($id,10,9);
						
						if(count($category_attribute_list_arr_2)>0){
						

							?>
						<!-- BEGIN PROPERTY AMENITIES LIST -->
						<ul class="property-amenities-list col-md-4">
							<?php foreach($category_attribute_list_arr_2 as $key=>$val){ 
							
								if(empty($val['value']))
								{
									$class = 'disabled';
								}
								else
								{
									if($val['value']=='y' ||  $val['value']=='y')
									{
										$class = 'disabled';
										if($val['value']=='y')
										{
											$class = 'enabled';
										}
									}
									else
									{
										$class = 'enabled';
									}
								}
								?>
							<li class="<?php echo $class; ?>"><?php print($val['title']); ?></li>
							<?php } ?>
						</ul>

						<?php } ?>
						
						<?php 
						$category_attribute_list_arr_1 = category_attribute_list($id,19,9);
						
						if(count($category_attribute_list_arr_1)>0){
						

							?>
						<!-- BEGIN PROPERTY AMENITIES LIST -->
						<ul class="property-amenities-list col-md-4">
							<?php foreach($category_attribute_list_arr_1 as $key=>$val){ 
							
								if(empty($val['value']))
								{
									$class = 'disabled';
								}
								else
								{
									if($val['value']=='y' ||  $val['value']=='y')
									{
										$class = 'disabled';
										if($val['value']=='y')
										{
											$class = 'enabled';
										}
									}
									else
									{
										$class = 'enabled';
									}
								}
								?>
							<li class="<?php echo $class; ?>"><?php print($val['title']); ?></li>
							<?php } ?>
						</ul>

						<?php } ?>
						
						
						<!-- END PROPERTY AMENITIES LIST -->
						
						<?php /* ?>
						<h1 class="section-title">Property Features</h1>
						<!-- BEGIN PROPERTY FEATURES LIST -->
						<ul class="property-features col-sm-6">
							<li><i class="icon-garage"></i> Garage for 2 cars</li>
							<li><i class="icon-pool"></i> Outdoor Pool</li>
							<li><i class="icon-garden"></i> 850 Sq Ft Garden</li>
							<li><i class="icon-security"></i> Security System Installed</li>
						</ul>
						
						<ul class="property-features col-sm-6">
							<li><i class="icon-sale-sign"></i> This property is for sale</li>
							<li><i class="icon-house-usd"></i> Flexible Payments</li>
							<li><i class="icon-rooms"></i> 3 Bedrooms and 2 Bathrooms</li>
							<li><i class="icon-pets"></i> Pets Allowed</li>
						</ul><?php */ ?>
						<!-- END PROPERTY FEATURES LIST -->
						
						
						<h1 class="section-title">School Location</h1>
						<!-- PROPERTY MAP HOLDER -->
						<div id="property_location" class="map col-sm-12"></div>
						<?php /* ?>
						<div class="share-wraper col-sm-12">
							<h5>Share this Property:</h5>
							<ul class="social-networks">
								<li><a target="_blank" href="http://www.facebook.com/sharer.php?s=100&amp;p%5Burl%5D=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fproperties-detail.php%3Ffb%3Dtrue&amp;p%5Bimages%5D%5B0%5D=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fimages%2Fdetail-img1.jpg&amp;p%5Btitle%5D=Cozy%20Property"><i class="fa fa-facebook"></i></a></li>
								<li><a target="_blank" href="https://twitter.com/intent/tweet?url=http://www.wiselythemes.com/html/cozy/properties-detail.php&amp;text=Cozy%20Property"><i class="fa fa-twitter"></i></a></li>
								<li><a target="_blank" href="https://plus.google.com/share?url=http://www.wiselythemes.com/html/cozy/properties-detail.php"><i class="fa fa-google"></i></a></li>
								<li><a target="_blank" href="http://pinterest.com/pin/create/button/?url=http://www.wiselythemes.com/html/cozy/properties-detail.php&amp;description=Cozy%20Property&amp;media=http%3A%2F%2Fwww.wiselythemes.com%2Fhtml%2Fcozy%2Fimages%2Fdetail-img1.jpg"><i class="fa fa-pinterest"></i></a></li>
								<li><a href="mailto:?subject=Check%20out%20this%20property%20I%20found!&amp;body=http://www.wiselythemes.com/html/cozy/properties-detail.php"><i class="fa fa-envelope"></i></a></li>
							</ul>
							
							<a class="print-button" href="javascript:window.print();">
								<i class="fa fa-print"></i>
							</a>
						</div>
						<?php */ ?>
						
						<h1 class="section-title">Contact Information</h1>
						<!-- BEING AGENT INFORMATION -->
						<div class="property-agent-info">
							<div class="agent-detail col-md-4">
								<div class="image">
									<img alt="" src="images/user/<?php echo $user_array['profile_image'] ?>" />
								</div>
								
								<div class="info">
									<header>
										<h2 style="font-size:20px;"><?php echo $user_array['f_name'].' '.$user_array['l_name']; ?> </h2>
									</header>
									
									<ul class="contact-us">
										<li><i class="fa fa-envelope"></i><a href="mailto:<?php print($user_array['email']); ?>"><?php print($user_array['email']); ?></a></li>
										<!-- <li><i class="fa fa-map-marker"></i> 24th Street, New York, USA</li> -->
										<li><i class="fa fa-phone"></i><?php print($user_array['phone']) ?></li>
									</ul>
								</div>
							</div>
							
							<form class="form-style col-md-8">
								<div class="col-sm-12">
									<input type="text" name="Name" placeholder="Name" class="form-control required fromName" />
								</div>
								
								<div class="col-sm-12">
									<input type="email" name="Email" placeholder="Email" class="form-control required fromEmail"  />
								</div>
								
								<div class="col-sm-12">
									<input type="text" name="Subject" placeholder="Subject" class="form-control required subject"  />
									<textarea name="Message" placeholder="Message" class="form-control required"></textarea> 
								</div>
								
								<div class="center">
									<button type="submit" class="btn btn-default-color submit_form"><i class="fa fa-envelope"></i> Send Message</button>
								</div>
							</form>
						</div>
						<!-- END AGENT INFORMATION -->
						
						
						<!-- BEGIN SIMILAR PROPERTIES -->
						<?php /* ?>
						<h1 class="section-title">Similar Properties</h1>
						<div id="similar-properties" class="grid-style1 clearfix" >
							<div class="row">
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Luxury Apartment with great views</h3>
											<span class="location">Upper East Side, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$950,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2150 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 4</li>
										<li><i class="icon-bathrooms"></i> 3</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Stunning Villa with 5 bedrooms</h3>
											<span class="location">Miami Beach, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$1,253,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3470 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 5</li>
										<li><i class="icon-bathrooms"></i> 4</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Recent construction with 3 bedrooms</h3>
											<span class="location">Park Slope, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$560,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1800 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Modern construction with parking space</h3>
											<span class="location">Midtown, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$850</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1300 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Single Family Townhouse</h3>
											<span class="location">Cobble Hill, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$846,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1580 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 2</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<div class="item col-md-4">
									<div class="image">
										<a href="properties-detail.php">
											<h3>3 bedroom villa with garage for rent</h3>
											<span class="location">Bal Harbour, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$1,500</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2000 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Recent construction with 3 bedrooms.</h3>
											<span class="location">Manhattan, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$120,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3250 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Luxury Condo with 2 bedroms</h3>
											<span class="location">Brooklyn Heights, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$2,120,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 3120 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 4</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Edition Residences on Collins Avenue</h3>
											<span class="location">Miami Beach, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$975,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1200 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
							</div>
							
							<div class="row">
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Gorgeous Apartment in New York</h3>
											<span class="location">SoHo - Nolita, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$650,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1000 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 1</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Apartment on North Moore Street</h3>
											<span class="location">Tribeca, New York</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Rent
										<span>$560</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 1245 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 1</li>
										<li><i class="icon-bathrooms"></i> 2</li>
									</ul>
								</div>
								
								<!-- Item hidden (class="disabled") -->
								<div class="item col-md-4 disabled">
									<div class="image">
										<a href="properties-detail.php">
											<h3>Gorgeous villa with ocean view</h3>
											<span class="location">Bal Harbour, Florida</span>
										</a>
										<img src="http://placehold.it/760x670" alt="" />
									</div>
									<div class="price">
										<i class="fa fa-home"></i>For Sale
										<span>$1,500,000</span>
									</div>
									<ul class="amenities">
										<li><i class="icon-area"></i> 2100 Sq Ft</li>
										<li><i class="icon-bedrooms"></i> 3</li>
										<li><i class="icon-bathrooms"></i> 3</li>
									</ul>
								</div>
							</div>
						</div>
						
						<p class="center">
							<a href="#" class="btn btn-default-color" data-grid-id="similar-properties" data-load-amount="3">Load More Properties</a>
						</p>
						<!-- END PROPERTIES ASSIGNED -->
						<?php */ ?>
					</div>	
					<!-- END MAIN CONTENT -->
					
					
					<!-- BEGIN SIDEBAR -->
					<div class="sidebar gray col-sm-4">
						
						<?php 
						if($category_type_detail_arr['id']==2){
							require_once 'blocks/widgets/advance_search_school.php'; 
						}
						?>
						
						<?php require_once 'blocks/widgets/latest-news.php'; ?>
							
						<?php require_once 'blocks/widgets/newsletter.php'; ?>
						
					</div>
					<!-- END SIDEBAR -->

				</div>
			</div>
		</div>
		<!-- END CONTENT WRAPPER -->
		
		<?php require_once 'blocks/footer.php'; ?>
	
	</div>
	<!-- END WRAPPER -->
	

	<!-- Properties list -->
	<!--<script src="js/properties.js"></script> -->
	
	<script type="text/javascript">
		//List of properties
var properties = [
	{
		"id": 0,
		"title": "<?php echo $cat_array['category_name'] ?>",
		"latitude":<?php echo $cat_array['lat'] ?>,
		"longitude":<?php echo $cat_array['lang'] ?>,
		"image":"http://placehold.it/760x670",
		"description":"<?php echo $address ?> <br> Phone: <?php print($user_array['phone']) ?>",
		"link":"property-details.html",
		"map_marker_icon":"images/markers/coral-marker-residential.png"
	}
];

		(function($){
			"use strict";
			
			$(document).ready(function(){
				//Create property map centered on the marker of the property with id=0.
				Cozy.propertiesMap(properties, 'property_location', 0);
			});
		})(jQuery);
	</script>

</body>
</html>