<!DOCTYPE HTML>
<html>
<head>
    <title><?php if(isset($meta_title)) echo $meta_title; else echo "j-sen.jp";?></title>
    <base href="http://localhost/ci3/">
	<meta http-equiv="content-type" content="text/html" />
	<meta name="author" content="Persiden.C.Kid" />

    <link rel="stylesheet" type="text/css" href="template/frontend/style.css"/>
    <meta http-equiv="Content-Language" content="ja">
    <meta http-equiv="imagetoolbar" content="no">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="google" content="nositelinkssearchbox">
    <meta name="referrer" content="origin">
    <meta name="title" content="アルバイト/バイト求人情報ならジョブセンス【最大２万円の祝い金】" />
    <meta name="keywords" content="アルバイト,バイト,求人情報,募集,情報" />
    <meta name="description" content="アルバイト求人情報や募集情報ならバイト情報サイト「ジョブセンス」。採用決定者全員に最大２万円のアルバイト採用祝い金を贈呈中。アナタの理想のアルバイト探ししませんか？" />
    <title>アルバイト/バイト求人情報ならジョブセンス【最大２万円の祝い金】</title>
    <meta property="og:type" content="website" />
    <meta property="og:title" content="アルバイト/バイト求人情報ならジョブセンス【最大２万円の祝い金】" />
    <meta property="og:url" content="https://j-sen.jp/" />
    <meta property="og:image" content="https://j-sen.jp/img/common/ogp.png" />
    <meta property="og:description" content="アルバイト求人情報や募集情報ならバイト情報サイト「ジョブセンス」。採用決定者全員に最大２万円のアルバイト採用祝い金を贈呈中。アナタの理想のアルバイト探ししませんか？" />
    <link rel="apple-touch-icon-precomposed" href="/apple-touch-icon-precomposed.png" />


    <script type="text/javascript" src="template/frontend/j-sen.jp/js/prototype.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/scriptaculous/scriptaculous.js?load=effects"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/header.js?cache=20150406145832" async></script>

    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/noconflict.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery.li-scroller.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/idTabs.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/cookie.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/easySlider1.5.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/opinion_form.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/search_save_cond.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery.cookie.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery.lightbox_me.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/keisai_headerbar.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/jquery.lazyload.mini.js"></script>
    <script type="text/javascript" src="template/frontend/j-sen.jp/js/suggestion.js"></script>
    <link rel="stylesheet" type="text/css" media="all" href="/css3/common_main_header_new.css?cache=150707" />
    <link rel="stylesheet" type="text/css" media="all" href="/css3/home.css?cache=150724" />
   
</head>

<body id="<?php echo isset($id_body)? $id_body: '';?>">
	<?php if(isset($keisaiHeaderBar)){?>
    <div id="keisaiHeaderBar">
        <div class="inner">
            <div class="col-1">掲載をお考えの企業様は<a href="#">こちら</a></div>
            <div class="col-2"><a class="icon-times close" href="javascript: void(0);">表示を消す</a></div>
        </div>
    </div>
	<?php }?>
    <div id="loginWindow" style="display: none;">
        <div id="loginWindowInner" class="loginWindowInner">
            <form method="post" accept-charset="UTF-8" action="/sessions?redirect_to=https%3A%2F%2Fj-sen.jp%2F">
                <input type="hidden" value="✓" name="utf8">
                <ul>
                    <li id="loginMail">
                        <strong>メールアドレス</strong>
                        <span>
                        <input id="session_email" type="text" name="session[email]">
                        </span>
                    </li>
                    <li id="loginPass">
                        <strong>パスワード</strong>
                        <span>
                        <input id="session_password" type="password" name="session[password]">
                        </span>
                    </li>
                    <li id="loginAuto">
                        <label for="session_should_remember">
                        <input id="session_should_remember" type="checkbox" checked="checked" value="1" name="session[should_remember]">
                        次回から自動でログイン
                        </label>
                    </li>
                    <li id="csrf">
                        <input id="session_authenticity_token" type="hidden" value="J0/PRRuJgiFMQzpTZuu+OxAiC477iy4JwzAuXVSKuU8=" name="session[authenticity_token]">
                    </li>
                </ul>
                <div class="loginBtnArea">
                    <input type="image" onclick="('skipConfirm' in window) ? skipConfirm() : true" onmouseout="this.src='template/frontend/image/header_login_btn.png'" onmouseover="this.src='template/frontend/image/header_login_btn_o.png'" src="template/frontend/image/header_login_btn.png" alt="ログイン">
                    <p>
                    <a class="forget" href="/member/forget">パスワードを忘れた方はこちら</a>
                    </p>
                </div>
            </form>
        </div>
    </div>
    <div id="header">
        <div id="headerInner">
            <div id="topNavi" class="clearfix">
                <div id="topNaviText">
                    <h1>アルバイト/バイト求人情報や募集</h1>
                    <p> </p>
                </div>
                <div id="toggleLoginBtns">
                    <ul id="logoutBtns">
                        <li id="memberBtn"><a href="#">会員登録</a></li>
                        <li id="loginBtn" onclick="header.toggleLoginWindow(); return false;"><a href="#">ログイン</a></li>
                    </ul>
                </div>
            </div>
            <div id="midArea" class="clearfix">
                <div id="logoArea">
                    <a class="logo" href="<?php echo base_url();?>">ジョブセンス</a>
                    <!-- type của ảnh dùng hàm random để cho hiển thị ngẫu nhiên 1-6 -->
                    <span class="type0<?php echo rand(0,6);?>">ジョブせんすけ</span>
                </div>
                <div class="menuArea clearfix">
                    <div class="upperArea">
                        <p class="update"><?php echo strftime("%m/%d", time());?>更新</p>
                        <p class="headerNum clearfix">
                        <!-- hien thi count work tren top -->
                        <?php if(isset($count['work'])){?>    
                            <?php while ($count['work']) { 
                                $i[] = $count['work']%10;
                                $count['work'] = floor($count['work']/10);
                                ?>
                             
                            <?php };
                            $j=12;
                            while($j--){
                            if(!isset($i[$j]))
                                continue;
                            else ?>
                            <span class = "num<?php echo $i[$j];?>"><?php echo $i[$j];?></span>    
                            <?php }} else{?>
                            <span class = "num0">0</span>
                            <span class = "num0">0</span>
                            <span class = "num0">0</span>
                            <span class = "num0">0</span>
                            <span class = "num0">0</span>
                            <span class = "num0">0</span>
                            <?php }?>
                            <span class="end">件</span>
                        </p>

                        <!-- xong hien thi count work -->
                        
                        <ul>
                            <li class="historyBtn"><a rel="nofollow" title="" href="#">最近見たバイト</a></li>
                            <li class="favorireBtn"><a rel="nofollow" title="" href="#">キープしたバイト</a></li>
                        </ul>
                    </div>
                    <div class="naviArea">
                        <ul class="clearfix">
                        <?php foreach ($area as $ka => $va) {?>
                            <li id="navi<?php echo ucfirst($va['area_name_furi']);?>">
                                <a title="
                                <?php foreach ($prefecture[$va['area_name']] as $kp => $vp) {
                                    echo $vp['name']." . ";
                                }?>
                                " href="<?php echo base_url()."area_page/".$va['area_name_furi'];?>"><?php echo $va['area_name'];?></a>
                            </li>    
                        <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="searchArea" class="clearfix">
                <ul>
                    <li class="searchNavi01"><a href="<?php echo base_url();?>guide_area">エリアから探す</a></li>
                    <li class="searchNavi02"><a href="<?php echo base_url();?>guide_line">路線から探す</a></li>
                    <li class="searchNavi03"><a href="<?php echo base_url();?>guide_job">職種から探す</a></li>
                    <li class="searchNavi04"><a href="<?php echo base_url();?>guide_feature">特徴から探す</a></li>
                </ul>
                <div class="freeword">
                    <form method="GET" action="/search/">
                    <input type="hidden" value="1" name="from_top">
                    <input id="area" type="hidden" value="kanto" name="area">
                    <input class="searchBox inputTxt" type="text" onblur="if (!this.value) this.value = 'フリーワード検索';" onfocus="if (this.value == 'フリーワード検索') this.value = '';" value="フリーワード検索" name="freeword">
                    <input class="searchBtn" type="image" onmouseout="this.src='template/frontend/image/header_search_btn.png'" onmouseover="this.src='template/frontend/image/header_search_btn.png'" alt="検索" src="template/frontend/image/header_search_btn.png">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div id="banner">
        <div id="headerBread">
            <div>
                <ul>
                    <li class="home">
                        <!-- Doan nay chen code vao de hien thi duong dan -->
                        <a href="<?php echo base_url();?>">バイトTOP</a>
                        
                    </li>
                </ul>
            </div>
        </div>
        <div id="mainVisualArea">
            <div class="inner">
                <a href="index.htm">
                    <img width="850" height="237" alt="7月限定！ 毎週火曜日は「いいバイトの日」キャンペーン　通常祝い金最大2万円+いいバイト（11810）円贈呈　今がチャンス！詳細を見る" 
                    src="template/frontend/image/banner.png"/>
                </a>
            </div>
        </div>
    </div>
    <div id="wrapper">
       
		<?php if(isset($tempplate) && !empty($tempplate)) $this->load->view($tempplate, isset($data)?$data:NULL);?>
        
        <div class="footerGoTop">
            <p><a href="#topNavi">ページトップへ戻る</a></p>
        </div>
        <div id="footerBread">
            <ul class="clearfix">
                <li class="home">バイトTOP</li>
            </ul>
        </div>
        <div class="bigBanner">
            <a href="cp/11810cp/index.htm">
                <img width= "840" src="template/frontend/image/bnr_11810cp_840x120.png" 
                alt="7月限定！毎週火曜日は「いいバイトの日」祝い金11,810（いいバイト）円贈呈"/>
            </a>
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
                                <input type="hidden" value="kanto" name="area"/>
                                <input class="searchBox inputTxt" type="text" onblur="if (!this.value) { this.value='フリーワード検索';}" onfocus="if (this.value == 'フリーワード検索') { this.value='' }" name="freeword" value="フリーワード検索"/>
                                <input class="searchBtn" type="image" src="template/frontend/image/header_search_btn.png" onmouseout="this.src='template/frontend/image/header_search_btn.png'" onmouseover="this.src='template/frontend/image/header_search_btn.png'" alt="検索"/>
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



</body>
</html>