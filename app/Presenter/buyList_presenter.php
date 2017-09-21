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
            // dd($row->bDate);
            $html .= '
            <tbody style="border-top: 10px solid #f0f0f0; font-size: 4.5vw;">
                <tr>
                    <tr>
                        <td colspan="3" style="font-size: 6vw;">
                            <strong>'.$row->title.'</strong>
                        </td>
                    </tr>
                    <tr>
                        <td style="text-align: right; width: 30%;" rowspan="3">
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
                            $'.pFormat($row->price).'
                        </td>
                        <td>
                            PP '.pFormat($row->points).'
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
