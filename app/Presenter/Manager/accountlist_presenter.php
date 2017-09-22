<?php

namespace App\Presenter\Manager;

class accountlist_presenter{
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
            $htmlRow .= '<td style="text-align: center;">'. $row->loginDate. '</td>';
            $htmlRow .= '<td style="text-align: center;" id="Useinfo_'. $row->account. '">';
            if($row->useinfo == 1){
                $htmlRow .= '<a class="btn mini green editUseinfo"><i class="icon-ok"></i>'. trans('managerView.b.enabled'). '</a>';
            }
            else{
                $htmlRow .= '<a class="btn mini red editUseinfo"><i class="icon-remove"></i>'. trans('managerView.b.disabled'). '</a>';
            }
            $htmlRow .= '</td>';

            $htmlRow .= '<td style="text-align: center;">
                            <a href="#ModeA'. $row->memberID. '" data-toggle="modal" class="btn mini green">
                                <i class="icon-eye-open"></i> '. trans('managerView.b.view'). '</a>
                        </td>';

            $htmlRow .= '<td style="text-align: center;">
                            <a href="#ModeAccountListEdit" id="'. $row->account. '" data-toggle="modal" class="btn mini blue editOpenBtn">
                                <span class="nickname hide">'. $row->nickname. '</span>
                                <span class="languageID hide">'. $row->languageID. '</span>
                                <i class="icon-pencil"></i> '. trans('managerView.b.edit'). '</a>
                        </td>';
            //登入資訊
            $htmlRow .= $this->getLoginInfo($row, 'A');

            $htmlRow .= '</tr>';

            $html .= $htmlRow;
        }
        return $html;
    }

    /**
     * 修改帳戶資訊 HTML
     * @param  collect $_result 資料(帳戶相關資料, 語系相關資料)
     */
    public function editAccount($_result){
        $html                 = (object) array();
        $html->group          = '<fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="group">'. trans('view.c.groupID'). '：</label>
                                        <div class="controls">
                                            <span class="uneditable-input span13" uneditable-input" id="edit_group"></span>
                                </div></div></fieldset>';

        $html->upAdminAccount = '<fieldset>
                                    <div class="control-group">
                                        <label class="control-label" for="upAdminAccount">'. trans('view.accountList.th.upAdminAccount'). '：</label>
                                        <div class="controls">
                                            <span class="uneditable-input span13" uneditable-input" id="edit_upAdminAccount"></span>
                                </div></div></fieldset>';

        $html->language       = '<fieldset><div class="control-group">
                                    <label class="control-label" for="languageID">'. trans('view.c.languageID'). '：</label>
                                    <div class="controls">
                                        <select class="span11" name="languageID" id="languageID">';
        foreach ($_result->languageList as $key => $languageID) {
            $html->language  .= '<option value="'. $languageID. '">'.
                                    trans('language.'. $languageID).'</option>';
        }
        $html->language      .= '</select>
                                    <button class="btn btn-info pull-right edit_languageID" type="button">
                                        <i class="icon-ok-sign icon-white"></i>'. trans('view.accountList.b.confirm'). '
                                    </button>
                                </div></div></fieldset>';

        $html->currency       = '<fieldset><div class="control-group">
                                    <label class="control-label" for="currencyID">'. trans('view.c.currencyID') .'：</label>
                                    <div class="controls">
                                        <span class="uneditable-input span13" uneditable-input" id="edit_currency"></span>
                                </div></div></fieldset>';

        $html->account        = '<fieldset><div class="control-group">
                                    <label class="control-label" for="account">'. trans('view.th.account'). '：</label>
                                    <div class="controls">
                                        <span class="uneditable-input span13" uneditable-input" id="edit_account"></span>
                                </div></div></fieldset>';

        $html->nickname       = '<fieldset><div class="control-group">
                                    <label class="control-label" for="nickname">'. trans('view.c.nickname'). '：</label>
                                    <div class="controls">
                                        <input class="span11" id="edit_nickname" type="text">
                                        <button class="btn btn-info pull-right edit_nickname" type="button">
                                            <i class="icon-ok-sign icon-white"></i>'. trans('view.accountList.b.confirm'). '
                                        </button>
                                    </div>
                                    <div class="input-group text-error text-center">'. trans('view.accountList.msg.nickname_seting'). '</div>
                                </div></fieldset>';

        $html->password       = '<fieldset>
                                    <div class="flip" style="height:50px;font-size:18px;text-align:center;background-color:rgb(184, 227, 235);">'. trans('view.accountList.th.modify'). trans('view.th.password'). '</div>
                                    <div class="control-group">
                                        <div class="panel" style="display: none;background-color:rgb(184, 227, 235);">
                                            <label class="control-label" for="focusedInput">'. trans('view.accountAdd.c.password'). '：</label>
                                            <div class="controls">
                                                <input class="span11" id="edit_password" type="password">
                                            </div><br>
                                            <label class="control-label" for="focusedInput">'. trans('view.accountAdd.c.passwordCheck'). '：</label>
                                            <div class="controls">
                                                <input class="span11" id="edit_passwordCheck" type="password" value="">
                                                <button class="btn btn-info pull-right edit_password" type="button">
                                                    <i class="icon-ok-sign icon-white"></i>'. trans('view.accountList.b.confirm'). '
                                                </button>
                                            </div>
                                            <div class="input-group text-error text-center">'. trans('view.accountList.msg.password_seting'). '
                                    </div></div></div></fieldset>';

        $html->commission     = '<fieldset><div class="control-group">
                                    <label class="control-label" for="commission">'. trans('view.c.commission'). '：</label>
                                    <div class="controls">
                                        <input class="span11" id="edit_commission" type="text" value="">';
        //是否開啟分紅修改
        if($_result->commission->Switch){
            $html->commission.= '<button class="btn btn-info edit_commission" type="button">
                                    <i class="icon-ok-sign icon-white"></i>'. trans('view.accountList.b.confirm'). '
                                </button>';
        }
        else{
            $html->commission.= '</div>
                                    <div class="input-group text-error text-center">'.
                                        trans('view.accountList.msg.commission_seting',
                                            ['week' => $_result->commission->Week,
                                            'sdate' => $_result->commission->SDate,
                                            'edate' => $_result->commission->EDate]). '
                                    </div></div></fieldset>';
        }

        $html->useinfo        = '<fieldset><div class="control-group">
                                    <input type="hidden" id="useinfoVal" value="">
                                    <div class="alert alert-success" id="useinfo_alert">'. trans('view.c.useinfo'). '：
                                            <form>'. csrf_field(). '
                                                <button class="btn btn-success btn-mini pull-right useinfoChange" type="button"></button>
                                            </form>
                                </div></div></fieldset>';

        $html->back           = '<fieldset><div class="control-group">
                                    <button type="button" class="btn btn-primary pull-right Return_list">
                                        <i class="icon-share-alt icon-white"></i>'. trans('view.accountList.c.back'). '
                                    </button>
                                </div></fieldset>';
        return $html;
    }

    /**
     * 組合最近登入資訊
     * @param  object $_row 登入資訊物件
     */
    public function getLoginInfo($_row, $_mode)
    {
        //組合地區
        $position = json_decode($_row->position);
        if($position){
            if($position->status == 'SU'){
                $position = (trans('position.CY.'. $position->CY) == 'position.CY.'. $position->CY ? $position->CY : trans('position.CY.'. $position->CY)). ' - '. $position->CT;
            }
            else{
                $position = '';
            }
        }
        else{
            $position = '';
        }

        //裝置
        if(empty($_row->equipmentID)){
            $_row->equipmentID = '999';
        }

        $htmlRow = '<div id="Mode'. $_mode. $_row->memberID. '" class="modal hide fade" tabindex="-1" data-replace="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                            <h3 align="center">'. $_row->account. ' '. trans('managerView.th.detail'). '</h3>
                        </div>
                        <div class="modal-body" style="max-height: 300px;">';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.accountList.th.ip'). '</h4>
                                '. $_row->ip. '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.accountList.th.position'). '</h4>
                                '. $position. '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.accountList.th.equipment'). '</h4>
                                '. trans('equipment.browser.'. $_row->equipmentID). '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.accountList.th.cuser'). '</h4>
                                '. $_row->cuser. '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.th.cDate'). '</h4>
                                '. $_row->cDate. '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.accountList.th.buser'). '</h4>
                                '. $_row->buser. '
                            </div>';
        $htmlRow .=         '<div class="well">
                                <h4>'. trans('managerView.th.bDate'). '</h4>
                                '. $_row->bDate. '
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
