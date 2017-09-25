<?php

namespace App\Presenter\Manager;

class shopOrderList_presenter{
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
            $htmlRow    .= '<td data-title="'. trans('managerView.shopOrderList.th.shoporderID').
                           '" style="text-align: center;">'. $row->shoporderID. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.account'). '/'. trans('managerView.th.nickName').
                           '" style="text-align: center;">'. $row->account. ' / '. $row->name. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.shopOrderList.th.price').
                           '" style="text-align: center;">'. $row->price. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.th.points').
                           '" style="text-align: center;">'. $row->points. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.shopOrderList.th.transport').
                           '" style="text-align: center;">'. $row->transport. '</td>';
            $htmlRow    .= '<td data-title="'. trans('managerView.shopOrderList.th.quantity').
                           '" style="text-align: center;">'. $row->quantity. '</td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.status'). '" style="text-align: center;">';
            switch($row->status){
                case '0':
                    $htmlRow .= '<span class="label label-info">';
                    break;
                case '1':
                    $htmlRow .= '<span class="label label-warning">';
                    break;
                case '2':
                    $htmlRow .= '<span class="label label-success">';
                    break;
                case '3':
                    $htmlRow .= '<span class="label label-inverse">';
                    break;

                case '10':
                    $htmlRow .= '<span class="label label-important">';
                    break;
            }
            $htmlRow    .= trans('managerView.shopOrderList.tr.'. $row->status). '</span></td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.bDate').
                           '" style="text-align: center;">'. $row->bDate. '</td>';

            $htmlRow    .= '<td data-title="'. trans('managerView.th.detail'). '" style="text-align: center;">
                                <a href="#ModeEdit'. $row->shoporderID. '" data-toggle="modal" class="btn mini blue">
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
        $htmlRow .= '<div id="ModeEdit'. $row->shoporderID. '" class="modal hide fade" tabindex="-1" data-replace="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 align="center">'. $row->account. ' / '. $row->name. ' '. trans('managerView.th.detail'). '</h3>
                        </div>
                        <div class="modal-body" style="max-height: 300px;">';
        $htmlRow .= '       <div class="alert alert-block alert-info fade in">
                                <h4 class="alert-heading">'. trans('managerView.shopOrderList.t.detailMemberTitle'). '</h4>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.phone'). '</h4>
                                        '. ($row->phone == '' ? 'N/A' : $row->phone). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.address'). '</h4>
                                        '. ($row->address == '' ? 'N/A' : $row->address). '
                                    </div>
                            </div>';

        $htmlRow .= '       <div class="alert alert-block alert-success fade in">
                                <h4 class="alert-heading">'. trans('managerView.shopOrderList.t.detailShopTitle'). '</h4>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.memo'). '</h4>
                                        '. ($row->memo == '' ? 'N/A' : $row->memo). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cusername1'). '</h4>
                                        '. ($row->cusername1 == '' ? 'N/A' : $row->cusername1). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cDate1'). '</h4>
                                        '. ($row->cDate1 == '' ? 'N/A' : $row->cDate1). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cusername2'). '</h4>
                                        '. ($row->cusername2 == '' ? 'N/A' : $row->cusername2). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cDate2'). '</h4>
                                        '. ($row->cDate2 == '' ? 'N/A' : $row->cDate2). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cusername3'). '</h4>
                                        '. ($row->cusername3 == '' ? 'N/A' : $row->cusername3). '
                                    </div>
                                    <div class="well">
                                        <h4>'. trans('managerView.shopOrderList.th.cDate3'). '</h4>
                                        '. ($row->cDate3=='' ? 'N/A' : $row->cDate3). '
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
