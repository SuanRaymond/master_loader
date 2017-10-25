@extends('layout.layout')

@section('cssImport')
<link type="text/css" rel="stylesheet" href="./lib/css/slick.css"/>
<link type="text/css" rel="stylesheet" href="./lib/css/slick-theme.css"/>
<link type="text/css" rel="stylesheet" href="./css/index/home.css"/>

@stop

@section('jsImport')
    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/index/home.js"></script>
@stop

@section('content')
    <div id="first">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <!-- <img src="images/banner1.jpg"/> -->
                <div id="Banner">
                    <img src="images/banner2.jpg"/>
                    <img src="images/banner3.jpg"/>
                    <img src="images/banner4.jpg"/>
                </div>
            </div>
        </div>

        <div id="doSomethingBlockBody" align="center" class="row IconBody">
            <div class="animated bounceInUp IconItem span6" id="turnText">
                <a>
                    <img src="./images/text.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickText') }}</div>
                </a>
            </div>
            <div class="animated bounceInLeft IconItem span6">
                <a href="/Task">
                    <img src="./images/Gift.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickTask') }}</div>
                </a>
            </div>
            <div class="animated bounceInRight IconItem span6">
                <a href="/Shop">
                    <img src="./images/shop.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickShop') }}</div>
                </a>
            </div>
            <div class="animated bounceInDown IconItem span6">
                <a href="/Game">
                    <img src="./images/game.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickGame') }}</div>
                </a>
            </div>
        </div>
        <div id="doSomethingBlockBodyStory" align="center" class="row IconBody">
            <div class="animated bounceInUp IconItem span6" id="openSecond">
                <a>
                    <img src="./images/comment.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickResume') }}</div>
                </a>
            </div>
            <div class="animated bounceInLeft IconItem span6" id="openThird">
                <a>
                    <img src="./images/story.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickStory') }}</div>
                </a>
            </div>
            <div class="animated bounceInRight IconItem span6" id="turnBack">
                <a>
                    <img src="./images/back.png" width="100%">
                    <div class="IconItemText" align="center">{{ trans('view.home.b.quickBack') }}</div>
                </a>
            </div>
        </div>
    </div>
    <div id="second" class="animated bounceInRight" style="overflow-y: scroll; height: 90vh;">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <img src="images/Welcome.jpg"/>
            </div>
        </div>
        <div align="center" class="row" style="margin: 0 auto; padding: 20px; font-size: 145%;">
            <h3 class="text-justify">
                <blockquote class="text-center">
                    <p>
                        <strong style="font-size: 160%;">
                            或许你从不关心时事<br>
                            但你总该给你孩子一些什么...
                        </strong>
                    </p>
                </blockquote>
            </h3>
            <p class="text-justify">
                <strong>POWER RUN</strong>是国际知名节能科技的领导品牌，
                我们跨足了
            </p>
            <ul align="left">
                <li>【节能系统】</li>
                <li>【AI智能家庭】</li>
                <li>【极限运动器材】</li>
            </ul>
            <p class="text-justify">
                设计与生产，全球有26个分公司，
                于2015年我们于美国正式成立了【游戏电商程序开发群】，
                全美加亚洲有1000多位软件开发工程师。
            </p>
            <span style="color: blue;text-decoration: underline;">回上页</span>
        </div>
    </div>
    <div id="third" class="animated bounceInLeft" style="overflow-y: scroll; height: 90vh;">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <img src="images/Welcome.jpg"/>
            </div>
        </div>
        <div id="doSomethingBlockBody" align="center" class="row" style="margin: 0 auto; padding: 20px; font-size: 145%;">
            <h3 style="font-size: 160%;">FUNMUGLE 品牌的由来</h3>
            <blockquote class="text-center">
                <p>
                    <strong style="font-size: 150%;">
                        打造一个华人音乐创作平台<br>
                        为大中华国学文化尽份心力
                    </strong>
                </p>
            </blockquote>
            <p class="text-justify">
                <u>FunMugle（中文:开心的音乐谷歌）</u>，来自于音乐人的启蒙，
                为让音乐创作更多元化，让更多人参与音乐创作，
                也真正让音乐原创者能有合理的报酬，不断有新的创作作品，
                我们运用分享经济的概念，让原创音乐人因曝光而得到相对应的报酬，所以成立了<br>
                 —— <strong>【FUNMUGLE】</strong>
            </p>
            <p class="text-justify">
                <strong>FunMugle</strong>是个大时代的教育平台，有音乐养成教育、音乐的基础训练、幼儿音乐教育、幼儿国学教育、中华国学教育系统...
                我们深刻了解，一个国家的强大要来自于文化与人民素质的提升，大中华博大精深的文化素养正式是中国强大的动力。
                音乐与人文教育(国学系统)，是<strong>FunMugle</strong>平台要呈现的，透过<u>【分享经济】</u>
                的基础，我们将华人音乐的美及中华国学经典故事教育传承到全球，
                只要所有好友们动一下【手指】、我们一起把<u>『中华的爱、爱中华』</u>
                分享到世界各地，我们会给你一分回馈的献礼，也欢迎你将献礼赠送给贫困及弱势家庭。
            </p>
            <h4 style="font-size: 150%;">一起为中华承担责任  分享爱</h4>
            <span style="color: blue;text-decoration: underline;">回上页</span>
        </div>
    </div>
@stop

@section('contentBottom')

@stop
