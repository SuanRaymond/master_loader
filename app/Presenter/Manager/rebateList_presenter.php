<?php

namespace App\Presenter\Manager;

class rebateList_presenter{
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
            $htmlRow    .= '<td data-title="'. trans('managerView.rebateList.th.rebateID').
                           '" style="text-align: center;">'. $row->rebateID. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.account'). '/'. trans('managerView.th.nickName').
                           '" style="text-align: center;">'. $row->account. ' / '. $row->name. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.points').
                           '" style="text-align: center;">'. $row->points. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.rebateList.th.moneyBack').
                           '" style="text-align: center;">'. $row->moneyback. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.rebateList.th.back').
                           '" style="text-align: center;">'. $row->back. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.rebateList.th.baseOdds').
                           '" style="text-align: center;">'. $row->baseodds. '</td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.status'). '" style="text-align: center;">';
            switch($row->status){
                case '0':
                    $htmlRow .= '<span class="label label-important">';
                    break;
                case '1':
                    $htmlRow .= '<span class="label label-success">';
                    break;
            }
            $htmlRow    .= trans('managerView.rebateList.tr.'. $row->status). '</span></td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.bDate').
                           '" style="text-align: center;">'. $row->bDate. '</td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.detail'). '" style="text-align: center;">
                                <a href="#ModeEdit'. $row->rebateID. '" data-toggle="modal" class="btn mini blue">
                                <i class="icon-eye-open"></i> '. trans('managerView.b.view'). '</a>
                            </td>';

            $htmlRow    .= '</tr>';
            $html->htmlRow    = $html->htmlRow . $htmlRow;
            $html->htmlDetail = $html->htmlDetail. $this->detail($row);
        }
        return $html;
    }

    public function detail($row)
    {
        $htmlRow  = '';
        $htmlRow .= '<div id="ModeEdit'. $row->rebateID. '" class="modal hide fade" tabindex="-1" data-replace="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 align="center">'. $row->account. ' / '. $row->name. ' '. trans('managerView.th.detail'). '</h3>
                        </div>
                        <div class="modal-body" style="max-height: 300px;">';
        $htmlRow .= '       <div class="alert alert-block alert-success fade in">
                                <h4 class="alert-heading">'. trans('managerView.rebateList.t.detailRebateTitle'). '</h4>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.checkinCount'). '</h4>
                                        '. ($row->checkincount == '' ? 'N/A' : $row->checkincount). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.lowerCount'). '</h4>
                                        '. ($row->lowercount == '' ? 'N/A' : $row->lowercount). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.payCountType1'). '</h4>
                                        '. ($row->paycounttype1 == '' ? 'N/A' : $row->paycounttype1). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.payCountType2'). '</h4>
                                        '. ($row->paycounttype2 == '' ? 'N/A' : $row->paycounttype2). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.payCountType3'). '</h4>
                                        '. ($row->paycounttype3 == '' ? 'N/A' : $row->paycounttype3). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.rebateList.th.payCountType4'). '</h4>
                                        '. ($row->paycounttype4 == '' ? 'N/A' : $row->paycounttype4). '
                                    </div>
                            </div>';

        $htmlRow .=     '</div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn">'. trans('managerView.b.close'). '</button>
                        </div>
                    </div>';
        return $htmlRow;
    }

}


?>
