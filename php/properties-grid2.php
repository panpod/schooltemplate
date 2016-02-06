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
						<h1 class="page-title">Property Grid Listing 2</h1>
						
						<ul class="breadcrumb">
							<li><a href="index.php">Home </a></li>
							<li><a href="#">Properties</a></li>
							<li><a href="properties-grid2.php">Property Grid Listing 2</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- END PAGE TITLE/BREADCRUMB -->
		
		
		<!-- BEGIN HOME ADVANCED SEARCH (class="gray" for a gray background) -->
		<div id="advanced-search" class="gray open">
			<?php require_once 'blocks/advanced-search.php'; ?>
		</div>
		<!-- END HOME ADVANCED SEARCH -->
		
		
		<!-- BEGIN CONTENT WRAPPER -->
		<div class="content">
			<div class="container">
				<div class="row">
				
					<!-- BEGIN MAIN CONTENT -->
					<div class="main col-sm-12">
							
						<select class="chosen-select" tabindex="-1" multiple="" data-placeholder="Searched Parameters">
							<option value=""> </option>
							<option selected value="New York">New York</option>
							<option selected value="Residential">Residential</option>
							<option selected value="Sale">Sale</option>
							<option selected value="3 bedrooms">3 bedrooms</option>
							<option selected value="2 bathrooms">2 bathrooms</option>
							<option selected value="Min. 70.000$">Min. 70.000$</option>
							<option selected value="Min. 120.000$">Min. 120.000$</option>
						</select>			
							
						<?php require_once 'blocks/properties-grid2.php'; ?>
						
						<?php require_once 'blocks/pagination.php'; ?>
						
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