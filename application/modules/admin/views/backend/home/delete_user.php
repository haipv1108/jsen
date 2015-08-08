<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Delete User</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<?php 	if(isset($message)){?>
								<div style="color: red; font-weight: bold"><?php echo $message; die;?>
					<?php }?>
								<form action="" method="post">
									<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
										<legend>You want to delete user <?php if(isset($user_info)) echo $user_info['user_name'];?>?</legend>
										<div>
											<input type="radio" name="delete" value="no" checked="checked"/>No
											<input type="radio" name="delete" value="yes" />Yes
										</div>
										<div><input type="submit" name="submit" value="Delete"/></div>
									</fieldset>
									<div class="clear"></div><!-- End .clear -->
								</form>
								</div>
				</div>