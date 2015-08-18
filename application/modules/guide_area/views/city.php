<div id="wapper">
	<div id="content">
		<div id="guideBox">
			<h3 class="guideTTLh3">
				<input type="checkbox" name="city[]" id="parent1" value="1" class="parentCheckbox">
				<a href="/tohoku/line_1.htm"> <!--  Di den bang loc cong viec va cac cong viec gioi thieu -->
					<?php
						$i = 0;
						if(isset($list_city) && !empty($list_city)){
							foreach($list_city as $k => $v){
								echo $v['prefecture_name'];
								if($i == 0) break;
							}
						}else{
							echo $message; die;
						}
					?>
				</a>
			</h3>
			<ul class="guideList4">
				<?php foreach($list_city as $k => $v){?>
						
						<li>
							<input type="checkbox" name="city[]" value='<?php echo $v['city_id']?>' class="childCheckbox39600" />
							<a href="<?php echo base_url();?>guide_area/list_work/<?php echo $v['city_id']?>">
								<?php echo $v['city_name'];?> 
							</a>
							<?php
								if(isset($count_work) && !empty($count_work)){
									$check = 0;
									foreach($count_work as $k1=>$v1){
										if($v['city_id'] == $v1['city_id']){
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