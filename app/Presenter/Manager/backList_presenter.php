<?php

namespace App\Presenter\Manager;

class backList_presenter{
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
            $htmlRow    .= '<td data-title="'. trans('managerView.backList.th.backID').
                           '" style="text-align: center;">'. $row->backID. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.account'). '/'. trans('managerView.th.nickName').
                           '" style="text-align: center;">'. $row->account. ' / '. $row->name. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.rebateID').
                           '" style="text-align: center;">'. $row->rebateID. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.backList.th.before').
                           '" style="text-align: center;">'. $row->before. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.after').
                           '" style="text-align: center;">'. $row->after. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.backList.th.baseOdds').
                           '" style="text-align: center;">'. $row->baseodds. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.backList.th.taskOdds').
                           '" style="text-align: center;">'. $row->taskodds. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.backList.th.back').
                           '" style="text-align: center;">'. $row->back. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.bDate').
                           '" style="text-align: center;">'. $row->bDate. '</td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.detail'). '" style="text-align: center;">
                                <a href="#ModeEdit'. $row->backID. '" data-toggle="modal" class="btn mini blue">
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
        $htmlRow .= '<div id="ModeEdit'. $row->backID. '" class="modal hide fade" tabindex="-1" data-replace="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 align="center">'. $row->account. ' / '. $row->name. ' '. trans('managerView.th.detail'). '</h3>
                        </div>
                        <div class="modal-body" style="max-height: 300px;">';
        $htmlRow .= '       <div class="alert alert-block alert-success fade in">
                                <h4 class="alert-heading">'. trans('managerView.backList.t.detailBackTitle'). '</h4>
                                    <div class="well">
                                        <h4>'. trans('managerView.backList.th.scratchID'). '</h4>
                                        '. ($row->scratchID == '' ? 'N/A' : $row->scratchID). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.backList.th.type'). '</h4>
                                        '
                                        . ($row->type == '' ? 'N/A' : trans('managerView.backList.tt.'. $row->type)). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.backList.th.result'). '</h4>
                                        '. ($row->result == '' ? 'N/A' : $row->result). '
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
