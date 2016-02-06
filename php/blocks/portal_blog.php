						<!-- BEGIN BLOG LISTING -->
						<div class="grid-style1 clearfix">

							<?php 

							if(mysql_num_rows($fetch_user_blog)>0){ 
								while($result  = mysql_fetch_array($fetch_user_blog)){

									$count_comment = mysql_fetch_assoc(mysql_query("select count(c_id) as count_data from blog_comment where b_id = '".$result['id']."'  "));
								?>
							<div class="item col-md-12"><!-- Set width to 4 columns for grid view mode only -->
								<?php if(!empty($result['user_image'])){ ?>
								<div class="image image-large">
									<a href="portal_blog_detail.php?id=<?php echo $result['id'] ?>">
										<span class="btn btn-default"><i class="fa fa-file-o"></i> Read More</span>
									</a>
									<img src="images/blog/<?php echo $result['user_image'] ?>" alt="" />
								</div>

								<!--<div class="tag">Admin Approval pending</div>-->
								<?php } ?>
								<div class="info-blog">
									<ul class="top-info">
										<li><i class="fa fa-calendar"></i> <?php echo date('d M, Y',strtotime($result['created'])) ?></li>
										<li><i class="fa fa-comments-o"></i> <?php echo $count_comment['count_data']; ?></li>
										<li><i class="fa fa-tags"></i> <?php echo str_replace(',', ' , ', $result['tag']); ?></li>
										<li><i class="fa fa-pencil-square-o"></i> <a href="edit_blog.php?id=<?php echo $result['id'] ?>">Edit </li>
										<li><i class="fa fa fa-times"></i> <a href="blog_delete.php">Delete</a> </li>
										<?php if($result['admin_approve']==0){ ?>
										<li><i class="fa fa-clock-o"></i> <a href="#">Pending admin approval </a> </li>
										<?php } ?>
									</ul>
									<h3>
										<a href="portal_blog_detail.php?id=<?php echo $result['id'] ?>"><?php echo $result['title']; ?></a>
									</h3>
									<p><?php echo substr($result['detail'],0,230); ?></p>
								</div>
							</div>
							<?php } }else {
								?>
								<div class="item col-md-12"><!-- Set width to 4 columns for grid view mode only -->
								
								<div class="info-blog">
									
									<h3>
										Sorry No blogs are there .<a href="portal_new_blog.php">Click here</a> to write new blog.
									</h3>
									<p></p>
								</div>
							</div>
								<?php
							} ?>
							
						</div>
						<!-- END BLOG LISTING -->