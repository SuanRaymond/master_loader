<?php

namespace App\Presenter\Manager;

class page_presenter{

    /**
     * 分頁 HTML 組成 頭部
     * @param  collect $_box 投注紀錄取出的資料
     */
    public function searchTop($_box){
		$html = '<div class="row-fluid">
					<div class="span2">
	                    <div class="control-group dataTables_length" id="dataTable_length">
							<label class="control-label" for="rowSelect">'. trans('managerView.c.row'). ' ：
								<select class="m-wrap span4" id="rowSelect">
									<option value="10" '. ($_box->params->row == 10 ? 'selected="selected"' : ''). '>10</option>
									<option value="25" '. ($_box->params->row == 25 ? 'selected="selected"' : ''). '>25</option>
									<option value="50" '. ($_box->params->row == 50 ? 'selected="selected"' : ''). '>50</option>
									<option value="100" '. ($_box->params->row == 100 ? 'selected="selected"' : ''). '>100</option>
								</select>
							</label>
						</div>
					</div>
				</div>';
    	return $html;
    }

	/**
     * 分頁 HTML 組成 頭部 (如有第二區塊
     * @param  collect $_box 取出的資料
     */
    public function searchTopSecond($_box){
		$html = '<div class="row-fluid">
					<div class="span2">
	                    <div class="control-group dataTables_length" id="m_dataTable_length_member">
							<label class="control-label" for="m_rowSelect">'. trans('managerView.c.row'). ' ：
								<select class="m-wrap span4" id="m_rowSelect">
									<option value="10" '. ($_box->params->mrow == 10 ? 'selected="selected"' : ''). '>10</option>
									<option value="25" '. ($_box->params->mrow == 25 ? 'selected="selected"' : ''). '>25</option>
									<option value="50" '. ($_box->params->mrow == 50 ? 'selected="selected"' : ''). '>50</option>
									<option value="100" '. ($_box->params->mrow == 100 ? 'selected="selected"' : ''). '>100</option>
								</select>
							</label>
						</div>
					</div>
				</div>';
    	return $html;
    }

	/**
	 * 分頁 HTML 組成 底部
	 * @param  collect $_box 投注紀錄取出的資料
	 */
	public function searchBottom($_result){
		$html = '<div class="row-fluid">
	                <div class="span12">
	                    <div class="pagination">
	                    	<div class="span6">'.
			                        sprintf(trans('managerView.pageStyle'), $_result->currentPage(), $_result->lastPage(), $_result->firstItem(), $_result->lastItem(), $_result->total()).
		                	'</div>
							<div class="span6">
								<div class="pull-right">'.
		                        	$_result->appends(request()->query())->render().
		                    	'</div>
		                    </div>
		                </div>
	                </div>
                </div>';
        return $html;
	}
}

?>
