<?php
namespace App\Presenter;

class buylist_presenter{
    /**
     * 購買清單
     * @param object $_object 資料物件
     */
    public function buyList($_object)
    {
        //輸出物件
        $html = '';

        foreach($_object as $row){
            // dd($row);
            $html .= '
            <tbody style="border-top: 10px solid #f0f0f0; font-size: 3.5vw;" class="List List'.$row->status.'">
                <tr>
                    <tr>
                        <td colspan="3" style="font-size: 6vw;">
                            <input class="Check'.$row->status.'" style="display: none;" type="checkbox" name="check" value="'.$row->totalprice.'"  id="'.$row->shoporderID.'">
                            <strong>'.$row->title.'</strong>
                            <span class="Btn'.$row->status.'" style="float: right; display: none;">
                                <a class="button button-flat-primary singlePay" id="'.$row->shoporderID.'" style="padding-left: 10px;padding-right: 10px;">付款</a>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; width: 30%; text-align: center;vertical-align: middle;" rowspan="4">
                            <div class="span12" style="padding: 0;">
                                <img src="'.$row->images.'" width="100%" alt="">
                            </div>
                        </td>
                        <td style="width: 30%;">
                            '.trans('view.BuyList.th.shoporderID').$row->shoporderID.'
                        </td>
                        <td  class="statuscolor'.$row->status.'">
                            <strong>'. trans('view.BuyList.th.status'.$row->status) .'</strong>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            '.trans('view.BuyList.th.price').pFormat($row->price).'
                        </td>
                        <td>
                            '.trans('view.BuyList.th.quantity').pFormat($row->quantity).'
                        </td>
                    </tr>
                    <tr>
                        <td>
                            '.trans('view.BuyList.th.totalprice').pFormat($row->totalprice).'
                        </td>
                        <td>
                            '.trans('view.BuyList.th.totalpoints').pFormat($row->totalpoints).'
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            '. trans('view.BuyList.th.bDate').date("Y-m-d",strtotime($row->bDate)) .'
                        </td>
                    </tr>
                </tr>
            </tbody>';
        }

        return $html;
    }
}
