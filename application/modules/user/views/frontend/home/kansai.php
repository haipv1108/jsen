 <div id="wrapper">
        <div id="mainContents">
            <div id="article">
                <div id="arbeitSearchBox">
                    <h2>アルバイトを探す</h2>
                    <div id="mainPanel" class="clearfix">
                        <div id="selectMenu">
                            <div id="chooseBox">
                                <h3>条件を選んで探す</h3>
                                <ul class="idTabs">
                                    <li class="cb01">
                                        <a class="selected" href="#areaMapBox">エリアから探す</a>
                                    </li>
                                    <li class="cb02">
                                        <a class="" href="#lineMapBox">路線から探す</a>
                                    </li>
                                    <li class="cb03">
                                        <a class="" href="#jobMapBox">職種から探す</a>
                                    </li>
                                    <li class="cb04">
                                        <a class="" href="#featureMapBox">特徴から探す</a>
                                    </li>
                                    <li class="cb05">
                                        <a class="" href="#timeMapBox">通勤時間から探す</a>
                                    </li>
                                    <li class="cb06">
                                        <a class="" href="#mapMapBox">地図から探す</a>
                                    </li>
                                </ul>
                            </div>

                            <div id="freewordBox">
                                <div class="fwArea">
                                    <form method="get" action="https://j-sen.jp/search/">
                                        <input type="hidden" value="kansai" name="area">
                                        <input type="hidden" value="1" name="from_top">
                                        <input class="fwtext" type="text" onblur="if (!this.value) { this.value='フリーワード検索';}" onfocus="if (this.value == 'フリーワード検索') { this.value='' }" value="フリーワード検索" name="freeword">
                                        <input class="fwBtn" type="image" alt="検索" src="../../image//home/fwsearch_btn.png" onmouseout="this.src='../../image/fwsearch_btn.png'" onmouseover="this.src='../../image/fwsearch_btn_o.png'">
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="areaMapBox" class="clearfix" style="display: none;">
                            <div class="ttl">
                                <h4>エリアから探す</h4>
                                <p class="allLink">
                                    <a href="/" class="forceTop">全国のアルバイトへ</a>
                                </p>
                            </div>
                            <div class="aMap">
                                <ul class="idTabs">
                                    <ul class="idTabs">
                                        <li class="am25">
                                            <a href="/guide_area25.htm">大阪</a>
                                        </li>
                                        <li class="am26">
                                            <a href="/guide_area26.htm">兵庫</a>
                                        </li>
                                        <li class="am27">
                                            <a href="/guide_area27.htm">京都</a>
                                        </li>
                                        <li class="am28">
                                            <a href="/guide_area28.htm">滋賀</a>
                                        </li>
                                        <li class="am29">
                                            <a href="/guide_area29.htm">奈良</a>
                                        </li>
                                        <li class="am30">
                                            <a href="/guide_area30.htm">和歌山</a>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>
                        <div id="lineMapBox" class="clearfix" style="display: none;">
                            <div class="ttl">
                                <h4>路線から探す</h4>
                                <p class="allLink">
                                    <a class="forceTop" href="/">全国のアルバイトへ</a>
                                </p>
                            </div>
                            <div class="aMap">
                                <ul>
                                    <ul>
                                        <li class="am25">
                                            <a href="/guide_area25_line.htm">大阪</a>
                                        </li>
                                        <li class="am26">
                                            <a href="/guide_area26_line.htm">兵庫</a>
                                        </li>
                                        <li class="am27">
                                            <a href="/guide_area27_line.htm">京都</a>
                                        </li>
                                        <li class="am28">
                                            <a href="/guide_area28_line.htm">滋賀</a>
                                        </li>
                                        <li class="am29">
                                            <a href="/guide_area29_line.htm">奈良</a>
                                        </li>
                                        <li class="am30">
                                            <a href="/guide_area30_line.htm">和歌山</a>
                                        </li>
                                    </ul>
                                </ul>
                            </div>
                        </div>

                        <div id="jobMapBox" class="clearfix" style="display: none;">
                            <div class="ttl">
                                <h4>職種から探す</h4>
                                <p class="allLink">
                                <a class="forceTop" href="/">全国のアルバイトへ</a>
                                </p>
                            </div>
                            <div class="jobType">
                                <form method="get" action="/search/">
                                    <input type="hidden" value="kansai" name="area">
                                    <ul>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="office" name="job[]">
                                                <a id="iconType01" href="/kansai/job_office.htm">オフィス系</a>
                                            </label>
                                            <span>└ 営業、事務、受付...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="digital" name="job[]">
                                                <a id="iconType02" href="/kansai/job_digital.htm">デジタル・クリエイティブ系</a>
                                            </label>
                                            <span>└ web、システム、デザイン...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="enter" name="job[]">
                                                <a id="iconType03" href="/kansai/job_enter.htm">エンターテインメント系</a>
                                            </label>
                                            <span>└ イベント、アミューズメント...</span>
                                        </li>
                                        <li>
                                        <label>
                                            <input type="checkbox" value="mass" name="job[]">
                                                <a id="iconType04" href="/kansai/job_mass.htm">マスコミ系</a>
                                            </label>
                                            <span>└ 取材、制作、モデル、タレント...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="food" name="job[]">
                                                <a id="iconType05" href="/kansai/job_food.htm">フード系</a>
                                            </label>
                                            <span>└ 居酒屋、レストラン、カフェ...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="sales" name="job[]">
                                                <a id="iconType06" href="/kansai/job_sales.htm">販売・ファッション系</a>
                                            </label>
                                            <span>└ デパート、アパレル、インテリア...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="institution" name="job[]">
                                                <a id="iconType07" href="/kansai/job_institution.htm">施設・サービス系</a>
                                            </label>
                                            <span>└ 駅、空港、ホテル、ジム...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="transport" name="job[]">
                                                <a id="iconType08" href="/kansai/job_transport.htm">配送・物流系</a>
                                            </label>
                                            <span>└ 在庫管理、梱包、郵便、宅配便...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="create" name="job[]">
                                                <a id="iconType09" href="/kansai/job_create.htm">軽作業・製造系</a>
                                            </label>
                                            <span>└ 工事、引っ越し、警備、清掃...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="medical" name="job[]">
                                                <a id="iconType10" href="/kansai/job_medical.htm">医療・福祉系</a>
                                            </label>
                                            <span>└ 看護師、歯科助手、介護...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="teacher" name="job[]">
                                                <a id="iconType11" href="/kansai/job_teacher.htm">塾講師・インストラクター系</a>
                                            </label>
                                            <span>└ 塾・家庭教師、語学講師...</span>
                                        </li>
                                        <li>
                                            <label>
                                                <input type="checkbox" value="beauty" name="job[]">
                                                <a id="iconType12" href="/kansai/job_beauty.htm">ビューティー系</a>
                                            </label>
                                            <span>└ エステ、マッサージ、美容師...</span>
                                        </li>
                                    </ul>
                                    
                                    <p class="searchBtn">
                                        <input type="image" alt="検索" onmouseout="this.src='../../image/s_search_btn.png'" onmouseover="this.src='../../image/s_search_btn_o.png'" src="../../image/s_search_btn.png">
                                    </p>
                                </form>
                            </div>
                        </div>

                        <div id="featureMapBox" class="clearfix" style="display: none;">
                            <div class="ttl">
                                <h4>特徴から探す</h4>
                                <p class="allLink">
                                <a class="forceTop" href="/">全国のアルバイトへ</a>
                                </p>
                            </div>
                            <div class="jobType">
                                <p>
                                    <em class="txtOrange">※特徴は２つまで選択可能です</em>
                                </p>
                                <form method="get" action="/search/">
                                    <input type="hidden" value="kansai" name="area">
                                    <ul>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="short_work" name="feature[]">
                                                <a id="iconType13" href="/kansai/feature_short_work.htm">短期OK</a>
                                                (1913)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="week_saraly" name="feature[]">
                                                <a id="iconType25" href="/kansai/feature_week_saraly.htm">週払いOK</a>
                                                (5744)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="day_saraly" name="feature[]">
                                                <a id="iconType14" href="/kansai/feature_day_saraly.htm">日払いOK</a>
                                                (1804)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="choose_shift" name="feature[]">
                                                <a id="iconType26" href="/kansai/feature_choose_shift.htm">曜日や時間が選べる</a>
                                                (15752)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                            <input class="c_box" type="checkbox" value="school" name="feature[]">
                                            <a id="iconType15" href="/kansai/feature_school.htm">高校生OK</a>
                                            (2930)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="day_shift" name="feature[]">
                                                <a id="iconType27" href="/kansai/feature_day_shift.htm">週1日からOK</a>
                                                (3457)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="touroku" name="feature[]">
                                                <a id="iconType16" href="/kansai/feature_touroku.htm">登録制</a>
                                                (7917)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="use_language" name="feature[]">
                                                <a id="iconType28" href="/kansai/feature_use_language.htm">語学力を生かせる</a>
                                                (10356)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="color_pierced" name="feature[]">
                                                <a id="iconType17" href="/kansai/feature_color_pierced.htm">茶髪・ピアスOK</a>
                                                (6615)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="no_age" name="feature[]">
                                                <a id="iconType29" href="/kansai/feature_no_age.htm">年齢不問</a>
                                                (4968)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="traffic" name="feature[]">
                                                <a id="iconType18" href="/kansai/feature_traffic.htm">交通費支給</a>
                                                (34238)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="free_style" name="feature[]">
                                                <a id="iconType30" href="/kansai/feature_free_style.htm">服装自由</a>
                                                (9025)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="uniform" name="feature[]">
                                                <a id="iconType19" href="/kansai/feature_uniform.htm">制服あり</a>
                                                (31028)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="meet" name="feature[]">
                                                <a id="iconType31" href="/kansai/feature_meet.htm">食事付き</a>
                                                (4828)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="close_man" name="feature[]">
                                                <a id="iconType20" href="/kansai/feature_close_man.htm">人と接する</a>
                                                (40578)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="active" name="feature[]">
                                                <a id="iconType32" href="/kansai/feature_active.htm">体を動かす</a>
                                                (10839)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="skill" name="feature[]">
                                                <a id="iconType21" href="/kansai/feature_skill.htm">スキルが身に付く</a>
                                                (35316)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="bike" name="feature[]">
                                                <a id="iconType33" href="/kansai/feature_bike.htm">バイク通勤OK</a>
                                                (3826)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="car" name="feature[]">
                                                <a id="iconType22" href="/kansai/feature_car.htm">車通勤OK</a>
                                                (7598)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="no_smoking" name="feature[]">
                                                <a id="iconType34" href="/kansai/feature_no_smoking.htm">職場禁煙</a>
                                                (21545)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="smoking_time" name="feature[]">
                                                <a id="iconType23" href="/kansai/feature_smoking_time.htm">煙草休憩あり</a>
                                                (1521)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="unexperienced" name="feature[]">
                                                <a id="iconType35" href="/kansai/feature_unexperienced.htm">未経験可</a>
                                                (48162)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="permanent" name="feature[]">
                                                <a id="iconType24" href="/kansai/feature_permanent.htm">正社員登用あり</a>
                                                (24398)
                                            </label>
                                        </li>
                                        <li>
                                            <label>
                                                <input class="c_box" type="checkbox" value="temporary" name="feature[]">
                                                <a id="iconType36" href="/kansai/feature_temporary.htm">契約社員登用あり</a>
                                                (15373)
                                            </label>
                                        </li>
                                    </ul>

                                    <p class="searchBtn">
                                    <input type="image" alt="検索" onmouseout="this.src='../../image/s_search_btn.png'" onmouseover="this.src='../../image/s_search_btn_o.png'" src="../../image/s_search_btn.png">
                                    </p>
                                </form>
                            </div>
                        </div>

                        <div id="timeMapBox" class="clearfix" style="display: none;">
                            <div class="ttl">
                                <h4>通勤時間から探す</h4>
                                <p class="allLink">
                                <a class="forceTop" href="/">全国のアルバイトへ</a>
                            </p>
                            </div>
                            <div class="timeSelectArea">
                                <div class="inner">
                                    <form id="nminForm" method="get" action="/guide_nmin.htm">
                                    <ul>
                                        <li class="stationList">
                                            <h5>駅名</h5>
                                            <input id="incTextInput" type="text" value="" name="nmin[name]" onfocus="this.style.background='#fff'" autocomplete="off">
                                            <input id="incHiddenInput" class="hiddenStationId" type="hidden" name="nmin[id]">
                                        </li>
                                        <li class="timeList">
                                            <h5>通勤時間</h5>
                                            <select name="nmin[time]">
                                            <option value="5">5分以内</option>
                                            <option value="10">10分以内</option>
                                            <option selected="selected" value="15">15分以内</option>
                                            <option value="20">20分以内</option>
                                            <option value="25">25分以内</option>
                                            <option value="30">30分以内</option>
                                            <option value="35">35分以内</option>
                                            <option value="40">40分以内</option>
                                            <option value="45">45分以内</option>
                                            <option value="50">50分以内</option>
                                            <option value="60">60分以内</option>
                                            <option value="70">70分以内</option>
                                            <option value="80">80分以内</option>
                                            <option value="90">90分以内</option>
                                            </select>
                                        </li>
                                        <li class="changeList">
                                            <h5>乗り換え回数</h5>
                                            <select name="nmin[n]">
                                                <option value="">指定無し</option>
                                                <option value="0">0回</option>
                                                <option value="1">1回</option>
                                                <option value="2">2回</option>
                                            </select>
                                        </li>
                                    </ul>
                                    <p class="error">
                                        <strong id="nminErrorMessage" style="display: none;"></strong>
                                    </p>
                                    </form>
                                    <p class="searchBtn">
                                        <input id="nminFormSubmitButton" type="image" src="../../image/s_search_btn.png" onmouseover="this.src='../../image/s_search_btn_o.png'" onmouseout="this.src='../../image/s_search_btn.png'" alt="検索">
                                    </p>
                                </div>
                            </div>
                            <div class="timeComment">
                                <h5>通勤時間検索の機能とは？</h5>
                                <p class="mb10">自宅や学校の最寄り駅から勤務地までの通勤時間で検索できます。</p>
                                <dl class="point1">
                                    <dt>知らない駅のオススメ求人を発見！</dt>
                                    <dd>
                                        <p>
                                        「指定した駅から20分以内」という指定ができるので、
                                        <br>
                                        あなたの知らない素敵な最寄り駅の求人も発見!!
                                        </p>
                                    </dd>
                                </dl>
                                <dl class="point2">
                                    <dt>もちろん乗り換えも考慮!!</dt>
                                    <dd>
                                        <p>
                                        乗り換え時間、乗り換え回数を考慮して検索!!
                                        <br>
                                        「実際に行ってみたら遠かった」といった心配も不要!!
                                        </p>
                                    </dd>
                                </dl>
                            </div>
                        </div>

                        <div id="mapMapBox" class="clearfix" style="display: block;">
                            <div class="ttl">
                                <h4>地図から探す</h4>
                                <p class="allLink">
                                    <a class="forceTop" href="/">全国のアルバイトへ</a>
                                </p>
                            </div>
                            <div class="aMap">
                                <ul>
                                    <li class="am25">
                                        <a href="/guide_area25_map.htm">大阪</a>
                                    </li>
                                    <li class="am26">
                                        <a href="/guide_area26_map.htm">兵庫</a>
                                    </li>
                                    <li class="am27">
                                        <a href="/guide_area27_map.htm">京都</a>
                                    </li>
                                    <li class="am28">
                                        <a href="/guide_area28_map.htm">滋賀</a>
                                    </li>
                                    <li class="am29">
                                        <a href="/guide_area29_map.htm">奈良</a>
                                    </li>
                                    <li class="am30">
                                        <a href="/guide_area30_map.htm">和歌山</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="pickupBox">
                    <div class="ttl">
                        <h2>人気バイトをピックアップ</h2>
                        <ul class="idTabs">
                            <li class="none"><a class="selected" href="#close"></a></li>
                            <li class="as"><a class="" href="#areaSelect"></a></li>
                        </ul>

                        <!-- Hien thi thong tin-->
                        <div id="areaSelect" style="display: none;">
                            <div class="inner">
                                <div class="clearfix">
                                    <h3>エリア選択</h3>
                                    <p class="idTabs">
                                        <a class="closeBtn" href="#close">閉じる</a>
                                    </p>
                                </div>
                                <p class="comment">他の地域でアルバイトを検索したい方は下記より地域名を選択してください。
                                </p>
                                <ul>
                                    <li>
                                        <a href="/tohoku/index.htm">北海道・東北</a>
                                        (7590)
                                    </li>
                                    <li>
                                        <a href="/hokuriku/index.htm">甲信越・北陸</a>
                                        (5467)
                                    </li>
                                    <li>
                                        <a href="/tokai/index.htm">東海</a>
                                        (11379)
                                    </li>
                                    <li>
                                        <a href="/kansai/index.htm">関西</a>
                                        (14606)
                                    </li>
                                    <li>
                                        <a href="/chugoku/index.htm">中国・四国</a>
                                        (5259)
                                    </li>
                                    <li>
                                        <a href="/kyusyu/index.htm">九州・沖縄</a>
                                        (5816)
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="pickup01">
                        <h3>特徴から探す</h3>
                        <p class="more"><a href="/guide_kansai_feature/">もっと見る</a></p>
                        <!-- Phan list nay viet code vao de in ra nha, t viet vi du vai cai thoi, cu viet code giong vi du la no tu in ra dung -->
                        <div class="pickuplist">
                            <ul>
                                <li>
                                    <a href="/kansai/feature_short_work.htm">短期バイト</a>
                                    (1964)
                                </li>
                                <li>
                                    <a href="/kansai/feature_day_saraly.htm">日払いOK</a>
                                    (1836)
                                </li>
                                <li>
                                    <a href="/kansai/feature_week_saraly.htm">週払いOK</a>
                                    (5753)
                                </li>
                                <li>
                                    <a href="/kansai/feature_school.htm">高校生OK</a>
                                    (3404)
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="pickup02">
                        <h3>人気職種から探す</h3>
                        <p class="more">
                        <a href="/guide_kansai_job/">もっと見る</a>
                        </p>
                        <div class="pickuplist">
                            <u>
                            </u>
                        </div>
                    </div>
                    <div class="pickup03">
                        <h3>人気エリアから探す</h3>
                        <p class="more">
                        <a href="/guide_kansai_area/">もっと見る</a>
                        </p>
                        <div class="pickuplist">
                            <u>
                            </u>
                        </div>
                    </div>
                    <div class="pickup04">
                        <h3>ビル名・場所から探す</h3>
                        <p class="more">
                        <a href="/guide_kansai_landmark/">もっと見る</a>
                        </p>
                        <div class="pickuplist">
                            <u>
                            </u>
                        </div>
                    </div>
                    <div class="pickup05">
                        <h3>ブランド名・ショップから探す</h3>
                        <p class="more">
                        <a href="/guide_kansai_bland/">もっと見る</a>
                        </p>
                        <div class="pickuplist">
                            <u>
                            </u>
                        </div>
                    </div>
                </div>
                <div id="recommendBox">
                    <h2>ジョブセンスお役立ちコンテンツ</h2>
                    <div class="line">
                        <dl class="reco01 clearfix">
                            <dt><a href="/contents/faq/index.htm">よくある質問</a></dt>
                            <dd class="clearfix">
                                <p class="icon"><a href="/contents/faq/index.htm">よくある質問</a></p>
                                <p class="txt">ジョブセンス利用者から寄せられるよくある質問を掲載</p>
                            </dd>
                        </dl>
                        
                        <dl class="reco02">
                            <dt>
                                <a href="/contents/rireki.htm">履歴書の書き方</a>
                            </dt>
                            <dd>
                                <p class="icon">
                                <a href="/contents/rireki.htm">履歴書の書き方</a>
                                </p>
                            <p class="txt">アルバイトの履歴書の書き方を丁寧に解説</p>
                            </dd>
                        </dl>
                        <dl class="reco03">
                            <dt>
                                <a href="/keyword/">トレ単</a>
                            </dt>
                            <dd>
                                <p class="icon"><a href="/keyword/">トレ単</a></p>
                                <p class="txt">最新アルバイトのトレンドをチェック</p>
                            </dd>
                        </dl>
                    </div>
                    <div class="line">
                        <dl class="reco04">
                            <dt>
                                <a href="/qanda/">Q&Aコミュニティ</a>
                            </dt>
                            <dd>
                                <p class="icon">
                                <a href="/qanda/">Q&Aコミュニティ</a>
                                </p>
                                <p class="txt">アルバイトに関するQ&Aを多数掲載</p>
                            </dd>
                        </dl>
                        <dl class="reco05">
                            <dt>
                                <a href="/exptalk/">アルバイト体験談</a>
                            </dt>
                            <dd>
                                <p class="icon">
                                <a href="/exptalk/">アルバイト体験談</a>
                                </p>
                                <p class="txt">みんなのアルバイト体験談を見てみよう</p>
                            </dd>
                        </dl>
                        <dl class="reco08">
                            <dt>
                                <a href="/contents/taisetsu/index.htm">企業インタビュー</a>
                            </dt>
                            <dd>
                                <p class="icon">
                                <a href="/contents/taisetsu/index.htm">企業インタビュー</a>
                                </p>
                                <p class="txt">アルバイトを大切にすることに自信アリ！の企業にインタビューしてみました</p>
                            </dd>
                        </dl>
                    </div>
                </div>
                <div id="specialBox">
                    <div class="inner">
                        <h3>こだわり特集</h3>
                        <ul>
                            <li>
                                <a href="/pickup_juku.htm">塾講師のアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_highwage.htm">高収入（高額）アルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_school.htm">高校生アルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_regist.htm">登録制アルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_day.htm">日払いアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_short.htm">短期アルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_regular.htm">正社員登用ありのアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_nurse.htm">看護師のアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_kaigo.htm">介護のアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_pharmacist.htm">薬剤師のアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_callcenter.htm">コールセンターのアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_haken.htm">派遣のアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_opening.htm">オープニングスタッフのアルバイト</a>
                            </li>
                            <li>
                                <a href="/pickup_clothing.htm">アパレルのアルバイト</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div id="newInfoBox">
                    <h3>新着のアルバイト情報</h3>
                    <!-- Thời gian up chỉ hiển thị demo, còn thực thế phải truy xuất trong csdl-->
                    <dl>
                        <dt>
                            <a href="/323036/y">キンコーズ 千葉中央店</a> （時給1,000円～）
                            <strong>2015年07月24日UP!</strong>
                        </dt>
                        <dd>印刷、製本、DTPのスキルを身につけませんか?</dd>
                    </dl>
                    <dl>
                        <dt>
                            <a href="/335889/y">佐藤美装</a> （日給12,000円～）
                            <strong>2015年07月24日UP!</strong>
                        </dt>
                        <dd>【改修工事スタッフ】未経験からプロの技術が身に付くお仕事始めませんか?</dd>
                    </dl>
                    <dl>
                        <dt>
                            <a href="/336987/y">イーボル 丸井新宿本館</a> （時給1,200円～）
                            <strong>2015年07月24日UP!</strong>
                        </dt>
                        <dd>【1日8h、週5日〜OK】ファッションに興味ある明るく元気な方を募集♪</dd>
                    </dl>
                    <div class="endLine"></div>
                </div>

                <div id="seoBox">
                    <h3><span>アルバイト／バイト求人情報ジョブセンス</span></h3>
                    <p>
                        アルバイト求人情報サイト「ジョブセンス」では、アルバイト/バイト/パート採用者全員に最大2万円の採用祝い金を贈呈しております！
                        <br>
                        日本最大級のお仕事情報を地域、路線、職種、特徴などさまざまな方法で検索可能です。
                        <br>
                        東京や大阪、京都を始めとした全国の求人情報、カフェやコンビニ、アパレルのバイトなどの人気職種も多数掲載！
                        <br>
                        塾講師/家庭教師につきましてはパートナー企業「
                        <a href="http://www.juku.st/" target="_blank">塾講師ステーション</a>
                        」と提携しています。
                    </p>
                </div>

                <div id="footerArea">
                    <div class="inner">
                        <h3>アルバイト／バイト求人情報を探す</h3>
                        <ul class="blueLine">
                            <li class="areaTTL">主要都市</li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/station_1276.htm">渋谷</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/station_1279.htm">新宿</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/station_1283.htm">池袋</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/station_1513.htm">横浜</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tokai/city_660.htm">浜松</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tokai/station_5008.htm">名古屋</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/city_839.htm">神戸</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/city_801.htm">堺</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/city_143.htm">仙台</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/kansai/city_2.htm">札幌</a>
                            </li>
                        </ul>
                        <!-- Đoạn dưới này truy xuất csdl rồi printf theo dạng ở dưới t đã làm mẫu-->
                        <ul>
                            <li class="areaTTL">
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/index.htm">北海道・東北版</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E5%8C%97%E6%B5%B7%E9%81%93/">北海道</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E9%9D%92%E6%A3%AE%E7%9C%8C/">青森</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E5%B2%A9%E6%89%8B%E7%9C%8C/">岩手</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E5%AE%AE%E5%9F%8E%E7%9C%8C/">宮城</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E7%A7%8B%E7%94%B0%E7%9C%8C/">秋田</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E5%B1%B1%E5%BD%A2%E7%9C%8C/">山形</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/tohoku/%E7%A6%8F%E5%B3%B6%E7%9C%8C/">福島</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <div id="aside">Quang cao</div>
        </div>
        
        
        <div class="footerGoTop">
            <p><a href="#topNavi">ページトップへ戻る</a></p>
        </div>
        <div id="footerBread">
            <ul class="clearfix">
                <li class="home">バイトTOP</li>
            </ul>
        </div>
        
        <div id="footerLink">
            <div id="footerInner" class="clearfix">
                <div class="footLeft">
                    <div class="inner">
                        <h3>ジョブセンスについて</h3>
                        <ul>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/info/corp.htm">求人広告掲載のお申し込み</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="file:///C:/wamp/www/J-sen/j-sen.jp/contents/faq/index.htm">お問い合わせ</a>
                            </li>
                            <li>
                                <a rel="nofollow" href="file:///C:/wamp/www/J-sen/j-sen.jp/info/privacy.htm">個人情報保護方針</a>
                            </li>
                            <li>
                                <a target="blank" rel="nofollow" href="http://www.livesense.co.jp/company/overview.htm">会社概要</a>
                            </li>
                            <li>
                                <a href="file:///C:/wamp/www/J-sen/j-sen.jp/sitemap/index.htm">サイトマップ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footCenter">
                    <div class="inner">
                        <h3>運営サイト</h3>
                        <ul>
                            <li>
                                <a target="_blank" href="http://job.j-sen.jp/">転職の求人ならジョブセンスリンク</a>
                            </li>
                            <li>
                                <a target="_blank" href="http://haken.j-sen.jp/">派遣の求人ならジョブセンス派遣</a>
                            </li>
                            <li>
                                <a target="_blank" href="http://jobtalk.jp/">転職のクチコミなら転職会議</a>
                            </li>
                            <li>
                                <a target="_blank" href="http://chintai.door.ac/">賃貸情報ならdoor賃貸</a>
                            </li>
                            <li>
                                <a target="_blank" href="http://imitsu.jp/">BtoBの業者比較・評判ならimitsu</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="footRight">
                    <div class="inner">
                        <h3>こだわり特集</h3>
                        <ul class="clearfix">
                            <li>
                                <dl>
                                    <dt class="fBnr12">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_haken.htm">派遣のアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                    <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_haken.htm">派遣のアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="fBnr02">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_highwage.htm">高収入のアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_highwage.htm">高収入のアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="fBnr08">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_nurse.htm">看護師のアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_nurse.htm">看護師のアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="fBnr09">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_kaigo.htm">介護のアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_kaigo.htm">介護のアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="fBnr06">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_short.htm">短期・単発のアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_short.htm">短期・単発のアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                            <li>
                                <dl>
                                    <dt class="fBnr03">
                                        <span>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_school.htm">高校生OKのアルバイト特集</a>
                                        </span>
                                    </dt>
                                    <dd>
                                        <a href="file:///C:/wamp/www/J-sen/j-sen.jp/pickup_school.htm">高校生OKのアルバイト特集</a>
                                    </dd>
                                </dl>
                            </li>
                        </ul>
                        <div class="freeword">
                            <form>
                                <input type="hidden" value="1" name="from_top"/>
                                <input type="hidden" value="kansai" name="area"/>
                                <input class="searchBox inputTxt" type="text" onblur="if (!this.value) { this.value='フリーワード検索';}" onfocus="if (this.value == 'フリーワード検索') { this.value='' }" name="freeword" value="フリーワード検索"/>
                                <input class="searchBtn" type="image" src="image/header_search_btn.png" onmouseout="this.src='image/header_search_btn.png'" onmouseover="this.src='image/header_search_btn.png'" alt="検索"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="copyright">
            <p>Copyright © Livesense Inc. All rights reserved.<br/>
                アルバイト/バイト募集情報サイト『ジョブセンス』
            </p>
        </div>
    </div>