<?php
namespace App\Presenter;

class shopCar_presenter{
    /**
     * 顯示已加入購物車項目清單
     * @param object $_object 資料物件
     */
    public function detailList($_object)
    {
        $html = '';
        $_object = reSetKey($_object);
        $subTitle = '';
        $dataLength = 0;
        foreach($_object as $shopID => $row){

            if(mb_strlen($row->title) > 10){
                $subTitle = mb_substr($row->title, 0, 10). '...';
            }else{
                $subTitle = $row->title;
            }
            $html .= '
                        <div class="span12 shopCarItemBox">
                            <div class="span3" style="padding: 1px;">
                                <img src="'. $row->images. '" width="100%">
                            </div>
                            <div class="span8" style="padding: 1px;">
                                <div class="shopCarItemTitle">'. $subTitle .'</div>
                                <div class="row shopCarItemTextBox">
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productMoney').'
                                    </div>
                                    <div class="span3" id="price'.$shopID.'">
                                        '. pFormat($row->price) .'
                                        <span style="display:none;">'.$row->price.'</span>
                                    </div>
                                    <div class="span3 shopCarListTitle" style="text-align: right;">
                                        '.trans('view.shopCar.th.productFare').'
                                    </div>
                                    <div class="span3"id="transport'.$shopID.'">
                                        '. pFormat($row->transport) .'
                                        <span style="display:none;">'.$row->transport.'</span>
                                    </div>
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productPoint').'
                                    </div>
                                    <div class="span9"id="points'.$shopID.'">
                                        '. pFormat($row->points) .'
                                        <span style="display:none;">'.$row->points.'</span>
                                    </div>
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productQuantity').'
                                    </div>
                                    <div class="span9">
                                            <button type="button" class=" span3 btn btn-default" name="minus" id="minus'.$shopID.'"><span class="glyphicon glyphicon-minus"></span></button>

                                            <input type="number" class="span6 quantity" id="quantity'.$shopID.'" value="1" pattern="[0-9]">

                                            <button type="button" class="span3 btn btn-default" name="plus" id="plus'.$shopID.'"><span class="glyphicon glyphicon-plus"></span></button>

                                    </div>
                                    <!-- <div class="span3 shopCarListTitle" style="text-align: right;">
                                        '.trans('view.shopCar.th.productStyle').'
                                    </div>
                                    <div class="span3">
                                        '. $row->style .'
                                    </div> -->
                                </div>
                            </div>
                            <div class="span1" style="padding: 1px; font-size: 4.5vw;">
                                <a class="daleteShop" id="Shop'. $shopID. '">
                                    X
                                    <span style="display:none;">'. $row->title .'</span>
                                </a>
                            </div>
                        </div>
                        <span style="display:none;" class="ShopPrice'.$shopID.'" id="dataPrice'.$dataLength.'">'.$row->price.'</span>
                        <span style="display:none;" class="ShopTransport'.$shopID.'" id="dataTransport'.$dataLength.'">'.$row->transport.'</span>
                        <span style="display:none;" class="ShopPoints'.$shopID.'" id="dataPoints'.$dataLength.'">'.$row->points.'</span>';
            $dataLength += 1;
        }
        $html .= '<span style="display:none;" id="dataLength">'.$dataLength.'</span>';
        return $html;
    }
    /**
     * 顯示已結算項目清單
     * @param object $_object 資料物件
     */
    public function buydetailList($_object,$price)
    {
        $html = '';
        $_object = reSetKey($_object);
        foreach($_object as $shopID => $row){
            if(mb_strlen($row->title) > 10){
                $row->title = mb_substr($row->title, 0, 10). '...';
            }
            $html .= '
                        <div class="span12 shopCarItemBox">
                            <div class="span3" style="padding: 1px;">
                                <img src="'. $row->images. '" width="100%">
                            </div>
                            <div class="span9" style="padding: 1px;">
                                <div class="shopCarItemTitle">'. $row->title .'</div>
                                <div class="row shopCarItemTextBox">
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productMoney').'
                                    </div>
                                    <div class="span3">
                                        '. pFormat($row->price) .'
                                    </div>
                                    <div class="span3 shopCarListTitle" style="text-align: right;">
                                        '.trans('view.shopCar.th.productFare').'
                                    </div>
                                    <div class="span3">
                                        '. pFormat($row->transport) .'
                                    </div>
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productPoint').'
                                    </div>
                                    <div class="span9">
                                        '. pFormat($row->points) .'
                                    </div>
                                    <div class="span3 shopCarListTitle">
                                        '.trans('view.shopCar.th.productQuantity').'
                                    </div>
                                    <div class="span9">
                                        '.$price->$shopID.'
                                    </div>
                                    <!-- <div class="span3 shopCarListTitle" style="text-align: right;">
                                        '.trans('view.shopCar.th.productStyle').'
                                    </div>
                                    <div class="span3">
                                        '. $row->style .'
                                    </div> -->
                                </div>
                            </div>
                        </div>';
        }
        return $html;
    }
    public function priceBox($_object){
        $html           = '';
        $totalPoint     = 0;
        $totalprice     = 0;
        $totaltransport = 0;
        $totalMoney     = 0;
        foreach ($_object as $shopID => $group) {
            $totalPoint     += $group->points;
            $totalprice     += $group->price;
            $totaltransport += $group->transport;
        }
        $totalMoney = $totalprice+$totaltransport;
        $html .='
                <div class="span12 shopCarBlockTitle">
                    '.trans('view.shopCar.priceTitle').'
                </div>
                <div class="span12 shopCarPriceBox">
                    <div class="row" style="width: 100%; margin: 0px;">
                        <div class="span6" style="padding: 0px;">
                            '.trans('view.shopCar.th.productMoney').'
                        </div>
                        <div class="span6" id="totalprice">
                            '. pFormat($totalprice) .'
                        </div>
                        <div class="span6" style="padding: 0px;">
                            '.trans('view.shopCar.th.productFare').'
                        </div>
                        <div class="span6" id="totaltransport">
                            '. pFormat($totaltransport) .'
                        </div>
                    </div>
                </div>
                <div class="span12" style="padding-bottom: 10px; background-color: #FFFFFF; font-size: 4.5vw;">
                    <div class="span6" style="padding: 0px;">
                        '.trans('view.shopCar.totalMoney').'
                    </div>
                    <div class="span6" id="totalMoney">
                        '. pFormat($totalMoney) .'
                    </div>
                </div>
                <div class="span12 shopCarTotalPointBox">
                    <div class="span6" style="padding: 0px;">
                        '.trans('view.shopCar.th.productTotalPoint').'
                    </div>
                    <div class="span6" id="totalPoint">
                        '. pFormat($totalPoint) .'
                    </div>
                </div>';
        return $html;
    }
    public function NavbarBottom($_object){
        $html ='';
        $totalprice     = 0;
        $totaltransport = 0;
        $totalMoney     = 0;
        foreach ($_object as $shopID => $group) {
            $totalprice     += $group->price;
            $totaltransport += $group->transport;
        }
        $totalMoney = $totalprice+$totaltransport;
        $html .='
                <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation">
                    <a class="span3 button button-flat shopCarNavbarBottom" href="/Shop">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                    <div class="span5 shopCarNavbarBottom" style="text-align: right;">
                        '. trans('view.shopCar.totalMoney') .'：<span id="BottomMoney">'. pFormat($totalMoney) .'</span>
                    </div>
                    <a class="span4 button button-flat-caution shopCarNavbarBottom" role="button" id="Buy">
                        '. trans('view.shopCar.b.Checkout') .'
                    </a>
                </nav>';
        return $html;
    }
    public function buyNavbarBottom($_object){
        $html ='';
        $totalprice     = 0;
        $totaltransport = 0;
        $totalMoney     = 0;
        foreach ($_object as $shopID => $group) {
            $totalprice     += $group->price;
            $totaltransport += $group->transport;
        }
        $totalMoney = $totalprice+$totaltransport;
        $html .='
                <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation">
                    <a class="span3 button button-flat shopCarNavbarBottom" href="/Shop">
                        <span class="glyphicon glyphicon-home"></span>
                    </a>
                    <div class="span5 shopCarNavbarBottom" style="text-align: right;">
                        '. trans('view.shopCar.totalMoney') .'：'. pFormat($totalMoney) .'
                    </div>
                    <a class="span4 button button-flat-caution shopCarNavbarBottom" role="button" id="buysend">
                        '. trans('view.shopBuy.b.buy') .'
                    </a>
                </nav>';
        return $html;
    }

}
