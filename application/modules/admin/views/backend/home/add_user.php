<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<?php echo validation_errors();?>
					
					<form action="" method="post">
						<p>
							<label>Username</label>

							<?php if(isset($message_user_name)){?>
							<div style="color: red; font-weight: bold"><?php echo $message_user_name;?><br/></div>
							<?php }?>
							<input class="text-input" type="text" name="user_name" value="<?php echo set_value('user_name'); ?>"/>
						</p>
							<div class="clear"></div>
							<!-- end of input username -->

						 <p>
							<label>Username furigana</label>
							<?php 	if(isset($message_user_name_furi)){?>
							<div style="color: red; font-weight: bold"><?php echo $message_user_name_furi;?><br/></div>
							<?php }?>
							<input class="text-input" type="text" name="user_name_furi" value="<?php echo set_value('user_name_furi'); ?>"/>
						</p>
							<div class="clear"></div>
							<!-- end of input username furigana -->

						<p> 
							<label>Email</label>
							<?php 	if(isset($message_mail_address)){?>
							<div style="color: red; font-weight: bold"><?php echo $message_mail_address;?><br/></div>
							<?php }?>
							<input class="text-input" type="text" name="mail_address" value="<?php echo set_value('mail_address'); ?>"/>
						</p>
						<div class="clear"></div>
							<!-- end of input email -->
						<p>
							<label>Password</label>
							<input class="text-input" type="password" name="password" value="<?php echo set_value('password'); ?>"/>
						</p>
						<div class="clear"></div>
						<!-- end of input password -->

						<p>
							<label>Confirm Password</label>
							<input class="text-input" type="password" name="passconf" value="<?php echo set_value('passconf'); ?>"/>
						</p>
						<div class="clear"></div>
						<!-- end of input password confirm -->
						

						<p>
							<label>Phone number</label>
							<?php 	if(isset($message_phonenumber)){?>
							<div style="color: red; font-weight: bold"><?php echo $message_phonenumber;?><br/></div>
							<?php }?>
							<input class="text-input" type="text" name="phonenumber" value="<?php echo set_value('phonenumber'); ?>"/>
						</p>
							<div class="clear"></div>
							<!-- end of intput phone number -->
						<div>
							<label>Gender</label>
							<select name="gender">
									<option></option>
								<?php for($i = 0; $i < 2; $i++){?>
									<option value='<?php echo $i;?>'> <?php if($i==1) echo "Male"; else echo "Female"; ?></option>
								<?php } ?><br/>
							</select>
						</div>

						<!-- end of input gender -->
						<div>
							<label>Current Job</label>
							<select name="current_job">
									<option></option>
								<?php for($i = 1; $i < 7; $i++){?>
									<option value='<?php echo $i;?>' selected = 'selected'> <?php  echo $i; ?></option>
								<?php } ?><br/>
							</select>
						</div>
						<!-- end of input current job -->
						<p>
						<div>
							<label>Birthday</label>
							<input type="date" class="" name = 'birthday' value=""/><br/>
						</div>
						</p>

						<!-- end of input birthday -->
						<div>
							<label>Level</label>
							<select name="level">
									<option></option>
								<?php for($i = 1; $i < 4; $i++){?>
									<option value='<?php echo $i;?>'> <?php echo $i; ?></option>
								<?php } ?><br/>
							</select>
						</div>
						<div class="clear"></div>
						<!-- end of input level -->
						<p>
							<input class="button" type="submit" name="submit" value="Submit" />
						</p>
					</form>
				</div> <!-- End #login-content -->     
					
				</div> <!-- End .content-box-content -->
				