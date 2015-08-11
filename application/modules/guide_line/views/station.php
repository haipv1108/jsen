<div id="wapper">
	<div id="content">
		<div id="guideBox">
			<h3 class="guideTTLh3">
				<a href="/tohoku/line_1.htm">
					<?php
						$i = 0;
							foreach($station as $k => $v){
								echo $v['line_name'];
								if($i == 0) break;
							}
					?>
				</a>
			</h3>
			<ul class="guideList4">
				<?php	foreach($station as $k => $v){?>
						<li>
						<input type="checkbox" name="station[]" value='<?php echo $v['station_id']?>' class="childCheckbox39600" />
						<a href="<?php echo base_url();?>guide_line/work"><?php echo $v['station_name']?></a>
						</li>
				<?php }?>
		</div>
	</div>
</div>