@extends('shop.layout.layout')

@section('cssImport')

    <link type="text/css" href="./lib/css/slick.css" rel="stylesheet"/>
    <link type="text/css" href="./lib/css/slick-theme.css" rel="stylesheet"/>
    <link type="text/css" href="./css/shop/home.css" rel="stylesheet"/>
    <link type="text/css" href="./css/shop/homeStyle.css" rel="stylesheet"/>

@stop

@section('jsImport')

    <script type="text/javascript" src="./lib/js/slick.js"></script>
    <script type="text/javascript" src="./js/shop/home.js"></script>

@stop

@section('content')
  <!-- 廣告橫幅-->
    <div id="slideshow-sec" style="margin-top: 60px;">
        <div id="carousel-div" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="item active">
                    <a href="/detail">
                      <img src="images/shop/ad1.jpg" width="100%" alt="" >
                    </a>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <a href="/detail">
                      <img src="images/shop/ad2.jpg" width="100%" alt="" >
                    </a>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <a href="/detail">
                      <img src="images/shop/ad3.jpg" width="100%" alt="" >
                    </a>
                    <div class="carousel-caption">
                    </div>
                </div>
                <div class="item">
                    <a href="/detail">
                      <img src="images/shop/ad4.jpg" width="100%" alt="" >
                    </a>
                    <div class="carousel-caption">
                    </div>
                </div>
            </div>
            <!--INDICATORS-->
            <ol class="carousel-indicators">
                <li data-target="#carousel-div" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-div" data-slide-to="1"></li>
                <li data-target="#carousel-div" data-slide-to="2"></li>
                <li data-target="#carousel-div" data-slide-to="3"></li>
            </ol>
            <!--PREVIUS-NEXT BUTTONS-->
            <a class="left carousel-control" href="#carousel-div" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
            <a class="right carousel-control" href="#carousel-div" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
        </div>
    </div>
 <!-- 萬元專區 -->
    <div class="popular-search-div"  style="margin-top: 20px;">
      <div class="see-more">查看更多</div>
      <div class="popular">萬元專區</div>
    </div>

   <div class="popular-search">
    <a href="/detail">
      <img src="images/shop/pi.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi1.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi2.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi3.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi4.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi5.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi6.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi7.png" width="100%" alt="" >
    </a>
  </div>

   <!-- 千元專區 -->
    <div class="popular-items-div">
      <div class="see-more">查看更多</div>
      <div class="popular">千元專區</div>
    </div>

   <div class="popular-items">
    <a href="/detail">
      <img src="images/shop/1.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/2.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/3.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/4.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/5.jpg" width="100%" alt="" >
    </a>
  </div>
   <!-- 百元專區 -->
    <div class="popular-search-div">
      <div class="see-more">查看更多</div>
      <div class="popular">百元專區</div>
    </div>

   <div class="popular-search">
    <a href="/detail">
      <img src="images/shop/pi.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi1.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi2.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi3.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi4.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi5.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi6.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi7.png" width="100%" alt="" >
    </a>
  </div>
   <!-- 保健品專區 -->
    <div class="popular-items-div">
      <div class="see-more">查看更多</div>
      <div class="popular">保健品專區</div>
    </div>

   <div class="element" style=" width:100vw; height:10vh; overflow: auto;">
   <div style="width: 150vw; height: 100%;">
      <a href="/detail">
        <img src="images/shop/1.jpg" height="100%" alt="" >
      </a>
      <a href="/detail">
        <img src="images/shop/2.jpg" height="100%" alt="" >
      </a>
      <a href="/detail">
        <img src="images/shop/3.jpg" height="100%" alt="" >
      </a>
      <a href="/detail">
        <img src="images/shop/4.jpg" height="100%" alt="" >
      </a>
      <a href="/detail">
        <img src="images/shop/5.jpg" height="100%" alt="" >
      </a>
   </div>
  </div>
   <!-- 熱門商品 -->
    <div class="popular-search-div">
      <div class="see-more">查看更多</div>
      <div class="popular">熱門商品</div>
    </div>

   <div class="popular-search">
    <a href="/detail">
      <img src="images/shop/pi.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi1.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi2.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi3.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi4.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi5.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi6.png" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/pi7.png" width="100%" alt="" >
    </a>
  </div>
   <!-- 其他 -->
    <div class="popular-items-div">
      <div class="see-more">查看更多</div>
      <div class="popular">其他</div>
    </div>

   <div class="popular-items">
    <a href="/detail">
      <img src="images/shop/1.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/2.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/3.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/4.jpg" width="100%" alt="" >
    </a>    <a href="/detail">
      <img src="images/shop/5.jpg" width="100%" alt="" >
    </a>
  </div>

 <div class="content">
  <div class="container">
    <div class="content-top">
      <h1>商品特賣</h1>
      <div class="content-top1">
        <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi.png" alt="">
            </a>
            <h3><a href="/detail">Tops</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>
          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi2.png" alt="">
            </a>
            <h3><a href="/detail">T-Shirt</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi4.png" alt="">
            </a>
            <h3><a href="/detail">Shirt</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi1.png" alt="">
            </a>
            <h3><a href="/detail">Tops</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="clearfix"> </div>
      </div>
      <div class="content-top1">
        <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi3.png" alt="">
            </a>
            <h3><a href="/detail">Shirt</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi5.png" alt="">
            </a>
            <h3><a href="/detail">T-Shirt</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi6.png" alt="">
            </a>
            <h3><a href="/detail">Jeans</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="col-md-3 col-md2">
          <div class="col-md1 simpleCart_shelfItem">
            <a href="/detail">
              <img class="img-responsive" src="images/shop/pi7.png" alt="">
            </a>
            <h3><a href="/detail">Tops</a></h3>
            <div class="price">
                <h5 class="item_price">$300</h5>
                <a href="#" class="item_add">Add To Cart</a>
                <div class="clearfix"> </div>
            </div>

          </div>
        </div>
      <div class="clearfix"> </div>
      </div>
    </div>
  </div>
</div>
@stop