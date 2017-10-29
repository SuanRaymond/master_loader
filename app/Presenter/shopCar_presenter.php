<?php
namespace App\Presenter;

class shopCar_presenter{
    /**
     * 顯示已加入購物車項目清單
     * @param object $_object 資料物件
     */
    public function detailList($_object, $_notInCar=true)
    {
        $html = '';
        $_object = reSetKey($_object);
        $subTitle = '';
        $dataLength = 0;
        foreach($_object as $shopID => $row){
            if(mb_strlen($row->title) > 10){
                $subTitle = mb_substr($row->title, 0, 10). '...';
            }
            else{
                $subTitle = $row->title;
            }
            $html .= '  <div class="well">
                            <div class="media">
                                <a href="/ShopDetail?ShopID='. $row->shopID. '">
                                    <h4 class="media-heading">'. $subTitle. '</h4>
                                </a>
                                <div class="media-left" align="center" style="width: 40%;">
                                    <a href="/ShopDetail?ShopID='. $row->shopID. '">
                                        <img class="media-object" src="'. $row->images. '" width="100%">
                                    </a>
                                    '. ($_notInCar ? '
                                    <div style="width: 80%; position: relative; overflow: hidden;" id="check_'. $row->shopID. '">
                                        <img src="'. $this->check. '" width="80%">
                                        <div class="checkBlock" id="check_'. $row->shopID. '_block"></div>
                                    </div>
                                    <div style="width: 80%; position: relative; overflow: hidden; display: none;" id="uncheck_'. $row->shopID. '">
                                        <img src="'. $this->uncheck. '" width="80%">
                                        <div class="uncheckBlock" id="uncheck_'. $row->shopID. '_block"></div>
                                    </div>
                                    <input type="hidden" value="1" class="selectType" id="select_'. $row->shopID. '">' : ''). '
                                </div>
                                <div class="media-body">
                                    <div class="panel panel-success" style="font-size: 60%;">
                                        <div class="panel-heading" style="padding: 5px;">
                                            <div class="row">
                                                <div class="span5">
                                                    '. trans('view.shopCar.th.productTotalPoint'). '
                                                </div>
                                                <div class="span7">
                                                    <span id="totalPoint_'. $row->shopID. '">'. pFormat($row->points * $row->count) . '</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body" style="padding: 5px;">
                                            <div class="row">
                                                <div class="span5">
                                                    '. trans('view.shopCar.th.productMoney'). '
                                                </div>
                                                <div class="span7">
                                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                                    US.
                                                    <span id="totalPrice_'. $row->shopID. '">'. pFormat($row->price * $row->count) .'</span>
                                                </div>
                                                <div class="span5">
                                                    '. trans('view.shopCar.th.productFare'). '
                                                </div>
                                                <div class="span7" id="totalTransport">
                                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                                    US.
                                                    <span id="totalTransport_'. $row->shopID. '">'. pFormat($row->transport * $row->count). '</span>
                                                </div>

                                                <div class="span4">'. trans('view.shopCar.th.productQuantity'). '</div>
                                                <div class="span2 text-center">
                                                    '. (($_notInCar && $row->shopID != 10008 && $row->shopID != 10009) ? '<span class="glyphicon glyphicon-plus addItem WaitingBtn" aria-hidden="true"
                                                          id="addItem_'. $row->shopID. '"></span>' : ''). '
                                                </div>
                                                <div class="span2 text-center">
                                                    <span id="quantity_'. $row->shopID. '">'. $row->count. '</span>
                                                </div>
                                                <div class="span2 text-center">
                                                    '. (($_notInCar && $row->shopID != 10008 && $row->shopID != 10009) ? '<span class="glyphicon glyphicon-minus mnsItem WaitingBtn" aria-hidden="true"
                                                          id="mnsItem_'. $row->shopID. '"></span>' : ''). '
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-footer" style="padding: 5px;">
                                            <div class="row">
                                                <div class="span5">
                                                    '. trans('view.shopCar.totalMoney'). '
                                                </div>
                                                <div class="span7" id="totalMoney">
                                                    <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
                                                    US.
                                                    <span id="totalMoney_'. $row->shopID. '">
                                                        '.pFormat(($row->price * $row->count) + ($row->transport * $row->count)). '
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    '. ($_notInCar ? '
                                    <div class="btn-group btn-group-justified" role="group">
                                        <div class="btn-group btn-group-xs" role="group">
                                            <button type="button" class="btn btn-info uncheckBtn" id="uncheckBtn_'. $row->shopID. '">
                                                '. trans('view.shopCar.b.uncheck'). '
                                            </button>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group" style="display: none;">
                                            <button type="button" class="btn btn-info checkBtn" id="checkBtn_'. $row->shopID. '">
                                                '. trans('view.shopCar.b.check'). '
                                            </button>
                                        </div>
                                        <div class="btn-group btn-group-xs" role="group">
                                            <button type="button" class="btn btn-danger deleteBtn WaitingBtn" id="deleteBtn_'. $row->shopID. '">
                                                '. trans('view.shopCar.b.delete'). '
                                            </button>
                                        </div>
                                    </div>' : ''). '
                                </div>
                            </div>
                        </div>';
            $dataLength += 1;
        }
        // $html .= '<span style="display:none;" id="dataLength">'.$dataLength.'</span>';
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

    public $check = 'data:image/png;base64,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';

    public $uncheck = 'data:image/png;base64,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';
}
