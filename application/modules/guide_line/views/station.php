<div id="wapper">
	<div id="content">
		<div id="guideBox">
			<div class="inner">
				<h3 class="guideTTLh3">
					<a href="/tohoku/line_1.htm">
						<?php
							$i = 0;
							if(isset($station) && !empty($station))
								foreach($station as $k => $v){
									echo $v['line_name'];
									if($i == 0) break;
								}
							else{
								echo '</a>';
								if(isset($message) && !empty($message)) echo $message;
							}
							?>
				</h3>
				<ul class="guideList4">
					<?php	
						if(isset($station) && !empty($station))
							foreach($station as $k => $v){?>
							<li>
							<input type="checkbox" name="station[]" value='<?php echo $v['station_id']?>' class="childCheckbox39600" />
							<a href="<?php echo base_url();?>guide_line/list_work/<?php echo $v['station_id'];?>">
								<?php echo $v['station_name']?>
							</a>
							<?php
									if(isset($count_work) && !empty($count_work)){
										$check = 0;
										foreach($count_work as $k1=>$v1){
											if($v['station_id'] == $v1['station_id']){
												echo '('.$v1['sl'].')';
												$check = 1;
											}
										}
										if($check == 0) echo '(0)';
									}else{
										echo '(0)';
									}
								?>
							</li>
					<?php }?>
				</div>
		</div>
	</div>
</div>