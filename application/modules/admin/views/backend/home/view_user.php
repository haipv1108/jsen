<div class="content-box"><!-- Start Content Box -->
				<div class="content-box-header">
					<h3>Content box</h3>
					<div class="clear"></div>
				</div> <!-- End .content-box-header -->
				<div class="content-box-content">
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						<div class="notification success png_bg">
							<a href="#" class="close"><img src="template/backend/simpla-admin/resources/images/icons/cross_grey_small.png" title="Close this notification" alt="close"></a>
							<div>
								Noi thong bao nhung thong tin can thiet.
							</div>
						</div>
						<table>
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th><a href="admin/view/username/<?php echo $current_page;?>">Username</a></th>
								   <th><a href="admin/view/email/<?php echo $current_page;?>">Email</a></th>
								   <th><a href="admin/view/gender/<?php echo $current_page;?>">Gender</a></th>
								   <th><a href="admin/view/level/<?php echo $current_page;?>">Level</a></th>
								   <th>Active</th>
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
											<?php if ($current_page != 1){ ?>
											<a href="admin/view/" title="First Page">&laquo; First</a>
											<a href="admin/view/<?php echo $sort_by."/";if($current_page>1) echo $current_page-1; else echo "$current_page";?>" title="Previous Page">&laquo;Previous</a>
											<?php }?>
											<?php for($count=1;$count<=$total_page;$count++){ ?>
											<a href="admin/view/<?php echo $sort_by."/".$count;?>" class="<?php if($current_page==$count) echo"number current"; else echo"number";?>" title="<?php echo $count;?>"><?php echo $count;?></a>
											<?php } ?>
											<?php if($current_page !=$total_page){?>
											<a href="admin/view/<?php echo $sort_by."/";if($current_page<$total_page)echo $current_page+1;else echo $current_page;;?>" title="Next Page">Next &raquo;</a>
											<a href="admin/view/<?php echo $sort_by."/".$total_page;?>" title="Last Page">Last &raquo;</a>
											<?php }?>
										</div> <!-- End .pagination -->
										<div class="clear"></div>
									</td>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach($view_user as $key=> $val){?>
								<tr>
									<?php if($val['level']==3) continue; ?>
									<td><input type="checkbox" /></td>
									<td>
										<a href="admin/manage_page/<?php echo $val['user_id'];?>" title="title"><?php if($val['level']==2) echo $val['user_name']; ?></a>
										<?php if($val['level']==1) echo $val['user_name'];?>
									</td>
									<td><?php echo $val['mail_address']; ?></td>
									<td><?php if($val['gender'] == 1) echo "Male"; else echo "Female";?></td>
									<!-- <td><a href="#" title="title"><?php echo $val['level']; ?></a></td> -->
									<td><?php echo $val['level']; ?></td>

									<td>Gia tri Active</td>
									<td>
										<!-- Icons -->
										 <a href='<?php echo base_url();?>admin/edit/<?php echo $val['user_id'];?>' title="Edit"><img src="template/backend/simpla-admin/resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href='<?php echo base_url();?>admin/delete/<?php echo $val['user_id'];?>' onclick='Ban co muon tiep tuc?' title="Delete"><img src="template/backend/simpla-admin/resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="More"><img src="template/backend/simpla-admin/resources/images/icons/hammer_screwdriver.png" alt="More" /></a>
									</td>
								</tr>
							<?php }?>
							</tbody>
						</table>
					</div> <!-- End #tab1 -->    
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->