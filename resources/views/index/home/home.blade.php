@extends('layout.layout')

@section('cssImport')
    <style type="text/css" media="screen">
        body{
            overflow-y: hidden;
        }
    </style>
@stop

@section('jsImport')
@stop

@section('content')
    <div id="first">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <img src="images/banner1.jpg"/>
            </div>
        </div>

        <div id="doSomethingBlockBody" align="center" class="row">
            <div class="animated bounceInUp span6" id="openSecond">
                <a>
                    <img src="./images/resume.png" width="100%">
                    <div align="center">{{ trans('view.home.b.quickresume') }}</div>
                </a>
            </div>
            <div class="animated bounceInLeft span6" id="openThird">
                <a>
                    <img src="./images/story.png" width="100%">
                    <div align="center">{{ trans('view.home.b.quickstory') }}</div>
                </a>
            </div>
            <div class="animated bounceInRight span6">
                <a href="/Task">
                    <img src="./images/Gift.png" width="100%">
                    <div align="center">{{ trans('view.home.b.quickTask') }}</div>
                </a>
            </div>
            <div class="animated bounceInDown span6">
                <a href="/Shop">
                    <img src="./images/shop.png" width="100%">
                    <div align="center">{{ trans('view.home.b.quickShop') }}</div>
                </a>
            </div>
        </div>
    </div>
    <div id="second" class="animated bounceInRight" style="height: 90vh;">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <img src="images/Welcome.jpg"/>
            </div>
        </div>
        <div id="doSomethingBlockBody" align="center" class="row">
            <p style="font-size: 4.5vw;">
                或许你从不关心时事<br>
                但你总该给你孩子一些什么……..<br>
                <br>
                POWER RUN是国际知名节能科技的领导品牌，
                我们跨足了【节能系统】【AI智能家庭】
                【极限运动器材】 设计与生产，全球有26个分公司，
                于2015年我们于美国正式成立了【游戏电商程序开发群】，
                全美加亚洲有1000多位软件开发工程师。
            </p>
            <br>
            <span style="color: blue;text-decoration: underline; font-size: 16pt;">回上页</span>
        </div>
    </div>
    <div id="third" class="animated bounceInLeft" style="overflow-y: scroll; height: 90vh;">
        <div class="animated bounceInDown" id="doSomethingBlockBanner">
            <div id="doSomethingBlockBannerBody">
                <img src="images/Welcome.jpg"/>
            </div>
        </div>
        <div id="doSomethingBlockBody" align="center" class="row" style="margin: 0 auto;">
            <p style="font-size: 4.5vw;">
                <span style="font-size: 6vw;">FUNMUGLE 品牌的由来</span><br>
                <br>
                打造一个华人音乐创作平台<br>
                为大中华国学文化尽份心力<br>
                <br>
                FunMugle(中文:开心的音乐谷歌)，来自于音乐人的启蒙，
                为让音乐创作更多元化，让更多人参与音乐创作，
                也真正让音乐原创者能有合理的报酬，不断有新的创作作品，
                我们运用分享经济的概念，让原创音乐人因曝光而得到相对应的报酬，所以成立了【FUNMUGLE】
                <br>
                FunMugle是个大时代的教育平台，有音乐养成教育、音乐的基础训练、幼儿音乐教育、幼儿国学教育、中华国学教育系统……<br>
                我们深刻了解，一个国家的强大要来自于文化与人民素质的提升，大中华博大精深的文化素养正式是中国强大的动力。<br>
                音乐与人文教育(国学系统)，是FunMugle平台要呈现的，透过【分享经济】
                的基础，我们将华人音乐的美及中华国学经典故事教育传承到全球，
                只要所有好友们动一下【手指】、我们一起把『中华的爱、爱中华』
                分享到世界各地，我们会给你一分回馈的献礼，也欢迎你将献礼赠送给贫困及弱势家庭。
                <br>
                  一起为中华承担责任  分享爱
            </p>
            <br>
            <span style="color: blue;text-decoration: underline; font-size: 16pt;">回上页</span>
        </div>
    </div>
@stop

@section('contentBottom')

@stop
