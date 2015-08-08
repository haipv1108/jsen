<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1">
						<form action="#" method="post">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Title</label>
									<input class="text-input medium-input datepicker" type="text" id="titleid" name="title" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								<p>
									<label><input class="check-all" type="checkbox" />注目POINT</label>
										<?php foreach ($feature as $key => $val) {?> 								
											<tbody>
													<td><input type="checkbox" name="<?php echo $val['feature_id'];?>"/><?php echo $val['feature_name'];?></td>
											</tbody>
										<?php }?>
								</p>
								<div class="box" id="infoJobs">
									<h3>募集職種</h3>
										<tr>
											<td>1. Job1<input class="text-input small-input" type="text" name="job1"> Luong: <input class="text-input small-input" type="text" name="luongjob1"><br/></td>
											<td>2. Job2<input class="text-input small-input" type="text" name="job2"> Luong: <input class="text-input small-input" type="text" name="luongjob2"><br/></td>
											<td>3. Job3<input class="text-input small-input" type="text" name="job3"> Luong: <input class="text-input small-input" type="text" name="luongjob3"><br/></td>
										</tr>
								</div>
								<p>
									<div class="tab-content default-tab">
									
										<h4>地域・駅</h4>
										<p>
											<textarea name="station" cols="25" rows="3"></textarea>
										</p>
										
									</div>
								</p>
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								<div class="content-box column-left">
				
								<div class="content-box-header">
									
									<h3>仕事情報</h3>
									
								</div> <!-- End .content-box-header -->
								
								<div class="content-box-content">
									
									<div class="tab-content default-tab">
									
										<h4>仕事情報</h4>
										<p>
											<textarea name="jobinfo" cols="25" rows="3"></textarea>
										</p>
										
									</div> <!-- End #tab3 -->        
									
								</div> <!-- End .content-box-content -->
								
							</div> <!-- End .content-box -->
							
							<div class="content-box column-right closed-box">
								
								<div class="content-box-header"> <!-- Add the class "closed" to the Content box header to have it closed by default -->
									
									<h3>応募情報</h3>
									
								</div> <!-- End .content-box-header -->
								
								<div class="content-box-content">
									
									<div class="tab-content default-tab">
									
										<h4>This box is closed by default</h4>
										<p>
										Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed in porta lectus. Maecenas dignissim enim quis ipsum mattis aliquet. Maecenas id velit et elit gravida bibendum. Duis nec rutrum lorem. Donec egestas metus a risus euismod ultricies. Maecenas lacinia orci at neque commodo commodo.
										</p>
										
									</div> <!-- End #tab3 -->        
									
								</div> <!-- End .content-box-content -->
								
							</div> <!-- End .content-box -->
							<div class="clear"></div>
								<p>
									<label>Decription</label>
									<textarea name="decription" cols="25" rows="3"></textarea>
								</p>
								<p>
									<label>Keyword</label>
									<textarea name="keyword" cols="25" rows="3"></textarea>
								</p>
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div> <!-- End #tab1 -->        
					
				</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->