<div id="wapper">
	<div id="content">
		<div id="guideBox">
			<h3 class="guideTTLh3">
				<input type="checkbox" name="city[]" id="parent1" value="1" class="parentCheckbox">
				<a href="/tohoku/line_1.htm"> <!--  Di den bang loc cong viec va cac cong viec gioi thieu -->
					<?php
						$i = 0;
							foreach($list_city as $k => $v){
								echo $v['prefecture_name'];
								if($i == 0) break;
							}
					?>
				</a>
			</h3>
			<ul class="guideList4">
				<?php	foreach($list_city as $k => $v){?>
						<li>
						<input type="checkbox" name="city[]" value='<?php echo $v['city_id']?>' class="childCheckbox39600" />
						<a href="<?php echo base_url();?>guide_area/work"><?php echo $v['city_name']?></a>
						</li>
				<?php }?>
		</div>
	</div>
</div>