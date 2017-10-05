<?php

namespace App\Presenter\Manager;

class transactionlist_presenter{
    /**
     * 帳戶列表 HTML 組成下線代理
     * @param  object $_result 下線代理相關資料
     */
    public function combination($_result, $_buttonSwitch){
        $html = '';
        foreach($_result as $key => $row){
            $htmlRow = '<tr class="tableRowP">';
            $htmlRow .= '<td style="text-align: center;">';
            if(!$_buttonSwitch){
                $htmlRow .= '<button type="button" class="btn btn-block mini disabled">'.
                            $row->account. ' / '. $row->nickname. '<i class="icon-flag pull-right"></i>';
            }
            else{
                $htmlRow .= '<button type="button" class="btn btn-block black mini accountBtn" value="'. $row->account. '">'.
                            $row->account. ' / '. $row->nickname. '<i class="icon-share-alt pull-right"></i>';
            }

            $htmlRow .= '</button></td>';
            $htmlRow .= '<td style="text-align: center;">'. trans('group.'. $row->groupID). '</td>';
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->points). '</td>';
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->integral). '</td>';
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->bonus). '</td>';

            $htmlRow .= '</tr>';

            $html .= $htmlRow;
        }
        return $html;
    }
}


?>
