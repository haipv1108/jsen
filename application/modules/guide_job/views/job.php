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
                <form action="/search/" method="get" onsubmit="return Lvs.Guide.alert(document.getElementsByName('job[]'), '特徴');">
                    <input type="hidden" name="area" value="(cac vung))">
                    <input type="hidden" name="city[]" value="1">
                    <div class="blueBox">
                        <ul>
                            <?php foreach($job as $key => $value){?>
                            <li>
                                <p id="iconType01"><input type="checkbox" name="job[]" value="<?php echo $value['system_work_name']?>">
                                <a href="<?php echo base_url();?>(vung)/city_(city_id)_job_<?php echo $value['system_work_name']?>.htm"><?php echo $value['system_work_name']?></a>
                                </a>
                                </p>
                                <span class="searchBox_txt_type">└ (feature_name cua tung vung)営業、電話・メール、事務・受付・経理、その他</span>
                            </li>
                            <?php }?>                                                            
                        </ul>
                    </div>

                    <div id="searchBtn" class="guideSearchBtn">
                        <p><input type="image" alt="この条件で探す" onmouseover="this.src='/img/guide/guide_search_btn_o.png'" onmouseout="this.src='/img/guide/guide_search_btn.png'"  src="/img/guide/guide_search_btn.png"></p>
                    </div>
                </form>
            </div>
        </div>
        <!-- /guideBox -->
    </div>
</div>