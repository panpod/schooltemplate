						<h1 class="section-title">Comments</h1>
						
						<div class="comments">
							<?php 
							$user_comment_query = mysql_query("Select * from blog_comment where b_id = '".$fetch_blog_detail['id']."' ");
							if(mysql_num_rows($user_comment_query)>0){
							?>
							<ul>
								<?php while($res = mysql_fetch_array($user_comment_query)){ 
									$fetch_user_detail = mysql_fetch_array(mysql_query("Select * from users where id = '".$res['user_id']."' "));
									?>
								<li>
									<img src="images/comment-man.jpg" alt="" />
									<div class="comment">
										<!--<a href="#" class="btn btn-default-color">Reply</a>-->
										<h3><?php print($fetch_user_detail['f_name'].' '.$fetch_user_detail['l_name']);
									 ?><small><?php echo date('d M, Y',strtotime($res['created'])) ?></small></h3>
										<p><?php echo $res['comment']; ?></p>
									</div>
									<?php /* ?>
									<ul>
										<li>
											<img src="images/comment-man.jpg" alt="" />
											<div class="comment">
												<a href="#" class="btn btn-default-color">Reply</a>
												<h3>John Doe<small>30 July, 2014</small></h3>
												<p>In hendrerit, urna in fringilla interdum, nunc mauris condimentum purus, vel ullamcorper dui risus sed tellus. Nullam lacinia porttitor velit fermentum accumsan. Etiam dui lorem, lobortis pellentesque malesuada nec, lacinia pulvinar libero.</p>
											</div>
										</li>
									</ul><?php */ ?>
								</li>
								<?php } ?>
								
							</ul>
							<?php } ?>
							
							<div class="comments-form">
								<div class="col-sm-12">
									<h3>Leave a Reply</h3>
									<!--<p>Your email address will no be published. Required fields are marked*</p> -->
								</div>
								<?php 
								if(!empty($user_id))
								{
									?>
								<form class="form-style" name="comment_form" id="comment_form" method="post" action="">
									<input type="hidden" name="blog_id" id="blog_id" value="<?php echo $_GET['id']; ?>" >
									<input type="hidden" name="action" id="action" value="post_user_blog" >
									<?php /* ?>
									<div class="col-sm-6">
										<input type="text" name="Name" placeholder="Name*" class="form-control" />
									</div>
									
									<div class="col-sm-6">
										<input type="email" name="Email" placeholder="Email*" class="form-control"  />
									</div>
									<?php */ ?>
									
									<div class="col-sm-12">
										<textarea cols="300" id="Comment" name="Comment" maxlength="200" placeholder="Comment*" class="form-control"></textarea> 
									</div>
									
									<div class="center">
										<button type="submit" class="btn btn-default-color btn-lg">Post Comment</button>
									</div>
								</form>
								<?php }else {
									?>
									<div class="center">
										<button type="button" onclick="javascript:window.location.href='login.php';" class="btn btn-default-color btn-lg">Login</button>
									</div>
									<?php
								} ?>
							</div>
						</div>

						<!-- END WRAPPER -->
<script type="text/javascript" src="js/jquery.validate.js"></script>
		<script type="text/javascript">
		$().ready(function() {
		// validate signup form on keyup and submit
		$("#comment_form").validate({
			rules: {
				Comment: {
					required: true
				}
			},
			messages: {				
				Comment: {
					required: "Please enter a comment"
				}
			}
		});
		
	});
		</script>
		<style>
form.comment_form label.error, label.error {
    color: red;
    font-style: italic;
}
input.error {
    border: 1px solid red;
}
		</style>
