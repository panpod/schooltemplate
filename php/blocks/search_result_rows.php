<?php
//error_reporting(0);
$_data = mysql_real_escape_string($_GET['keyword']);
$search_query =mysql_query("Select user_category_attribute.value,category.*,city.name as city_name from user_category_attribute 
	INNER join category ON category.id=user_category_attribute.cat_id 
	INNER join category_attribute on category_attribute.id = user_category_attribute.attr_id
	INNER join city on city.id = category.city_id	
	WHERE category.is_visible=1 and value like  '%".$_data."%' group by category.id limit 0,10 "); 

?>
						<!-- BEGIN PROPERTY LISTING -->
						<div id="property-listing" class="list-style clearfix">

							<?php
							$count = mysql_num_rows($search_query);
							if($count>0)
							{
								while($result = mysql_fetch_assoc($search_query))
								{
									// City address 
									$cat_id =  $result['id'];
									$sel_result = mysql_fetch_assoc(mysql_query("Select value from user_category_attribute where cat_id = '".$cat_id."' and attr_id='37' "));
									?>
										<div class="row">
											<div class="item col-md-4"><!-- Set width to 4 columns for grid view mode only -->
												<div class="image">
													<a href="get_detail.php?id=<?php echo $result['id'] ?>">
														<span class="btn btn-default"><i class="fa fa-file-o"></i> Details</span>
													</a>
													<img src="images/product/<?php echo $result['image']; ?>" alt="" />
												</div>
												<?php /* ?>
												<div class="price">
													<i class="fa fa-home"></i>For Sale
													<span>$950,000</span>
												</div><?php */ ?>
												<div class="info">
													<h3>
														<a href="get_detail.php?id=<?php echo $result['id'] ?>"><?php echo $result['category_name'] ?></a>
														<small><?php if(!empty($sel_result['value'])){ echo $sel_result['value'].' , '; } ?>, <?php echo $result['city_name']; ?></small>
													</h3>
													<p class="more"><?php echo $result['detail']; ?></p>
												
													<ul class="amenities">
														<li><i class="icon-area"></i> 2150 Sq Ft</li>
														<li><i class="icon-bedrooms"></i> 4</li>
														<li><i class="icon-bathrooms"></i> 3</li>
													</ul>
												</div>
											</div>
											
										</div>
									<?php
								}
								
							}
							?>

							
							
						</div>
						<!-- END PROPERTY LISTING -->
	<style>
	.morecontent span {
    display: none;
}
.morelink {
    display: block;
}
	</style>
	<script>
						$(document).ready(function() {
    // Configure/customize these variables.
    var showChar = 200;  // How many characters are shown by default
    var ellipsestext = "...";
    var moretext = "Show more >";
    var lesstext = "Show less";
    

    $('.more').each(function() {
        var content = $(this).html();
 
        if(content.length > showChar) {
 
            var c = content.substr(0, showChar);
            var h = content.substr(showChar, content.length - showChar);
 
            var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
 
            $(this).html(html);
        }
 
    });
 
    $(".morelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
});
						</script>
