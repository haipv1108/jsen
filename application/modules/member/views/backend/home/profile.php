<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div>
			<?php if(isset($message)){?>
					<div style="color: red; font-weight: bold"> <?php echo $message; die;?>
			<?php } else{?>
					<div class="content-box-content">
						<?php echo validation_errors();?>
						<?php 	if(isset($message)){?>
								<div style="color: red; font-weight: bold"><?php echo $message; die;?>
						<?php }?>
						<div id="login-content">
							<form action="" method="post">
								<p>
									<label>Username</label>
									<input class="text-input" type="text" name="username" value="<?php echo isset($user['username'])? $user['username']: ''; ?>"/>
								</p>
								<div class="clear"></div>
								<p>
									<label>Email</label>
									<input class="text-input" type="text" name="email" value="<?php echo isset($user['email'])? $user['email']: '' ;?>"/>
								</p>
								<div class="clear"></div>
								<p>
									<input class="button" type="submit" name="submit" value="Update" />
								</p>
							</form>
						</div> <!-- End #login-content -->     
					</div> <!-- End .content-box-content -->
				<?php }?>
</div> <!-- End .content-box -->