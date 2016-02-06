		<!-- BEGIN FOOTER -->
		<footer id="footer">
			<div id="footer-top" class="container">
				<div class="row">
					<div class="block col-sm-3">
						<a href="index.php"><img src="images/logo.png" alt="Cozy Logo" /></a>
						<br><br>
						<p>www.schoolzandmore.com helps parents do much more their kids. We endeavor to provide at your fingertips all things important for a child, schools, coaching classes, extra- curricular activities, hobby classes, fun events, camps & holiday activities. It’s an online market place that brings together parents and children focused service providers.</p>
					</div>
					<div class="block col-sm-3">
						<h3>Contact Info</h3>
						<ul class="footer-contacts">
							<?php /* ?>
							<li><i class="fa fa-map-marker"></i> <?php echo ADMIN_ADDRESS; ?></li>
							<li><i class="fa fa-phone"></i> <?php echo ADMIN_PHONE; ?></li><?php */ ?>
							<li><i class="fa fa-envelope"></i> <a href="mailto:<?php echo ADMIN_EMAIL; ?>"><?php echo ADMIN_EMAIL; ?></a></li>
						</ul>
					</div>
					<div class="block col-sm-3">
						<h3>Helpful Links</h3>
						<ul class="footer-links">
							<li><a href="properties-list.php">Blogs</a></li>
							<li><a href="agent-listing.php">Upcoming events</a></li>
							<li><a href="agency-listing.php">News</a></li>
							<li><a href="pricing-tables.php">Compare service providers</a></li>
						</ul>
					</div>
					<div class="block col-sm-3">
						<h3>Latest Blogs</h3>
						<ul class="footer-listings">
							<?php
							$fetch_user_blog_1 = mysql_query("Select * from user_blog where admin_approve= '1'  order by created desc  ");

							if(mysql_num_rows($fetch_user_blog_1)>0){ 
								while($result  = mysql_fetch_array($fetch_user_blog_1)){
									?>
									<li>
								<div class="image">
									<a href="user_blog_detail.php?id=<?php echo $result['id'] ?>"><img src="http://placehold.it/760x670" alt="" /></a>
								</div>
								<p><a href="user_blog_detail.php?id=<?php echo $result['id'] ?>"><?php echo substr($result['title'],0,20); ?><span>+</span></a></p>
							</li>
									<?php
								}}
								?>
							
							
							
						</ul>
					</div>
				</div>
			</div>
			
			
			<!-- BEGIN COPYRIGHT -->
			<div id="copyright">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							&copy; Copyright, Schoolz And More Services Pvt. Ltd. All rights reserved. 
							
							<?php include '/widgets/social-networks.php'; ?>
						
						</div>
					</div>
				</div>
			</div>
			<!-- END COPYRIGHT -->
			
		</footer>
		<!-- END FOOTER -->

		<script type="text/javascript">
		
		$('.blog_click').on('click',function(){
			console.log($(this).data('link'));
			window.location.href = $(this).data('link');
		});
	
		</script>