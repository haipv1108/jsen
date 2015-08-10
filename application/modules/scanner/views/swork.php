		<?php foreach($result as $key=>$val){?>
				INSERT INTO `jsen`.`line` (`line_id`, `line_name`, `area_line_id`) VALUES(<?php echo $val['line_id'];?>,'<?php echo $val['line_name'];?>',<?php echo $val['area_line_id'];?>);<br/>
		<?php } ?>