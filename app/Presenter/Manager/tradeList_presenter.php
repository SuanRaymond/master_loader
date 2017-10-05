<?php

namespace App\Presenter\Manager;

class tradeList_presenter{
    /**
     * 購買清單列表 HTML 組成下線代理
     * @param  object $_result 下線代理相關資料
     */
    public function combination($_result){
        $html = '';
        $html = (object) array();
        $html->htmlRow    = '';
        $html->htmlDetail = '';
        foreach($_result as $key => $row){
            // $detail           = $gamedetail_presenter->combination($row);
            $htmlRow    =  '<tr class="tableRowP">';
            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.tradeID').
                           '" style="text-align: center;">'. $row->tradeID. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.account'). '/'. trans('managerView.th.nickName').
                           '" style="text-align: center;">'. $row->account. ' / '. $row->name. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.trader').
                           '" style="text-align: center;">'. $row->trader. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.status'). '" style="text-align: center;">';
            $htmlRow    .= trans('managerView.tradeList.ts.'. $row->status). '</span></td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.path'). '" style="text-align: center;">';
            switch($row->path){
                case '0':
                    $htmlRow .= '<span class="label label-success">';
                    break;
                case '1':
                    $htmlRow .= '<span class="label label-important">';
                    break;
            }
            $htmlRow    .= trans('managerView.tradeList.tp.'. $row->path). '</span></td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.before').
                           '" style="text-align: center;">'. $row->before. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.tradeList.th.after').
                           '" style="text-align: center;">'. $row->after. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.bDate').
                           '" style="text-align: center;">'. $row->bDate. '</td>';

            $htmlRow    .= '</tr>';
            $html->htmlRow    = $html->htmlRow . $htmlRow;
        }
        return $html;
    }
}


?>
