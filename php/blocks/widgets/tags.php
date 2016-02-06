						<!-- BEGIN TAGS -->
						<h2 class="section-title">Tags</h2>
						<ul class="tags col-sm-12">
							<?php if(!empty($tag_query)){
								$tag_array = array_unique((explode(',', $tag_query['user_tag'])));
								
								foreach($tag_array as $key=>$val)
								{
									if(!empty($val)){
									echo '<li><a href="srch_blog_name.php?tag='.$val.'">'.$val.'</a></li>';
									}
								}
							}else{
								$tag_query = mysql_fetch_assoc(mysql_query("Select GROUP_CONCAT(distinct tag,',') as user_tag from user_blog  where admin_approve= '1' group by user_id "));

									if(!empty($tag_query)){
								$tag_array = array_unique((explode(',', $tag_query['user_tag'])));
								
									foreach($tag_array as $key=>$val)
									{
										if(!empty($val)){
										echo '<li><a href="srch_blog_name.php?tag='.$val.'">'.$val.'</a></li>';
										}
									}
								}
							} ?>
						</ul>
						<!-- BEGIN TAGS -->