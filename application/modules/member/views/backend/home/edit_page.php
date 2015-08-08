<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div>
				<?php if(isset($message)){?>
					<div class='input-notification error png_bg'> <?php echo $message;die;?>
				<?php } else{?>

				<div class="content-box-content">
					<?php echo validation_errors();?>
					<div class="tab-content default-tab" id="tab1">
						<form action="" method="post">

							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								<p>
									<label>Title</label>
									<input class="text-input medium-input datepicker" name="title" value="<?php if(isset($page['title'])) echo $page['title'];?>" 
								</p>
								<p>
									<label>Content</label>
									<textarea class="text-input textarea wysiwyg" id="contentid" name="content" cols="79" rows="15"><?php if(isset($page['content'])) echo $page['content']; ?></textarea>
								</p>
							<div class="clear"></div>
								<p>
									<label>Date</label>
									<input type="date" class="" name = 'date' value="<?php echo now();?>"/>
								</p>
								<p>
									<label>Keyword</label>
									<textarea name="keyword" value="<?php echo set_value('keyword'); ?>" cols="25" rows="3"><?php if(isset($page['keyword'])) echo $page['keyword']?></textarea>
								</p>
								<p>
									<input class="button" type="submit" name="submit" value="Submit" />
								</p>
							</fieldset>
							<div class="clear"></div><!-- End .clear -->
						</form>
					</div> <!-- End #tab1 -->        
					
				</div> <!-- End .content-box-content -->
				<?php }?>
				
</div> <!-- End .content-box -->