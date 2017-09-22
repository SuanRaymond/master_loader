<?php
namespace App\Presenter\Manager;

class ctrl_presenter{

	/**
	 * 取得控制項
	 * @param  string 	$_account 代理帳號
	 * @param  aray 	$_mode    取得項目
	 */
	public function combination($_data, $_mode, $_default)
	{
		$outData = (object) array();
		foreach($_mode as $key => $mode){
            switch ($mode) {
                //new
                case 'ROW':
					$outData->row = '<input id="row" name="row" type="hidden" value="'. $_default->row. '">';
                    break;
                //new
                case 'A':
                    $outData->account =    '<div class="span6">
                                                    <div class="control-group">
                                                        <label class="control-label" for="account">'. trans('managerView.c.account') .' ：</label>
                                                        <div class="controls">
                                                            <input type="text" class="m-wrap span10" name="account" id="account"
                                                                placeholder="'. trans('managerView.c.account'). '" value="'. $_default->account .'">
                                                            <label class="checkbox">
                                                                <input class="uniform_on" type="checkbox" id="accountDown" value="" '.
                                                                    ($_default->adminDown ? 'checked="checked"' : ''). '/>'.
                                                                    trans('managerView.c.adminDown'). '
                                                            </label>
                                                            <input type="hidden" id="accountDownInput" name="accountDown"
                                                                    value="'. $_default->adminDown. '">
                                                        </div>
                                                    </div>
                                                </div>';
                    break;
				case 'GROUP':
					$outData->group =	'<div class="span6">
                                                <div class="control-group">
    												<label class="control-label" for="groupID">'. trans('view.c.groupID'). ' ：</label>
                                                    <div class="controls">
    												    <select class="m-wrap span12" name="groupID" id="groupID">';
					foreach ($_data->group as $groupID) {
						$outData->group .= '<option value="'. $groupID. '"'. ($groupID == $_default->groupID ? 'selected="true"' : ''). '>'.
												trans('group.'. $groupID).'</option>';
					}
					$outData->group .= '               </select>
                                                    </div>
                                                </div>
                                            </div>';
					break;
				case 'GROUPADD':
				    $outData->group =	'<div class="span6">
				                                <div class="control-group">
				                                    <label class="control-label" for="groupID">'. trans('view.c.groupID'). ' ：</label>
				                                    <div class="controls">
				                                        <select class="m-wrap span12" name="groupID" id="groupID">';
				    foreach ($_data->group as $groupID) {
				        if($_default->mineGroupID == 53){
				            if( $groupID >= $_default->mineGroupID ){
				                $outData->group .= '<option value="'. $groupID. '"'. ($groupID == $_default->groupID ? 'selected="true"' : ''). '>'.
				                                        trans('group.'. $groupID).'</option>';
				            }
				        }
				        else{
				            if( $groupID > $_default->mineGroupID ){
				                $outData->group .= '<option value="'. $groupID. '"'. ($groupID == $_default->groupID ? 'selected="true"' : ''). '>'.
				                                        trans('group.'. $groupID).'</option>';
				            }
				        }
				    }
				    $outData->group .= '               </select>
				                                    </div>
				                                </div>
				                            </div>';
				    break;
                case 'C':
                	$outData->currency =   '<div class="span6">
                                                <div class="control-group">
                                                    <label class="control-label" for="currencyID">'. trans('view.c.currencyID'). ' ：</label>
                                                    <div class="controls">
                                                        <select class="m-wrap span12" name="currencyID" id="currencyID">';
                	foreach ($_data->currency as $currencyID) {
                		$outData->currency .= '<option value="'. $currencyID. '"'. ($currencyID == $_default->currencyID ? 'selected="true"' : ''). '>'.
                								trans('currency.'. $currencyID).'</option>';
                	}
                    $outData->currency .=   '           </select>
                                                    </div>
                                                </div>
                                            </div>';
                    break;
                case 'LNF':
				case 'LN':
					$outData->language =	'<div class="'. ($mode == 'LN' ? 'span6' : 'span12'). '">
                                                <div class="control-group">
    												<label class="control-label" for="languaID">'. trans('view.c.languageID'). ' ：</label>
                                                    <div class="controls">
    												    <select class="m-wrap span12" name="languageID" id="languageID">';
					foreach ($_data->language as $languageID) {
						$outData->language .= '<option value="'. $languageID. '"'. ($languageID == $_default->languageID ? 'selected="true"' : ''). '>'.
												trans('language.'. $languageID).'</option>';
					}
					$outData->language .= '           </select>
                                                    </div>
                                                </div>
                                            </div>';
					break;
                case 'GI':
                	$outData->game =       '<div class="span6">
                                                <div class="control-group">
                                                    <label class="control-label" for="gameID">'. trans('view.c.gameID'). ' ：</label>
                                                    <div class="controls">
                                                        <select class="m-wrap span12" name="gameID" id="gameID">
                                                            <option value="">'. trans('game.null'). '</option>';
                	foreach ($_data->game as $gameID) {
                		$outData->game .= '<option value="'. $gameID. '"'. ($gameID == $_default->gameID ? 'selected="true"' : ''). '>'.
                							trans('game.'. $gameID).'</option>';
                	}
                    $outData->game .= '                 </select>
                                                    </div>
                                                </div>
                                            </div>';
                    break;
                case 'GS':
                	$outData->gameStyle =  '<div class="span6">
                                                <div class="control-group">
                                                    <label class="control-label" for="gametype">'. trans('view.c.gametype') .' ：</label>
                                                    <div class="controls">
                                                        <select class="m-wrap span12" name="gametype" id="gametype">
                                                            <option value="">'. trans('gameStyle.null') .'</option>';
                	foreach ($_data->gameStyle as $styleID) {
                		$outData->gameStyle .= '<option value="'. $styleID. '"'. ($styleID == $_default->gametype ? 'selected="true"' : ''). '>'.
                								trans('gameStyle.'. $styleID).'</option>';
                	}
                    $outData->gameStyle .= '            </select>
                                                    </div>
                                                </div>
                                            </div>';
                    break;
                case 'BE':
                    $bankEvent = [100,101,102,103,104,200,201,202,203,204,300,301,302,303,304,305];
                    $outData->bankEvent =   '<div class="span6">
                                                <div class="control-group">
                                                    <label class="control-label" for="eventID">' .trans('view.c.eventID') .' ：</label>
                                                    <div class="controls">
                                                        <select class="m-wrap span12" name="eventID" id="eventID">
                                                            <option value="">' .trans('bankEvent.null') .'</option>';
                    foreach($bankEvent as $key){
                        $outData->bankEvent .= '<option value="'. $key. '"'. ($key == $_default->eventID ? 'selected="true"' : ''). '>'.
                                                trans('bankEvent.'. $key).'</option>';
                    }
                    $outData->bankEvent .= '            </select>
                                                    </div>
                                                </div>
                                            </div>';
                    break;
                case 'BS':
                    $bankStatus = [1,2,-1];
                    $outData->bankStatus =  '<div class="span6">
                                                <div class="control-group">
                                                    <label class="control-label" for="eventStatus">'. trans('view.c.eventStatus') .' ：</label>
                                                    <div class="controls">
                                                        <select class="m-wrap span12" name="eventStatus" id="eventStatus">
                                                            <option value="">'. trans('bankEvent.null') .'</option>';
                    foreach($bankStatus as $key){
                        $outData->bankStatus .= '<option value="'. $key. '"'. ($key == $_default->eventStatus ? 'selected="true"' : ''). '>'.
                                                trans('eventStatus.'. $key).'</option>';
                    }
                    $outData->bankStatus .= '           </select>
                                                    </div>
                                                </div>
                                            </div>';
                    break;
				case 'AG':
					$outData->agentCode =	'<div class="span6">
												<div class="control-group">
													<label class="control-label" for="agentCode">'. trans('view.agentLog.c.agentCode') .' ：</label>
													<div class="controls">
														<input type="text" class="m-wrap span12" name="agentCode" id="agentCode"
																placeholder="'. trans('view.c.agentCode'). '" value="'. $_default->agentCode .'">
													</div>
												</div>
											</div>';
					break;
				case 'FN':
					$outData->functionName =	'<div class="span6">
													<div class="control-group">
														<label class="control-label" for="functionName">'. trans('view.agentLog.c.functionName'). ' ：</label>
														<div class="controls">
															<select class="m-wrap span12" name="functionName" id="functionName">
																<option value="-1">'. trans('eventStatus.null') .'</option>';
					foreach ($_data->functionName as $function) {
						$outData->functionName .= 				'<option value="'. $function. '"'. ($function == $_default->functionName ? 'selected="true"' : ''). '>'. trans('api.'. $function).'</option>';
					}
					$outData->functionName .= '           	</select>
														</div>
													</div>
												</div>';
					break;
				case 'AEC': // API ErrorCode
					$outData->errorCode =	'<div class="span6">
												<div class="control-group">
													<label class="control-label" for="errorCode">'. trans('view.agentLog.c.errorCode'). ' ：</label>
													<div class="controls">
														<select class="m-wrap span12" name="errorCode" id="errorCode">
															<option value="-1">'. trans('eventStatus.null') .'</option>';
					foreach ($_data->errorCode as $errorCode) {
						$outData->errorCode .= 				'<option value="'. $errorCode. '"'. ($errorCode == $_default->errorCode ? 'selected="true"' : ''). '>'. $errorCode.'</option>';
					}
					$outData->errorCode .= '           </select>
													</div>
												</div>
											</div>';
					break;
				case 'WEC': // WEB ErrorCode
					$outData->errorCode =	'<div class="span6">
												<div class="control-group">
													<label class="control-label" for="errorCode">'. trans('view.actionLog.c.errorCode'). ' ：</label>
													<div class="controls">
														<select class="m-wrap span12" name="errorCode" id="errorCode">
															<option value="-1">'. trans('eventStatus.null') .'</option>';
					foreach ($_data->errorCode as $errorCode) {
						$outData->errorCode .= 				'<option value="'. $errorCode. '"'. ($errorCode == $_default->errorCode ? 'selected="true"' : ''). '>'. $errorCode.'</option>';
					}
					$outData->errorCode .= '           </select>
													</div>
												</div>
											</div>';
					break;
                case 'DT':
                    $outData->date= '<div class="span6">
                                        <div class="control-group">
                                            <label class="control-label" for="dataMode">'. trans('view.date.title') .' ：</label>
                                            <div class="controls">
                                                <div class="span3">
                                                    <select class="span12 m-wrap" name="dataMode" id="dataMode">
                                                        <option value="0" selected="true">'. trans('view.date.dateMode') .'</option>
                                                        <option value="today">'. trans('view.date.today') .'</option>
                                                        <option value="lastDay">'. trans('view.date.lastDay') .'</option>
                                                        <option value="thisWeek">'. trans('view.date.thisWeek') .'</option>
                                                        <option value="lastWeek">'. trans('view.date.lastWeek') .'</option>
                                                        <option value="thisMonth">'. trans('view.date.thisMonth') .'</option>
                                                        <option value="lastMonth">'. trans('view.date.lastMonth') .'</option>
                                                    </select>
                                                </div>
                                                <div class="span9 control-group">
                                                    <div class="span6 input-append date form_datetime" name="startDate" id="startDate">
                                                        <input id="startDate" name="startDate" class="span9 m-wrap" size="16" type="text" value="'. $_default->start .'">
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                    </div>
                                                    <div class="span6 input-append date form_datetime" name="endDate" id="endDate">
                                                        <input id="endDate" name="endDate" class="span9 m-wrap" size="16" type="text" value="'. $_default->end .'">
                                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>';
                    break;

                //new
                case 'BTN':
                    $outData->btn = '<div class="span12 pull-right">
                                        <button class="btn green pull-right" type="submit" id="searchBtn">
                                            <i class="icon-search"></i> '. trans('managerView.b.search') .'
                                        </button>
                                        <button class="btn red pull-right" type="button" id="clearBtn">
                                            <i class="icon-trash"></i> '. trans('managerView.b.clear') .'</button>
                                    </div>';
                    break;
                case 'TU':
                    $outData->treeUp = '';
                    foreach ($_data as $row) {
                        if($row->account != $_default){
                            $outData->treeUp .= '<li>
                                                    <a href="#" type="button" class="btn green"
                                                       onclick="'. "$('#account').val('". $row->account. "');$('#searchForm').submit();". '">'.
                                                            $row->account.
                                                    ' <i class="icon-angle-right"></i>
                                                    </a>
                                                </li>';
                        }
                        else{
                            $outData->treeUp .= '<li><a href="#" type="button" class="btn green disabled">'. $row->account. '</a></li>';
                        }
                    }
                    break;
            }
        }
        return $outData;
	}
}
