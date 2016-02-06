		<!-- BEGIN HEADER -->
		<header id="header">
			<div id="top-bar">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<ul id="top-info" style="display:none;">
								<li>Phone: <?php echo ADMIN_PHONE; ?></li>
								<li>Email: <a href="mailto:<?php echo ADMIN_EMAIL; ?>"><?php echo ADMIN_EMAIL; ?></a></li>
							</ul>
							
							<ul id="top-buttons">
								<?php if(empty($_SESSION['user_id'])){ ?>
								<li><a href="login.php"><i class="fa fa-sign-in"></i> Login</a></li>
								<li><a href="register.php"><i class="fa fa-pencil-square-o"></i> Register</a></li>
								<li class="divider"></li>
								<?php }else{
									?>
									<li>
									<div class="language-switcher">
										<span><i class="fa fa-user"></i> <?php echo $_SESSION['f_name'].' '.$_SESSION['l_name'];   ?></span>
										<ul>
											<li><a href="#">User Detail</a></li>
											<li><a href="user_blog.php">My Blog</a></li>
											<li><a href="logout.php">Logout</a></li>
										</ul>
									</div>
								</li>
									<?php
								} ?>
								
								<li>
									<div class="language-switcher">
										<span><i class="fa fa-globe"></i> <?php if(empty($_SESSION['city'])){  $_SESSION['city']= 'Pune'; } echo $_SESSION['city'];   ?></span>
										<ul>
											<?php 
											$country_list = city_list();
											foreach ($country_list as $key => $value) {
												if(strtolower($_SESSION['city'])!=strtolower($value['name']))
												{
													echo '<li><a href="change_language.php?type='.$value['name'].'">'.$value['name'].'</a></li>';
												}
											}
											?>
											
										</ul>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			
			<div id="nav-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<a href="index.php" class="nav-logo"><img src="images/logo.png" alt="Cozy Logo" /></a>
							
							<!-- BEGIN SEARCH -->
							<div id="sb-search" class="sb-search">
								<form>
									<input class="sb-search-input" placeholder="Search..." type="text" value="" name="search" id="search">
									<input class="sb-search-submit" type="submit" value="">
									<i class="fa fa-search sb-icon-search"></i>
								</form>
							</div>
							<!-- END SEARCH -->
							
							<!-- BEGIN MAIN MENU -->
							<nav class="navbar">
								<button id="nav-mobile-btn"><i class="fa fa-bars"></i></button>
								
								<ul class="nav navbar-nav">
									<li class="dropdown">
										<a class="active" href="#" data-toggle="dropdown" data-hover="dropdown">Home<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a class="active" href="index.php">Home Search</a></li>
											<li><a href="index-slider.php">Home Slider</a></li>
											<li><a href="index-grid.php">Home Grid</a></li>
											<li><a href="index-map.php">Home Map</a></li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#" data-toggle="dropdown" data-hover="dropdown">Properties<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="properties-detail.php">Properties Detail</a></li>
											<li><a href="properties-list.php">Properties List</a></li>
											<li><a href="properties-grid.php">Properties Grid</a></li>
											<li><a href="properties-grid2.php">Properties Grid 2</a></li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#" data-toggle="dropdown" data-hover="dropdown">Pages<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="about.php">About Us</a></li>
											<li class="dropdown-submenu">
												<a href="#">Agency</a>
												<ul class="dropdown-menu">
													<li><a href="agency-detail.php">Agency Detail</a></li>
													<li><a href="agency-listing.php">Agency Listing</a></li>
												</ul>
											</li>
											<li class="dropdown-submenu">
												<a href="#">Agent</a>
												<ul class="dropdown-menu">
													<li><a href="agent-detail.php">Agent Detail</a></li>
													<li><a href="agent-listing.php">Agent Listing</a></li>
												</ul>
											</li>
											<li><a href="pricing-tables.php">Pricing Tables</a></li>
											<li><a href="login.php">Login</a></li>
											<li><a href="register.php">Register</a></li>
											<li><a href="faq.php">FAQ</a></li>
											<li><a href="404.php">404</a></li>
											
											<li class="divider"></li>
											<li><a tabindex="-1" href="#"> Separated link </a></li>
										</ul>
									</li>
									
									<li class="dropdown">
										<a href="#" data-toggle="dropdown" data-hover="dropdown">Blog<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li><a href="blog-detail.php">Blog Detail</a></li>
											<li><a href="blog-listing1.php">Blog Listing 1</a></li>
											<li><a href="blog-listing2.php">Blog Listing 2</a></li>
											<li><a href="blog-listing3.php">Blog Listing 3</a></li>
											<li><a href="blog-listing4.php">Blog Listing 4</a></li>
										</ul>
									</li>
									
									<li><a href="contacts.php">Contacts</a></li>
								</ul>
								
							</nav>
							<!-- END MAIN MENU -->
							
						</div>
					</div>
				</div>
			</div>
		</header>
		<!-- END HEADER -->