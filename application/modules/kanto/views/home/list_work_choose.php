<div id="wapper">
	<div id="content">
		<div id="resultBox3">
			<p>函館市のバイト</p>
		</div><!--resultBox3-->

		<div id="searchPanel">
			<div class="searchPanelInner">
				<div class="searchPanelInner2">
					<form id="searchForm" method="get" action="../../search/">
						<div class="searchWhiteBox">
							<input type="hidden" value="tohoku" name="area" id="selectArea">
							<div class="bgTop">
								<div class="inner">
									<div id="topSection" class="clearfix">
										<div style="display: none;" class="jobStaSelect">
											<ul style="display: none;" class="clearfix" id="jobOrStaionCheckTable">
												<li class="jobSelect areaWindowOpenBtn">
													<p>勤務地</p>
													<a href="javascript:void(0)" class="selectBtn">選択する</a>
												</li>
												<li class="staSelect lineWindowOpenBtn">
													<p>駅・路線</p>
													<a href="javascript:void(0)" class="selectBtn">選択する</a>
												</li>
												<li class="timeSelect timeWindowOpenBtn">
													<p>通勤時間</p>
													<a href="javascript:void(0)" class="selectBtn">選択する</a>
												</li>
											</ul>
										</div>
										<div class="jobStaSelect2">
											<div class="areaCheckList jobAreaTTL">
												<p>勤務地</p>
												<a href="javascript:void(0)" class="lineWindowOpenBtn">駅・路線で検索</a>
												<a href="javascript:void(0)" class="timeBtnSmall timeWindowOpenBtn">通勤時間</a>
											</div>
											<div class="areaCheckList mainListArea" id="jobCheckTable">
												<div class="clearfix">
													<div class="leftArea">
														<div class="mainTown">
															<ul class="clearfix">
																<li class="checkedArea">
																	<label for="city_1">
																		<input type="checkbox" checked="checked" value="1" name="city[]" id="city_1">北海道
																	</label>
																</li>
																			
																<li id="selectAreaAgain">
																	<a class="reSelectBtnMin areaWindowOpenBtn" href="javascript:void(0)">再選択する</a>
																</li>
															</ul>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div id="matchNumber">
											<p class="matchTTL">この条件にマッチした求人</p>
											<p class="matchNum clearfix">
												<span class="num0">0</span>
												<span class="num0">0</span>
												<span class="num0">0</span>
												<span class="num0">0</span>
												<span class="num9">9</span>
												<span class="num5">5</span>
											</p>
											<p class="matchUnit">件</p>
										</div>                             
									</div>
									<div id="midSection">
										<table>
											<tbody>
												<tr>
													<th><span class="jobTTL">職種</span></th>
													<td colspan="3">
														<ul class="li_job">
															<li class="li_job01">
																<label for="work_type_01">
																	<input type="checkbox" value="office" id="work_type_01"> オフィス系
																</label>
															</li>
															<li class="li_job02">
																<label for="work_type_02">
																	<input type="checkbox" value="digital" id="work_type_02"> デジタル・クリエイティブ系
																</label>
															</li>
															<li class="li_job03">
																<label for="work_type_03">
																	<input type="checkbox" value="enter" id="work_type_03"> エンターテインメント系
																</label>
															</li>
															<li class="li_job04">
																	<label for="work_type_04">
																		<input type="checkbox" value="mass" id="work_type_04"> マスコミ系
																	</label>
															</li>
															<li class="li_job01">
																<label for="work_type_05">
																	<input type="checkbox" value="food" id="work_type_05"> フード系
																</label>
															</li>
															<li class="li_job02">
																<label for="work_type_06">
																	<input type="checkbox" value="sales" id="work_type_06"> 販売・ファッション・レンタル
																</label>
															</li>
															<li class="li_job03">
																<label for="work_type_07">
																	<input type="checkbox" value="institution" id="work_type_07"> 施設・サービス系
																</label>
															</li>
															<li class="li_job04">
																<label for="work_type_08">
																	<input type="checkbox" value="transport" id="work_type_08"> 配送・物流系
																</label>
															</li>
															<li class="li_job01">
															   <label for="work_type_09">
																	<input type="checkbox" value="create" id="work_type_09"> 軽作業・製造系
																</label>
															</li>
															<li class="li_job02">
																<label for="work_type_10">
																	<input type="checkbox" value="medical" id="work_type_10"> 医療・福祉系
																</label>
															</li>
															<li class="li_job03">
																<label for="work_type_11">
																	<input type="checkbox" value="teacher" id="work_type_11"> 講師・インストラクター
																</label>
															</li>
															<li class="li_job04">
																<label for="work_type_12">
																	<input type="checkbox" value="beauty" id="work_type_12"> ビューティー系
																</label>
															</li>
														</ul>
														<div style="display:none;" id="open_01" class="sheet_type clearfix">
														<p>オフィス系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label1">
																	<input type="checkbox" value="1" name="subjob[]" id="label1">営業
																</label>
															</li>
															<li>
																<label for="label2">
																	<input type="checkbox" value="2" name="subjob[]" id="label2">電話・メール
																</label>
															</li>
															<li>
																<label for="label3">
																	<input type="checkbox" value="3" name="subjob[]" id="label3">事務・受付・経理
																</label>
															</li>
															<li>
																<label for="label4">
																	<input type="checkbox" value="4" name="subjob[]" id="label4">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_02" class="sheet_type clearfix">
														<p>デジタル・クリエイティブ系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label5">
																	<input type="checkbox" value="5" name="subjob[]" id="label5">web関連
																</label>
															</li>
															<li>
																<label for="label6">
																	<input type="checkbox" value="6" name="subjob[]" id="label6">システム関連
																</label>
															</li>
															<li>
																<label for="label7">
																	<input type="checkbox" value="7" name="subjob[]" id="label7">ゲーム関連
																</label>
															</li>
															<li>
																<label for="label8">
																	<input type="checkbox" value="8" name="subjob[]" id="label8">デザイン関連
																</label>
															</li>
															<li>
																<label for="label9">
																	<input type="checkbox" value="9" name="subjob[]" id="label9">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_03" class="sheet_type clearfix">
														<p>エンターテインメント系の業種</p>
														<ul class="list_type">
														<li>
															<label for="label10">
																<input type="checkbox" value="10" name="subjob[]" id="label10">映画館・遊園地・劇場
															</label>
														</li>
														<li>
															<label for="label11">
																<input type="checkbox" value="11" name="subjob[]" id="label11">カラオケ・漫画喫茶
															</label>
														</li>
														<li>
															<label for="label12">
																<input type="checkbox" value="12" name="subjob[]" id="label12">パチンコ・ゲームセンター・ボウリング
															</label>
														</li>
														<li>
															<label for="label13">
																<input type="checkbox" value="13" name="subjob[]" id="label13">イベント・アミューズメント施設
															</label>
														</li>
														<li>
															<label for="label14">
																<input type="checkbox" value="14" name="subjob[]" id="label14">その他
															</label>
														</li>
													</ul>
												</div>
												<div style="display:none;" id="open_04" class="sheet_type clearfix">
													<p>マスコミ系の業種</p>
													<ul class="list_type">
														<li>
															<label for="label15">
																<input type="checkbox" value="15" name="subjob[]" id="label15">編集・取材・撮影・制作
															</label>
														</li>
														<li>
															<label for="label16">
																<input type="checkbox" value="16" name="subjob[]" id="label16">モデル・タレント
															</label>
														</li>
														<li>
															<label for="label17">
																<input type="checkbox" value="17" name="subjob[]" id="label17">その他
															</label>
														</li>
													</ul>
												</div>
												<div style="display:none;" id="open_05" class="sheet_type clearfix">
													<p>フード系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label18"><input type="checkbox" value="18" name="subjob[]" id="label18">居酒屋・バー</label>
															</li>
															<li>
																<label for="label19">
																	<input type="checkbox" value="19" name="subjob[]" id="label19">レストラン
																</label>
															</li>
															<li>
																<label for="label20">
																	<input type="checkbox" value="20" name="subjob[]" id="label20">ファーストフード
																</label>
															</li>
															<li>
																<label for="label21">
																	<input type="checkbox" value="21" name="subjob[]" id="label21">カフェ・喫茶店
																</label>
															</li>
															<li>
																<label for="label22">
																	<input type="checkbox" value="22" name="subjob[]" id="label22">パン・ケーキ・お菓子
																</label>
															</li>
															<li>
																<label for="label23">
																	<input type="checkbox" value="23" name="subjob[]" id="label23">日本料理・中華料理・その他料理店
																</label>
															</li>
															<li>
																<label for="label24">
																	<input type="checkbox" value="24" name="subjob[]" id="label24">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_06" class="sheet_type clearfix">
														<p>販売・ファッション・レンタルの業種</p>
														<ul class="list_type">
															<li>
																<label for="label25">
																	<input type="checkbox" value="25" name="subjob[]" id="label25">コンビニ・スーパー
																</label>
															</li>
															<li>
																<label for="label26">
																	<input type="checkbox" value="26" name="subjob[]" id="label26">デパート・量販店
																</label>
															</li>
															<li>
																<label for="label27">
																	<input type="checkbox" value="27" name="subjob[]" id="label27">ＣＤ・ビデオ・書籍・レンタル
																</label>
															</li>
															<li>
																<label for="label28">
																	<input type="checkbox" value="28" name="subjob[]" id="label28">アパレル・雑貨・インテリア販売
																</label>
															</li>
															<li>
																<label for="label29">
																	<input type="checkbox" value="29" name="subjob[]" id="label29">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_07" class="sheet_type clearfix">
														<p>施設・サービス系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label30"><input type="checkbox" value="30" name="subjob[]" id="label30">駅・空港・ガソリンスタンド</label>
															</li>
															<li>
																<label for="label31">
																	<input type="checkbox" value="31" name="subjob[]" id="label31">ホテル・旅館・結婚式場
																</label>
															</li>
															<li>
																<label for="label32">
																	<input type="checkbox" value="32" name="subjob[]" id="label32">ジム・健康施設
																</label>
															</li>
															<li>
																<label for="label33">
																	<input type="checkbox" value="33" name="subjob[]" id="label33">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_08" class="sheet_type clearfix">
														<p>配送・物流系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label34">
																	<input type="checkbox" value="34" name="subjob[]" id="label34">在庫管理・入出荷業務
																</label>
															</li>
															<li>
																<label for="label35">
																	<input type="checkbox" value="35" name="subjob[]" id="label35">梱包・仕分け・資材搬入
																</label>
															</li>
															<li>
																<label for="label36">
																	<input type="checkbox" value="36" name="subjob[]" id="label36">郵便・宅配便・バイク便・ 新聞配達
																</label>
															</li>
															<li>
																<label for="label37">
																	<input type="checkbox" value="37" name="subjob[]" id="label37">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_09" class="sheet_type clearfix">
														<p>軽作業・製造系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label38">
																	<input type="checkbox" value="38" name="subjob[]" id="label38">工事・倉庫・引っ越し
																</label>
															</li>
															<li>
																<label for="label39">
																	<input type="checkbox" value="39" name="subjob[]" id="label39">警備・車両誘導・清掃・点検
																</label>
															</li>
															<li>
																<label for="label40">
																	<input type="checkbox" value="40" name="subjob[]" id="label40">工場
																</label>
															</li>
															<li>
																<label for="label41">
																	<input type="checkbox" value="41" name="subjob[]" id="label41">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_10" class="sheet_type clearfix">
														<p>医療・福祉系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label42">
																	<input type="checkbox" value="42" name="subjob[]" id="label42">看護師・歯科助手
																</label>
															</li>
															<li>
																<label for="label43">
																	<input type="checkbox" value="43" name="subjob[]" id="label43">医療施設
																</label>
															</li>
															<li>
																<label for="label44">
																	<input type="checkbox" value="44" name="subjob[]" id="label44">介護
																</label>
															</li>
															<li>
																<label for="label45">
																	<input type="checkbox" value="45" name="subjob[]" id="label45">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_11" class="sheet_type clearfix">
														<p>講師・インストラクターの業種</p>
														<ul class="list_type">
															<li>
																<label for="label46">
																	<input type="checkbox" value="46" name="subjob[]" id="label46">塾・家庭教師
																</label>
															</li>
															<li>
																<label for="label47">
																	<input type="checkbox" value="47" name="subjob[]" id="label47">語学講師
																</label>
															</li>
															<li>
																<label for="label48">
																	<input type="checkbox" value="48" name="subjob[]" id="label48">インストラクター
																</label>
															</li>
															<li>
																<label for="label49">
																	<input type="checkbox" value="49" name="subjob[]" id="label49">その他
																</label>
															</li>
														</ul>
													</div>
													<div style="display:none;" id="open_12" class="sheet_type clearfix">
														<p>ビューティー系の業種</p>
														<ul class="list_type">
															<li>
																<label for="label50">
																<input type="checkbox" value="50" name="subjob[]" id="label50">エステ・セラピスト・マッサージ
																</label>
															</li>
															<li>
																<label for="label51">
																<input type="checkbox" value="51" name="subjob[]" id="label51">美容師・理髪師</label>
															</li>
															<li>
																<label for="label52">
																<input type="checkbox" value="52" name="subjob[]" id="label52">その他
																</label>
															</li>
														</ul>
													</div>
												</td>                
											</tr>
											<tr>
												<th>
													<span class="priceTTL">時給</span>
												</th>
												<td class="maneyTD">
													<select class="nonDisplayIfModalMode" name="wage">
														<option value="">希望無し</option>
														<option value="900">900</option>
														<option value="1000">1000</option>
														<option value="1100">1100</option>
														<option value="1200">1200</option>
														<option value="1300">1300</option>
													</select>&nbsp;円以上                         
												</td>
												<th class="timeTH">
													<span class="timeTTL">勤務時間帯</span>
													<img assistance="【勤務時間帯の定義】
														早朝： 5時～8時
														朝&#12288;： 7時～11時
														昼&#12288;：11時～17時
														夕方：15時～19時
														夜&#12288;：18時～22時
														深夜：22時～5時" src="template/frontend/image/hint_icon.png" class="hintBtnToolTip" id="timeHintBtn" style="position: relative;"/>
												</th>
												<td class="timeTD">
													<ul class="timeCheck">
														<li class="time1">
															<label for="cb1" class="checkbox_unchecked">早朝</label>
															<input type="checkbox" value="1" class="crirHiddenJS" name="time[]" id="cb1">
														</li>
														<li class="time2">
															<label for="cb2" class="checkbox_unchecked">朝</label>
															<input type="checkbox" value="2" class="crirHiddenJS" name="time[]" id="cb2">
														</li>
														<li class="time3">
															<label for="cb3" class="checkbox_unchecked">昼</label>
															<input type="checkbox" value="3" class="crirHiddenJS" name="time[]" id="cb3">
														</li>
														<li class="time4">
															<label for="cb4" class="checkbox_unchecked">夕方</label>
															<input type="checkbox" value="4" class="crirHiddenJS" name="time[]" id="cb4">
														</li>
														<li class="time5">
															<label for="cb5" class="checkbox_unchecked">夜</label>
															<input type="checkbox" value="5" class="crirHiddenJS" name="time[]" id="cb5">
														</li>
														<li class="time6">
															<label for="cb6" class="checkbox_unchecked">深夜</label>
															<input type="checkbox" value="6" class="crirHiddenJS" name="time[]" id="cb6">
														</li>
													</ul>
												</td>
											</tr>
										</tbody>
										</table>
										<div class="clearfix" id="freeOption">
											<dl class="freewordArea">
												<dt><span>フリーワード</span></dt>
												<dd><input type="text" value="" name="freeword"></dd>
											</dl>
											<ul class="optionBtnArea">
												<li class="txt">勤務日数、特徴、現在の自分の職業などから検索できます</li>
												<li class="optionCloseBtn" id="moreSearchOptionBtn">
													<a href="javascript:void(0);">もっと詳しい条件で検索</a>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div><!--searchWhiteBox-->

						<div id="moreSearchOption" class="searchWhiteBox">
							<div id="optionTable">
								<div class="inner">
									<dl class="clearfix">
										<dt>
											<span class="workDayTTL">勤務日数</span>
										</dt>
										<dd>
											<select class="nonDisplayIfModalMode" name="day">
												<option value="">選択してください</option>
												<option value="1">週1日</option>
												<option value="2">週2日</option>
												<option value="3">週3日</option>
												<option value="4">週4日</option>
												<option value="5">週5日</option>
											</select>            
										</dd>
										<dt>
											<span class="workTimeTTL">勤務時間</span>
										</dt>
										<dd>
											<select class="nonDisplayIfModalMode" name="hour">
												<option value="">選択してください</option>
												<option value="3">3時間以内</option>
												<option value="4">4時間以内</option>
												<option value="5">5時間以内</option>
												<option value="6">6時間以内</option>
												<option value="7">7時間以内</option>
												<option value="8">8時間以内</option>
											</select>            
										</dd>
										<dt>
											<span class="featureTTL">特徴</span>
										</dt>
										<dd>
											<select class="nonDisplayIfModalMode" name="feature[]">
												<option value="">--特に指定なし--</option>
												<option value="traffic">交通費支給</option>
												<option value="week_saraly">週払いOK</option>
												<option value="day_saraly">日払いOK</option>
												<option value="free_style">服装自由</option>
												<option value="uniform">制服あり</option>
												<option value="choose_shift">曜日や時間が選べる</option>
												<option value="no_age">年齢不問</option>
												<option value="school">高校生OK</option>
												<option value="meet">食事付き</option>
												<option value="close_man">人と接する</option>
												<option value="active">体を動かす</option>
												<option value="use_language">語学力を生かせる</option>
												<option value="skill">スキルが身に付く</option>
												<option value="bike">バイク通勤OK</option>
												<option value="car">車通勤OK</option>
												<option value="no_smoking">職場禁煙</option>
												<option value="smoking_time">煙草休憩あり</option>
												<option value="day_shift">週1日からOK</option>
												<option value="color_pierced">茶髪・ピアスOK</option>
												<option value="short_work">短期OK</option>
												<option value="touroku">登録制</option>
												<option value="unexperienced">未経験可</option>
												<option value="permanent">正社員登用あり</option>
												<option value="temporary">契約社員登用あり</option>
											</select>と
											<select class="nonDisplayIfModalMode" name="feature[]" id="featureSelect2">
												<option value="">--特に指定なし--</option>
												<option value="traffic">交通費支給</option>
												<option value="week_saraly">週払いOK</option>
												<option value="day_saraly">日払いOK</option>
												<option value="free_style">服装自由</option>
												<option value="uniform">制服あり</option>
												<option value="choose_shift">曜日や時間が選べる</option>
												<option value="no_age">年齢不問</option>
												<option value="school">高校生OK</option>
												<option value="meet">食事付き</option>
												<option value="close_man">人と接する</option>
												<option value="active">体を動かす</option>
												<option value="use_language">語学力を生かせる</option>
												<option value="skill">スキルが身に付く</option>
												<option value="bike">バイク通勤OK</option>
												<option value="car">車通勤OK</option>
												<option value="no_smoking">職場禁煙</option>
												<option value="smoking_time">煙草休憩あり</option>
												<option value="day_shift">週1日からOK</option>
												<option value="color_pierced">茶髪・ピアスOK</option>
												<option value="short_work">短期OK</option>
												<option value="touroku">登録制</option>
												<option value="unexperienced">未経験可</option>
												<option value="permanent">正社員登用あり</option>
												<option value="temporary">契約社員登用あり</option>
											</select>            
										</dd>
									</dl>
									<ul>
										<li>
											<label for="requirements_right_no_school_checkbox">
												<input type="checkbox" value="right_no_school" name="requirements" id="requirements_right_no_school_checkbox">高校生不可のバイトを除く
											</label>
										</li>
										<li>
											<label for="except_medical_checkbox">
												<input type="checkbox" checked="checked" value="1" name="medical" id="except_medical_checkbox">医療バイトを除く
												<input type="hidden" value="0" name="except_medical" id="hiddenExceptMedical">
											</label>
										</li>
										<li>
											<label for="except_haken_checkbox">
												<input type="checkbox" value="1" name="haken" id="except_haken_checkbox">派遣バイトを除く
											</label>
										</li>
										<li>
											<label for="pickup_checkbox">
												<input type="checkbox" value="1" name="pickup" id="pickup_checkbox">積極採用中のアルバイト
											</label>
										</li>
										<li>
											<label for="newarrival_checkbox">
												<input type="checkbox" value="newarrival" name="custom" id="newarrival_checkbox">新着のアルバイト
											</label>
											<img id="newarrivalHintBtn" class="hintBtnToolTip" src="template/frontend/image/hint_icon.png" assistance="掲載開始から7日
											以内のアルバイト
											です">
										</li>
									</ul>
								</div>
							</div>
						</div><!--moreSearchOption-->

						<div class="underSection">
							<p style="display: none;" class="actionP_02" id="searchButtonSpotlightArrow"></p>
							<p>
								<input type="image" src="template/frontend/image/search_btn.png" onmouseout="this.src='template/frontend/image/search_btn.png'" onmouseover="this.src='template/frontend/image/search_btn_o.png'" alt="検索する">
							</p>
							<p class="txtLink">
								<a rel="nofollow" href="../../member/new">この条件のお知らせメールを受信</a>
							</p>
						</div><!--underSection-->

					<form>
				</div>
					
			</div>
		</div><!--searchPanel-->

		<div class="searchSort">
			<p class="txt">並べ替え</p>
			<ul class="tabs">
				<li>
					<a class="current" href="city_3.html">おすすめ順</a>
				</li>
				<li>
					<a href="../../sorry/toobusy.html?sort=1">新着順</a>
				</li>
				<li>
					<a href="../../sorry/toobusy.html?sort=2">高収入順</a>
				</li>
				<li>
					<a href="../../sorry/toobusy.html?sort=3">勤務日数順</a>
				</li>
				<li>
					<a href="../../sorry/toobusy.html?sort=4">人気順</a>
				</li>
				<li>
					<a href="../../sorry/toobusy.html?sort=5">祝い金順</a>
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
					<li class="next">
						<a href="../../sorry/toobusy.html">次へ</a>
					</li>
					<li class="openSkipPaginationPopup">
						<a href="../../sorry/toobusy.html">2</a>
					</li>
					<li class="current">1</li>
				</ul>
			</div>
		</div><!--searchPager-->
		
		<div class="favoriteMeritBox">
			<p class="p_h2">キープすると求人の保存ができます。</p>
			<p>
				気になる求人をキープしておくと、
				<a href="../search/favorite.html">キープリスト</a>
				から求人の比較や、まとめて応募が簡単にできます。
			</p>
		</div><!--favoriteMeritBox-->
		<?php
		if(isset($list_work) && !empty($list_work)){
			foreach($list_work as $key=>$val){
				foreach ($val as $k => $v) {?>
				<div class="searchResultBox">
					<p id="searchResultBox_h2" class="clearfix">
						<a href="../123/y.html"><?php echo $v['work_title'];?></a>
						<span class="icon iconPickup">[PICK UP]</span>
					</p>
					<div class="lead clearfix">
						<p class="txt clearfix">
							<a href="../../123/y.html">レジ・サッカー、品出し、ポーターアルバイト募集!働きやすい環境をご用意◎</a>
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
									<a href="../../123/y.html">
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
									<a href="../../search/favorite.html">キープリスト</a>
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
									<a class="mod-btn-type05 mod-font-xxl" onclick="ga('send', 'event', 'entry', 'click', 'start_to_web_entry_button_from_result');" onmousedown="dlpoclickEntryButtonClickCv(); dlpoclickSearchAreaEntryButtonExamineClickCv();" rel="nofollow" href="../../entry/164681/y.html">
										<span class="modIcon60s">かんたん応募</span>
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
		<?php	}}
		}else{
			if(isset($message) && !empty($message)){
				echo $message;
			}
		}?>
		
		<div class="multiApplyBox">
			<p id="multiApplyBox_h2">実はバイトは9割が不採用？意外に落ちるワケ</p>
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
			<a href="../../cp/11810cp/index.html">
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
					<li class="next">
						<a href="../../sorry/toobusy.html">次へ</a>
					</li>
					<li class="openSkipPaginationPopup">
						<a href="../../sorry/toobusy.html">2</a>
					</li>
					<li class="current">1</li>
				</ul>
			</div>
		</div><!--searchPager-->
		
		<div id="pagingUnderapply">
			<div class="leftArea"> オススメ！！最新情報をメールで紹介 </div>
			<div class="rightArea newMessageBtn">
				<a href="../../member/new.html">会員登録してメールを受信</a>
			</div>
		</div><!--pagingUnderapply-->
		
		<div id="trendword_box">
			<h3>
				過去に検索されたおすすめキーワード
				<span></span>
			</h3>
			<div id="trendword_bg">
				<img id="trendword_img" alt="フリーワード検索" src="template/frontend/image/freeword.gif"/>
				<form method="GET" action="../../search/">
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