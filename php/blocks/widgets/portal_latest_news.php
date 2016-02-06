						<!-- BEGIN LATEST NEWS -->
						<h2 class="section-title">Latest News</h2>
						<ul class="latest-news">
							<?php 
							$fetch_user_blog1 = mysql_query("Select * from user_blog where admin_approve= '1' order by created desc  limit 0,5 ");
							$tag_query = '';
							if(mysql_num_rows($fetch_user_blog1)>0){ 
								while($result  = mysql_fetch_array($fetch_user_blog1)){
								?>
							<li class="col-md-12">
								<div class="image">
									<a href="user_blog_detail.php?id=<?php echo $result['id'] ?>"></a>
									<img src="images/blog/<?php echo $result['user_image'] ?>" alt="" />
								</div>
								
								<ul class="top-info">
									<li><i class="fa fa-calendar"></i> <?php echo date('d M, Y',strtotime($result['created'])) ?></li>
								</ul>
									
								<h3><a href="user_blog_detail.php?id=<?php echo $result['id'] ?>"><?php echo substr($result['title'],0,70); ?></a></h3>
							</li>
							<?php }} ?>
							
						</ul>
						<!-- END LATEST NEWS -->