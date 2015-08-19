<div id="wapper">
	
		<?php if(isset($work) && !empty($work)){?>
			<div id="content">
                <div id="main">
                    <div id="searchDetailBox">
                        <p class="iwaikin baito">
                            <span class="bnr5000">採用されたら祝い金5,000円贈呈します</span>
                            <a id="why_iwaikin" href="javascript: void 0;">なぜ祝い金をもらえるの？</a>
                        </p>
						<h2>
							<a href="/123/y.html"><?php echo $work['work_name'];?></a>
							<span class="icon iconPickup">[PICK UP]</span>
						</h2>
						<div class="clearfix" id="siteShare">
							<ul class="clearfix">
								<li>
									<a class="twitter-share-button" data-count="none" data-lang="ja" data-text="グローバルワーク 札幌エスタ店/0161のアルバイト" data-url="/123/y" href="//twitter.com/share">ツイート</a>
								</li>
								<li>
									<div class="fb-like" data-action="like" data-href="/123/y" data-layout="button" data-share="false" data-show-faces="false">
									</div>
								</li>
							</ul>
						</div>
						<div id="column">
							<div class="colR">
								<div id="infoPoint" class="box">
									<h3>注目POINT</h3>
									<?php
										if(isset($work_feature) && !empty($work_feature)){
											$feature = explode(',',$work_feature['feature_list']);?>
											
											<ul>
									<?php	foreach($feature as $k1=>$v1){?>
												<li class="<?php echo $v1;?>"><?php echo $v1;?></li>
									<?php	} ?>
											</ul>
								<?php 	} ?>
									
								</div>
								<div id="infoJobs" class="box">
									<h3>募集職種</h3>
									<?php if(isset($work_position) && !empty($work_position)){
												foreach($work_position as $k=>$v){?>
													<dl>
														<dt>
															<span><?php echo $v['position_name'];?></span>
														</dt>
														<dd>
															<em><?php echo $v['position_salary'];?></em>
														</dd>
													</dl>
										<?php	}
									}?>
									
								</div>
								<div id="infoArea" class="box">
									<h3>地域・駅</h3>
									<p>
										<?php echo $work['work_guild_station'];?>
									</p>
								</div>
							</div><!-- colR -->
							<div class="colL">
								<div class="pct">
									<img width="400" height="300" src="//<?php echo $work['work_image_url'];?>" alt="株式会社ヤマダ電機 テックランド函館店(0260/アルバイト)の大写真">
								</div>
								<p>
									<strong>家電量販店業界トップクラスのヤマダ電機で店舗スタッフ大募集!</strong>
								</p>
								<p>★<?php echo $work['work_content1'];?></p>
							</div>
						</div><!-- column -->
						<div class="btnEntryWrap">
							<div class="btnEntryV03">
								<ul class="clearfix">
									<li class="favoriteList bListA" id="kininaruList296299">
										<a href="javascript:void 0;">キープする</a>
									</li>
									<li class="bWeb55sec">
										<a rel="nofollw" href="/entry/296299/y">55秒で完了！ かんたん応募</a>
									</li>
								</ul>
							</div>
						</div><!-- btnEntryWrap -->
						
						<div id="photoBox">
							<h3>
								写真でわかる注目Point!!
								<span></span>
							</h3>
							<?php if(isset($work_photo) && !empty($work_photo)){
										foreach($work_photo as $k=>$v){?>
								<table class="photoTable">
								<tbody>
									<tr>
										<th>
											<table>
												<tbody>
													<tr>
														<td background=" frontend/template/image/photo_frame_a.gif" height="6">
															<img src=" frontend/template/image/spacer.gif" alt="Spacer" width="6" height="6">
														</td>
														<td background=" frontend/template/image/photo_frame_e.gif"></td>
														<td background=" frontend/template/image/photo_frame_b.gif" height="6">
															<img src=" frontend/template/image/spacer.gif" alt="Spacer" width="6" height="6">
														</td>
													</tr>
													<tr>
														<td background=" frontend/template/image/photo_frame_h.gif"></td>
														<td>
															<img alt="株式会社ヤマダ電機 テックランド函館店(0260/アルバイト)のアルバイト写真1" border="0" width="180" height="135" src="http://<?php echo $v['photo_image_url'];?>"/>
														</td>
														<td background=" frontend/template/image/photo_frame_f.gif"></td>
													</tr>
													<tr>
														<td background=" frontend/template/image/photo_frame_d.gif"><img src=" frontend/template/image/spacer.gif" alt="Spacer" width="6" height="6"></td>
														<td background=" frontend/template/image/photo_frame_g.gif"></td>
														<td background=" frontend/template/image/photo_frame_c.gif"><img src=" frontend/template/image/spacer.gif" alt="Spacer" width="6" height="6"></td>
													</tr>
												</tbody>
											</table>
										</th>
										<td class="photoTxt">
											<div class="photoTitle">
												<img src="template/frontend/image/icon_msg.gif"/><?php echo $v['photo_title'];?>
											</div>
											<?php echo $v['photo_content'];?>
										</td>
									</tr>
								</tbody>
							</table>
								<?php   } ?>
						<?php   } ?>
							
						</div><!-- photoBox -->
						<p>
							<?php echo $work['work_content2'];?>
						</p>
						<div id="entryBox">
						
							<div class="leftBox">
							<h3></h3>
							<?php if(isset($work_position) && !empty($work_position)){
								foreach($work_position as $k=>$v){?>
								<h4><?php echo $v['position_name'];?></h4>
								<table>
									<tbody>
										<tr>
											<th>仕事内容</th>
											<td>
												<?php echo $v['position_content'];?>
											</td>
										</tr>
										<tr>
											<th>給与</th>
											<td>
												<?php echo $v['position_salary'];?>
											</td>
										</tr>
									</tbody>
								</table>
							
						<?php	}
							}?>
							</div>
							
							<div class="rightBox">
								<h3></h3>
								<table>
									<tbody>
										<?php if(isset($work_apply['apply_cost']) && !empty($work_apply['apply_cost'])){?>
										<tr>
											<th>祝い金</th>
											<td class="iwaikinCel">
												<span><?php echo $work_apply['apply_cost'];?>円</span>
												<a target="_blank" href="/info/iwaikin.htm">祝い金とは？</a>
											</td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_shop_name']) && !empty($work_apply['apply_shop_name'])){?>
										<tr>
											<th>店舗名</th>
											<td><?php echo $work_apply['apply_shop_name'];?></td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_time']) && !empty($work_apply['apply_time'])){?>
										<tr>
											<th>勤務時間</th>
											<td><?php echo $work_apply['apply_time'];?></td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_work_time']) && !empty($work_apply['apply_work_time'])){?>
										<tr>
											<th>勤務期間</th>
											<td><?php echo $work_apply['apply_work_time'];?></td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_participants']) && !empty($work_apply['apply_participants'])){?>
										<tr>
											<th>歓迎</th>
											<td><?php echo $work_apply['apply_participants'];?></td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_qualifications']) && !empty($work_apply['apply_qualifications'])){?>
										<tr>
											<th>応募資格</th>
											<td><?php echo $work_apply['apply_qualifications'];?></td>
										</tr>
										<?php } ?>
										<?php if(isset($work_apply['apply_treatment']) && !empty($work_apply['apply_treatment'])){?>
										<tr>
											<th>待遇</th>
											<td><?php echo $work_apply['apply_treatment'];?></td>
										</tr>
										<?php } ?>
									</tbody>
								</table>
							</div>
						</div>
						<div class="btnEntryWrap">
							<div class="btnEntryV03">
								<ul class="clearfix">
									<li class="favoriteList bListA" id="kininaruList296299">
										<a href="javascript:void 0;">キープする</a>
									</li>
									<li class="bWeb55sec">
										<a rel="nofollw" href="/entry/296299/y">55秒で完了！ かんたん応募</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="sliderBoxOne">
							<h3 class="otherArbeitTTL">このアルバイトを見た人は、こんなアルバイトも見ています</h3>
							<div class="sliderDetails" id="sliderOne" style="width: 720px; height: 265px; overflow: hidden;">
								<ul style="width: 2160px;">
									<li style="float: left;">
										<div class="inner clearfix">
											<div class="companyBox">
												<div id="showPopupOffer66781" class="photo showPopupOffer">
                                                        <a href="/66781/y" class="la-recommend"><img src="https://lvimg.jp/job/img/job_pict/81/66781/big.jpg/130x97-f1" alt="ユニクロ 函館昭和タウンプラザ店のアルバイト"></a>
												</div>
												<dl class="type">
                                                    <dt>
                                                        <span>週1日〜</span>
                                                    </dt>
                                                    <dd></dd>
												</dl>
												<div class="detail">
													<p class="shop">
														<a href="/66781/y" class="la-recommend">ユニクロ 函館昭和タウンプラザ店</a>
													</p>
													<p class="jikyu">時給900円～</p>
													<p class="area">北海道函館市</p>
													<p class="sta">五稜郭、七重浜</p>
												</div>
											</div>
											<div class="companyBox">
												<div id="showPopupOffer92313" class="photo showPopupOffer">
                                                        <a href="/92313/y" class="la-recommend">
															<img src="https://lvimg.jp/job/img/job_pict/13/92313/big.jpg/130x97-f1" alt="アストロプロダクツ 函館店のアルバイト"/>
														</a>
												</div>
												<dl class="type">
                                                    <dt>
                                                        <span>週1日〜</span>
                                                    </dt>
                                                    <dd></dd>
												</dl>
												<div class="detail">
													<p class="shop">
														<a href="/92313/y" class="la-recommend">アストロプロダクツ 函館店</a>
													</p>
													<p class="jikyu">時給820円～</p>
													<p class="area">北海道函館市</p>
													<p class="sta">五稜郭、七重浜</p>
												</div>
											</div>
											<div class="companyBox">
												<div id="showPopupOffer115335" class="photo showPopupOffer">
                                                        <a href="/115335/y" class="la-recommend">
															<img src="https://lvimg.jp/job/img/job_pict/35/115335/big.jpg/130x97-f1" alt="ザ・グリーンターラ ポールスターショッピングセンター店のアルバイト">
														</a>
												</div>
												<dl class="type">
                                                    <dt>
                                                        <span>週4日〜</span>
                                                    </dt>
                                                    <dd></dd>
												</dl>
												<div class="detail">
													<p class="shop">
														<a href="/115335/y" class="la-recommend">ザ・グリーンターラ ポールスターショッピングセンター店</a>
													</p>
													<p class="jikyu">時給800円～</p>
													<p class="area">北海道函館市</p>
													<p class="sta">五稜郭、七重浜</p>
												</div>
											</div>
											<div class="companyBox">
												<div id="showPopupOffer204200" class="photo showPopupOffer">
                                                        <a href="/204200/y" class="la-recommend">
															<img src="https://lvimg.jp/job/img/job_pict/00/204200/big.jpg/130x97-f1" alt="ef-de(エフデ) 函館丸井今井店のアルバイト"/>
														</a>
												</div>
												<dl class="type">
                                                    <dt>
                                                    </dt>
                                                    <dd></dd>
												</dl>
												<div class="detail">
													<p class="shop">
														<a href="/204200/y" class="la-recommend">ef-de(エフデ) 函館丸井今井店</a>
													</p>
													<p class="jikyu">時給880円～</p>
													<p class="area">北海道函館市</p>
													<p class="sta">五稜郭公園前、中央病院前、杉並町</p>
												</div>
											</div>
											<div class="companyBox">
												<div id="showPopupOffer255349" class="photo showPopupOffer">
                                                        <a href="/255349/y" class="la-recommend">
															<img src="https://lvimg.jp/job/img/job_pict/49/255349/big.jpg/130x97-f1" alt="ソフトバンク株式会社 北海道函館市美原のアルバイト">
														</a>
												</div>
												<dl class="type">
                                                    <dt>
                                                    </dt>
                                                    <dd></dd>
												</dl>
												<div class="detail">
													<p class="shop">
														<a href="/66781/y" class="la-recommend">ユニクロ 函館昭和タウンプラザ店</a>
													</p>
													<p class="jikyu">時給1250円～</p>
													<p class="area">北海道函館市</p>
													<p class="sta">五稜郭、七重浜、桔梗</p>
												</div>
											</div>
										</div>
									</li>
								</ul>
							</div>
							<div style="text-align: right; color: gray; font-size: 11px;">このアルバイトは「函館市、販売・ファッション・レンタル」の検索条件を基に表示しています。</div>
						</div>
						<div id="connectionBox">
							<div id="connectionBoxBottom">
								<div id="connectionArbeit">
									<h4>アルバイト<h4>
									<ul>
										<li>
											<img src="image/icon_area.gif" alt="北海道のアルバイト" class="icon_area"/>
											<a href="/tohoku/北海道/" class="station">北海道のアルバイト</a>
                                        </li>
										<li>
											<img src="/img/recruit2/icon_area.gif" alt="函館市のアルバイト" class="icon_area"/>
                                            <a href="/tohoku/city_3.htm" class="station">函館市のバイト</a>
                                        </li>
									</ul>
								</div>
							</div>
						</div>
						<div id="bottomBox">
							<table id="bottomLayout">
								<tbody>
									<tr>
										<td id="leftLayout">
											<table id="bottomLogo">
												<tbody>
													<tr>
														<td>
															<img src="https://lvimg.jp/job/img/job_pict/99/296299/logo.jpg/96x96" alt="株式会社ヤマダ電機 テックランド函館店(0260/アルバイト)のロゴ">
														</td>
													</tr>
												</tbody>
											</table>
										</td>
										<td id="rightLayout">
											<h4><a href="/296299/y">株式会社ヤマダ電機 テックランド函館店(0260/アルバイト)のアルバイト情報</a>への応募について</h4>
											<table class="bottomTable">
												<tbody>
													<tr>
														<th>店舗・企業名</th>
														<td colspan="3">株式会社ヤマダ電機 テックランド函館店(0260/アルバイト)</td>
													</tr>
													<tr>
														<th>応募方法</th>
														<td>WEB応募(24時間)</td>
														<th>住所</th>
														<td>北海道函館市亀田本町66-5<br>
															<a href="/296299/y/map.htm" class="link_to_map" rel="nofollow">
																<img src="/img/recruit2/btn_map.gif" alt="地図を見る">
															</a>
														</td>
													</tr>
												</tbody>
											</table>
										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div><!-- searchDetailBox -->
                </div> <!--main-->
				
			</div><!-- content -->
	<?php }else{
			if(isset($message) && !empty($message)){
				echo $message;
			}
		}?>
			
			<div class="infoBox">
				<h3>バイト関連情報</h3>
				<p>
					【販売・ファッション・レンタルのバイト求人について】<br>
					気軽で身近なコンビニやスーパーのレジバイト、オシャレなアパレルのバイトなど、男女問わず人気の販売系の求人について紹介します。ファッションや雑貨店などは自分の好きなブランド・商品に囲まれて働けることや、髪色(茶髪)・服装・ピアスなどの自由度が高い点が魅力。派遣スタッフとして家電量販店や携帯ショップで日雇い・日払いの高時給バイトをするのも楽しいですね。食品販売の小売店舗では、各社規定の範囲で廃棄予定の食品を持ち帰りできたりする場合もあるようで、大変家計に優しいです。販売職は、商品の知識と、何より接客スキルが問われる求人ですから、履歴書では志望動機と共にコミュニケーション力を十分アピールしていきましょう。未経験歓迎や短期の募集も多く、時間の融通が利きやすいのも販売系の特徴です。最近では2ch(2ちゃんねる)や知恵袋などの口コミなどでアルバイトの評判を探しやすくなりましたが、ネットでの求人の評判はあくまでも参考情報。職場環境やシフト制度・研修内容、販売ノルマがきついか等は電話や面接で実際の情報を確かめることが必要です。
				</p>
				<p class="hedge">※上記の内容はジョブセンスが考える一般的な情報であり、このページの求人案件と異なるケースもあります。</p>
			</div>
        </div><!-- wapper -->