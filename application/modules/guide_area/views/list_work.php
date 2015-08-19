<div id="wapper">
		<div id="content">
			<div id="resultBox3">
				<h2>函館市のバイト</h2><!-- thong tin nay thay doi.->
			</div><!--resultBox3-->
			<div id="searchPanel"> Bang loc cong viec
				<div class="searchPanelInner">
					<div class="searchPanelInner2">
					
					</div>
						<form id="searchForm" method="get" action="https://j-sen.jp/search/">
							
						<form>
					<div>
				</div>
				</div><!--searchPanel-->
			<div class="searchSort">
				<p class="txt">並べ替え</p>
				<ul class="tabs">
					<li>
						<a class="current" href="city_3.html">おすすめ順</a>
					</li>
					<li>
						<a href="../sorry/toobusy.html?sort=1">新着順</a>
					</li>
					<li>
						<a href="../sorry/toobusy.html?sort=2">高収入順</a>
					</li>
					<li>
						<a href="../sorry/toobusy.html?sort=3">勤務日数順</a>
					</li>
					<li>
						<a href="../sorry/toobusy.html?sort=4">人気順</a>
					</li>
					<li>
						<a href="../sorry/toobusy.html?sort=5">祝い金順</a>
					</li>
				</ul>
			</div><!--searchSort-->
			
			<div class="searchPager">
				<div class="col1">
					<p>
						<span class="modEmphasis01">93</span>
						件中1件～50件を表示
					</p>
				</div>
				<div class="col2">
					<ul class="pagination">
						<?php if(isset($paginator) && !empty($paginator)) echo $paginator;?>
					</ul>
				</div>
			</div><!--searchPager-->
			
				<div class="favoriteMeritBox">
				<h2>キープすると求人の保存ができます。</h2>
					<p>
						気になる求人をキープしておくと、
						<a href="../search/favorite.html">キープリスト</a>
						から求人の比較や、まとめて応募が簡単にできます。
					</p>
				</div><!--favoriteMeritBox-->
			<?php
				if(isset($list_work) && !empty($list_work)){
					foreach($list_work as $k=>$v){?>
						<div class="searchResultBox">
						<h2 class="clearfix">
							<a href="../123/y.html"><?php echo $v['work_title'];?></a>
							<span class="icon iconPickup">[PICK UP]</span>
						</h2>
						<div class="lead clearfix">
							<p class="txt clearfix">
								<a href="../123/y.html"><?php echo $v['work_name'];?></a>
							</p>
							<p class="iwaikin bnrBaito20000">応募後、採用決定で！祝い金5,000円</p>
						</div>
						<div class="info">
							<div class="detail clearfix">
								<table>
									<tbody>
										<?php 	if(isset($work_position) && !empty($work_position)){
													foreach($work_position as $k1=>$v1){?>
														<tr>
															<th><?php echo $v1['position_name'];?></th>
															<td> <?php echo $v1['position_salary'];?></td>
														</tr>
											<?php	}
												}?>
										<tr>
											<th>勤務時間</th>
											<td> <?php echo $v['work_time'];?></td>
										</tr>
										<tr>
											<th>地域・駅</th>
											<td><?php echo $v['work_guild_station'];?> </td>
										</tr>
									</tbody>
								</table>
								<div class="photoArea">
									<div class="photo">
										<a href="../123/y.html">
										<img class="lazy_photo" alt="ソフトバンク株式会社 北海道函館市昭和アルバイト写真" original="https://lvimg.jp/job/img/job_pict/99/296299/big.jpg/180x135-f1" src="https://<?php echo $v['work_image_url'];?>" style="display: inline;"/>
										</a>
									</div>
								</div>
							</div><!--detail clearfix-->
							<p class="prArea"><?php echo $v['work_content1'];?></p>
							<div class="mod-horizontal-btns">
								<div class="btns">
									<div class="favoriteMeritPopup js-tutorial-favorite">
										<i class="mod-icon-star-o"> キープ</i>
										すると
										<br/>
										<a href="../search/favorite.html">キープリスト</a>
										に保存ができます
									</div>
									<div id="kininaruList164681" class="col1 favoriteList btnAdd">
										<a class="mod-btn-type04 mod-font-l" onmousedown="dlpoclickFavoriteButtonClickCv(); dlpoclickSearchAreaFavoriteButtonExamineClickCv();" onclick="ga('send', 'event', 'favorite', 'button', 'favorite_from_result');" href="javascript:void 0;">
											<span class="modIconStarO01">キープする</span>
										</a>
									</div>
									<div class="col1">
										<a class="mod-btn-type04 mod-font-l"  href="<?php echo base_url();?>work/index/<?php echo $v['work_id'];?>">
											<span class="modIconChevronRightO01">もっと見る</span>
										</a>
									</div>
									<div class="col1">
										<a class="mod-btn-type05 mod-font-xxl" onclick="ga('send', 'event', 'entry', 'click', 'start_to_web_entry_button_from_result');" onmousedown="dlpoclickEntryButtonClickCv(); dlpoclickSearchAreaEntryButtonExamineClickCv();" rel="nofollow" href="../entry/164681/y.html">
											<span class="modIcon60s">
												<pre>   かんたん応募</pre>
											</span>
										</a>
									</div>
								</div>  
							</div>
							<dl class="relations">
								<dt>関連バイト</dt>
								<dd>
									・
									<a href="city_36.html">北斗市のバイト</a>
									・
									<a href="city_40.html">亀田郡のバイト</a>
									
								</dd>
							</dl>
						</div><!--info-->
					</div><!--searchResultBox-->
			<?php	}
				}else{
					if(isset($message) && !empty($message)){
						echo $message;
					}
				}?>

			<div class="multiApplyBox">
				<h2>実はバイトは9割が不採用？意外に落ちるワケ</h2>
				<p>
					気になったバイトに応募しても、
					<span class="mod-emphasis02">定員オーバー</span>
					になったり、
					<span class="mod-emphasis02">シフトが合わなかったり</span>
					して、意外とたくさん落ちているんです。
					<br/>
					いくつか応募しておくと、1つ落ちても早めに決まります。
					<br/>
					<span class="mod-emphasis02">1つだけの応募で終わらず</span>
					、複数応募しておきましょう。
				</p>
			</div><!--multiApplyBox-->
			
			<div class="bigBanner">
				<a href="../cp/11810cp/index.html">
					<img width="840" height="120" alt="7月限定！毎週火曜日は「いいバイトの日」祝い金11,810（いいバイト）円贈呈" src="template/frontend/image/bnr_11810cp_840x120.png"/>
				</a>
			</div><!--bigBanner_quang cao giua bai dang-->
			<div class="btnNextPage mod-center">
				<a class="mod-btn-type04 mod-font-l" href="city_3_1.html">
					<span class="modIconChevronRightO01">次のページへ</span>
				</a>
			</div><!--btnNextPage mod-center-->
			
			<div class="searchPager">
				<div class="col1">
					<p>
						<span class="modEmphasis01">93</span>
						件中1件～50件を表示
					</p>
				</div>
				<div class="col2">
					<ul class="pagination">
						<?php if(isset($paginator) && !empty($paginator)) echo $paginator;?>
					</ul>
				</div>
			</div><!--searchPager-->
			
			<div id="pagingUnderapply">
				<div class="leftArea"> オススメ！！最新情報をメールで紹介 </div>
				<div class="rightArea newMessageBtn">
					<a href="member/new.html">会員登録してメールを受信</a>
				</div>
			</div><!--pagingUnderapply-->
			
			<div class="pittariSlider">
				<h3 class="pittariTTL">閲覧履歴からアナタにオススメの案件を紹介</h3>
				<p class="pittaList">
					<a href="../search/recommend.html">一覧を表示</a>
				</p>
				<div id="pittariSlider" class="pittariDetail" style="width: 720px; height: 200px; overflow: hidden;">
					<ul style="width: 2160px;">
						<li style="float: left;">
							<div class="companyBox">
								<div class="photo">
								<a href="../235622/y.html">
								<img src="https://lvimg.jp/job/img/job_pict/22/235622/big.jpg/100x75-f1"/>
								</a>
								</div>
								<div class="detail">
								<p class="shop">
								<a href="../235622/y.html">株式会社日本ヒュウマップ 都城店</a>
								</p>
								<p class="jikyu">時給1,000円</p>
								<p class="area">宮崎県都城市</p>
								<p class="sta">日向庄内駅 都城駅</p>
								</div>
							</div>
						</li>
						<li style="float: left;"></li>
						<li style="float: left;"></li>
					</ul>
				</div>
				<span id="prevBtn" class="prevBtn">
					<a href="javascript:void(0);" style="display: none;">Previous</a>
				</span>
				<span id="nextBtn" class="nextBtn">
					<a href="javascript:void(0);">Next</a>
				</span>
			</div><!--pittariSlider-->
			<div id="trendword_box">
				<h3>
					過去に検索されたおすすめキーワード
					<span></span>
				</h3>
				<div id="trendword_bg">
					<img id="trendword_img" alt="フリーワード検索" src="template/frontend/image/freeword.gif"/>
					<form method="GET" action="https://j-sen.jp/search/">
						<input type="hidden" value="tohoku" name="area"/>
						<input id="trendword_input" class="HeaderSearch_input" type="text" accesskey="S" size="24" name="freeword"/>
						<input type="hidden" value="1" name="from_top"/>
						<input id="trendword_btn" type="image" alt="フリーワード検索をする" src="template/frontend/image/search_button.png" value="検索" name="SearchAs"/>
					</form>
					<p>例）短期 高校生 シフト制</p>
					<ul id="attentionList">
						<li>
							<a href="city_1_special_office.html">事務×北海道</a>
						</li>
						<li>
							<a href="noon_city_1.html">昼×北海道</a>
						</li>
					</ul>
				</div>
			</div><!--trendword_box-->
		</div>
	</div>
</div>