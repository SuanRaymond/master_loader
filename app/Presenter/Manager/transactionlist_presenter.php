<?php

namespace App\Presenter\Manager;

class transactionlist_presenter{
    /**
     * 帳戶列表 HTML 組成下線代理
     * @param  object $_result 下線代理相關資料
     */
    public function combination($_result, $_buttonSwitch){
        $html       = (object) array();
        $html->body = '';
        $html->mode = '';
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

            // PP
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->points);
            //不可更改自己的點數
            if(auth()->user->memberID != $row->memberID){
                $htmlRow .= '<a href="#Mode'. $row->memberID. '_points" data-toggle="modal" class="btn mini blue pull-right">
                                <i class="icon-money"></i>
                                 '. trans('managerView.b.change'). trans('managerView.th.points'). '
                            </a>';
            }
            $htmlRow .= '</td>';

            //金蛋
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->integral);
            //不可更改自己的點數
            if(auth()->user->memberID != $row->memberID){
                $htmlRow .= '<a href="#Mode'. $row->memberID. '_integral" data-toggle="modal" class="btn mini blue pull-right">
                                <i class="icon-money"></i>
                                 '. trans('managerView.b.change'). trans('managerView.th.integral'). '
                            </a>';
            }
            $htmlRow .= '</td>';

            //紅利
            $htmlRow .= '<td style="text-align: center;">'. pFormat($row->bonus);
            //不可更改自己的點數
            if(auth()->user->memberID != $row->memberID){
                $htmlRow .= '<a href="#Mode'. $row->memberID. '_bonus" data-toggle="modal" class="btn mini blue pull-right">
                                <i class="icon-money"></i>
                                 '. trans('managerView.b.change'). trans('managerView.th.bonus'). '
                            </a>';
            }
            $htmlRow .= '</td>';

            $htmlRow .= '</tr>';

            $html->body .= $htmlRow;
            $html->mode .= $this->changePoints($row);
        }
        return $html;
    }

    /**
     * 點數更動彈出頁面
     * @param  object $_row 資料物件
     */
    public function changePoints($_row)
    {
        $htmlRow = '';
        for($x=1; $x<=3; $x++){
            switch($x){
                case 1:
                    $typeSwitch = 'points';
                    break;
                case 2:
                    $typeSwitch = 'integral';
                    break;
                case 3:
                    $typeSwitch = 'bonus';
                    break;
            }

            $htmlRow .= '<div id="Mode'. $_row->memberID. '_'. $typeSwitch. '" class="modal hide fade" tabindex="-1" data-replace="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                                <h3 align="center">'.
                                    $_row->account. ' '. trans('managerView.th.'. $typeSwitch). ' '. trans('managerView.b.change').
                                '</h3>
                            </div>
                            <div class="modal-body" style="max-height: 300px;">';
            $htmlRow .= '       <form class="form-horizontal" method="post">
                                    '. csrf_field(). '
                                    <input type="hidden" name="account" value="'. $_row->account. '">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="control-group">
                                                <label class="control-label" for="'. $typeSwitch. '">'.
                                                    trans('managerView.th.'. $typeSwitch). ' ：
                                                </label>
                                                <div class="controls">
                                                    <input type="number" class="m-wrap span12" name="'. $typeSwitch. '"
                                                           placeholder="'. trans('managerView.th.'. $typeSwitch). '" value="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="control-group">
                                                <label class="control-label" for="note">'. trans('managerView.th.note') .' ：</label>
                                                <div class="controls">
                                                    <input type="text" class="m-wrap span12" name="note"
                                                           placeholder="'. trans('managerView.th.note') .'" value="">
                                               </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="alert alert-info">'. trans('message.teansactionList.changeWarning'). '</div>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="span12 pull-right">
                                            <button type="button" data-dismiss="modal" class="btn red pull-right">
                                                <i class="icon-remove"></i> '. trans('managerView.b.cancel') .'
                                            </button>
                                            <button class="btn green pull-right" type="submit">
                                                <i class="icon-share-alt"></i> '. trans('managerView.b.send') .'
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>';
        }
        return $htmlRow;
    }
}


?>
