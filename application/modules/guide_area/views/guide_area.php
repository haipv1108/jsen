<div id="wapper">
	<div id="content">
		<div id="guideBox">
			<h2 class="areaTTL">全国のエリアから探す</h2>
			<div class="inner">
				<p class="blueTTL">都道府県を選択してください</p>
				<?php if(isset($message) && !empty($message)) echo $message; die;?>
				<?php foreach ($area as $ka => $va) {	?>
					<h3 class="guideTTLh3"><?php echo $va['area_name']; ?></h3>
					<ul class="guideList1">
				<?php foreach ($prefecture[$va['area_name']] as $kp => $vp) {?>
					<li>
						<a href="<?php echo base_url();?>guide_area/city/<?php echo $vp['id'];?>"><?php echo $vp['name'];?></a>
					</li>
					<?php }
					echo "</ul>";
				}?> 
			</div>
		</div>
	</div>
</div>
