

<div class="content-box">
	<div class="content-box-header">
		<h3>Content box</h3>
		<div class="clear"></div>
	</div>
	
		<div class="content-box-content">
			<?php echo validation_errors();?>

			<?php 	if(isset($message)){?>
					<div style="color: red; font-weight: bold"><?php echo $message; die;?>
			<?php } ?>

			<div id="login-content">
				<form action="" method="post">
					<p>
						<label>Username</label>
						<input class="text-input" type="text" name="user_name" value="<?php echo isset($user_info['user_name'])? $user_info['user_name']: ''; ?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of input user name -->

					 <p>
						<label>Username furigana</label>
						<input class="text-input" type="text" name="user_name_furi" value="<?php echo isset($user_info['user_name_furi'])? $user_info['user_name_furi']: ''; ?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of input username furigana -->
					<p>
						<label>Email</label>
						<input class="text-input" type="text" name="mail_address" value="<?php echo isset($user_info['mail_address'])? $user_info['mail_address']: '' ;?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of input email -->
					<p>
						<label>Password</label>
						<input class="text-input" type="password" name="password" value="<?php echo isset($user_info['password'])? $user_info['password']: '' ;?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of input password -->
					<p>
						<label>Confirm Password</label>
						<input class="text-input" type="password" name="passconf" value="<?php echo isset($user_info['password'])? $user_info['password']: '' ;?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of password confirm -->
					<p>
						<label>Phone number</label>
						<input class="text-input" type="text" name="phonenumber" value="<?php echo isset($user_info['phonenumber'])? $user_info['phonenumber']: '';?>"/>
					</p>
					<div class="clear"></div>
					<!-- end of phonenumber -->
					<div>
						<label>Gender</label>
						<select name="gender">
								<option></option>
							<?php for($i = 0; $i < 2; $i++){?>
								<option value='<?php echo $i;?>'<?php if(isset($user_info['gender']) && $user_info['gender'] == $i) echo "selected='selected'";?>> <?php if($i==1) echo "Male"; else echo "Female"; ?></option>
							<?php } ?><br/>
						</select>
					</div>
					<div class="clear"></div>
					<!-- end of input gender -->
					<div>
						<label>Current Job</label>
						<select name="current_job">
								<option></option>
							<?php for($i = 1; $i < 7; $i++){?>
								<option value='<?php echo $i;?>' <?php if(isset($user_info['current_job']) && $user_info['current_job'] == $i) echo "selected='selected'";?>> <?php  echo $i; ?></option>
							<?php } ?><br/>
						</select>
					</div>
					<div class="clear"></div>
					<!-- end of input current job -->
					<p>
						<div>
							<label>Birthday</label>
							<input type="date" class="" name = 'birthday' value="<?php echo isset($user_info['birthday'])? $user_info['birthday']: '';?>" /><br/>
						</div>
					</p>
					<div class="clear"></div>
					<!-- end of input birthday -->
					<div class="bulk-actions align-left">
						<label>Level</label>
						<select name="level">
							<?php for($i = 1; $i < 4; $i++){?>
								<option value='<?php echo $i;?>' <?php if(isset($user_info['level']) && $user_info['level'] == $i) echo "selected='selected'";?>> <?php echo $i; ?></option>
							<?php } ?>
						</select>
					</div>
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" name="submit" value="Submit" />
					</p>
				</form>
			</div> <!-- End #login-content -->     
		</div> <!-- End .content-box-content -->
</div> <!-- End .content-box -->