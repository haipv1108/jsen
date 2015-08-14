<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<div class="notification attention png_bg">
							<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close" /></a>
							
							<div>
								  This is a Content Box. You can put whatever you want in it. By the way, you can close this notification with the top-right cross.
							</div>
						</div>
						<table>
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th><a href="member/view/title/<?php echo $current_page;?>">Title</a></th>
								   <th><a href="member/view/content/<?php echo $current_page;?>">Content</a></th>
								   <th><a href="member/view/createon/<?php echo $current_page;?>">Create on</a></th>
								   <th>Message</th>
								   <th>Tool</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<td colspan="6">
										<div class="bulk-actions align-left">
											<select name="dropdown">
												<option value="option1">Choose an action...</option>
												<option value="option2">Edit</option>
												<option value="option3">Delete</option>
											</select>
											<a class="button" href="#">Apply to selected</a>
										</div>
										
										<div class="pagination">
											<a href="member/view/" title="First Page">&laquo; First</a>
											<a href="member/view/<?php echo $sort_by."/"; if($current_page>1) echo $current_page-1; else echo "$current_page";?>" title="Previous Page">&laquo; Previous</a>
											<?php for($count=1;$count<=$total_page;$count++){ ?>
											<a href="member/view/<?php echo $sort_by."/".$count;?>" class="<?php if($current_page==$count) echo"number current"; else echo"number";?>" title="<?php echo $count ?>"><?php echo $count;?></a>
											<?php } ?>
											<a href="member/view/<?php echo $sort_by."/"; if($current_page<$total_page)echo $current_page+1;else echo $current_page;;?>" title="Next Page">Next &raquo;</a>
											<a href="member/view/<?php echo $sort_by."/".$total_page;?>" title="Last Page">Last &raquo;</a>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
							<?php foreach($view_article as $key=> $val){?>
								<tr>
									<td><input type="checkbox" /></td>
									<td><?php echo $val['title']; ?></td>
									<td><a href="#" title="title"><?php echo $val['content']; ?></a></td>
									<td><?php echo $val['date']; ?></td>
									<td>Noi dat messege</td>
									<td>
										<!-- Icons -->
										 <a href="<?php echo base_url();?>member/edit/<?php echo $val['id'];?>" title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="<?php echo base_url();?>member/delete/<?php echo $val['id'];?>" title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div> <!-- End #tab1 -->    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->