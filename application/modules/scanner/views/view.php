﻿		<?php foreach($result as $key=>$val){?>
				INSERT INTO `jsen`.`station` (`station_id`, `station_name`, `line_id`,`city_id`) VALUES(<?php echo $val['station_id'];?>,<?php echo $val['line_id'];?>,'<?php echo $val['station_name'];?>',<?php echo $val['city_id'];?>);<br/>
		<?php } ?>