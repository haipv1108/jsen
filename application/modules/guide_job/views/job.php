<div id="wapper">
    <div id="content">
        <div id="guideBox">
            <div id="guideTTLArea">
                <div class="inner">
                    <h2 class="job">北海道のバイトを職種から探す</h2>

                    <div class="searchIF clearfix">
                        <p>検索条件を変更</p>
                        <ul class="clearfix">
                            <li><a href="/guide_area1.htm">北海道のエリアから探す</a></li>
                            <li><a href="/guide_area1_line.htm">北海道の路線から探す</a></li>
                            <li><a href="/guide_area1_feature.htm">北海道の特徴から探す</a></li>
                        </ul>

                    </div>
                </div>
            <!-- gudeTTLArea --></div>

            <div class="inner">
                <p class="blueTTL">特徴を選択してください</p>
                <form action="" method="post">
                    <input type="hidden" name="area" value="<?php echo isset($job['area_name'])?$job['area_name']: 'khong co dl';?>">
                    <div class="blueBox">
                        <ul>
						<?php if(isset($job) && !empty($job)){?>
                            <?php foreach($job as $key => $value){?>
                            <li>
                                <p id="<?php echo $value['system_work_name'];?>"><input type="checkbox" name="job[]" value="<?php echo $value['system_work_name'];?>">
                                <a href="<?php echo base_url();?>guide_job/list_work/<?php echo $value['system_work_name'];?>"><?php echo $value['system_work_name'];?></a>
                                </a>
								<?php echo '('.$value['sl'].')';?>
                                </p>
                            </li>
                            <?php }?>
						<?php }?>
                        </ul>
                    </div>

                    <div id="searchBtn" class="guideSearchBtn">
                        <p><input type="submit" name="submit" alt="この条件で探す" onmouseover="this.src='template/frontend/image/guide_search_btn_o.png'" onmouseout="this.src='template/frontend/image/guide_search_btn.png'"  src="template/frontend/image/guide_search_btn.png"></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- /guideBox -->
    </div>
</div>