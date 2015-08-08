<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div>
				<div class="content-box-content">
					<?php echo validation_errors();?>
					<div class="tab-content default-tab" id="tab1">
						<form action="" method="post">
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Title</label>
									<input class="text-input medium-input datepicker" name="title" value="<?php echo set_value('title'); ?>" />
								</p>
								<p>
									<label>Nhập nội dung</label>
									<textarea class="text-input textarea wysiwyg" id="contentid" name="content" value="<?php echo set_value('content'); ?>" cols="79" rows="15"></textarea>
								</p>
							<div class="clear"></div>
								<p>
									<label>Decription</label>
									<textarea name="decription" value="<?php echo set_value('decription'); ?>" cols="25" rows="3"></textarea>
								</p>
								<p>
									<label>Keyword</label>
									<textarea name="keyword" value="<?php echo set_value('keyword'); ?>" cols="25" rows="3"></textarea>
								</p>
								<p>
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div> <!-- End #tab1 -->        
					
				</div> <!-- End .content-box-content -->
				
</div> <!-- End .content-box -->