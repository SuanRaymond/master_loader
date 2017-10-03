<?php
namespace App\Presenter;

class commodity_presenter{

	public function title($_object)
	{
		$html = '<div class="panel panel-default">
				    <div class="panel-body">
				        <div id="Banner">';

                    foreach($_object->images as $imgBase64){
                		$html .= '<img src="'. $imgBase64. '" width="100%">';
                	}

    	$html .= 	'</div>
			         <br><h4>'. $_object->title. '</h4>
                </div>
			</div>
			<div class="panel panel-default">
			    <div class="panel-body">
			        <div class="" style="display: inline-block; width: 100%; max-width: 100%;">
                        <div class="span12" style="padding: 0;">
                            <table style="width:100%;max-width:100%;">
                                <tr>
                                    <td>'. trans('view.ShopDetail.price'). '：<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>'. pFormat($_object->price). '</td>
                                    <td rowspan="2" style="font-size:18pt; text-align: right; vertical-align: middle; color: red;">
                                        PP：<u><strong>'. pFormat($_object->points). '</strong></u>
                                    </td>
                                </tr>
                                <tr>
                                    <td>'. trans('view.ShopDetail.transport'). '：<span class="glyphicon glyphicon-usd" aria-hidden="true"></span>'. pFormat($_object->transport). '</td>
                                </tr>
                            </table>
                        </div>
			            <!-- <span id="DetailPrice">
			                '. trans('view.ShopDetail.price'). '：
			                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			                '. pFormat($_object->price). '</span><br>
			            <span id="DetailTransport">
			                '. trans('view.ShopDetail.transport'). '：
			                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			                '. pFormat($_object->transport). '</span> --!>
			        </div>
			        <!--<div class="pull-right" style="display: inline-block;">
			            <span id="DetailPoints">PP：<u><strong>
			            '. pFormat($_object->points). '</strong></u></span>
			        </div>--!>
		        	<div class="panel panel-default">
			    		<div class="panel-body">
			    			<div class="row">
			                    <div class="span6">
			                    	<a id="ShopCarAdd"
			                    	   class="button button-rounded button-flat-highlight span12" style="padding-left: 5px; padding-right: 5px;">
			                    		<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
			                    		'. trans('view.ShopDetail.b.addCar'). '
			                    	</a>
			                    </div>
			                    <div class="span6">
			                    	<a href="/PassBuy?ShopID='. $_object->shopID.'"
			                    	   class="button button-rounded button-flat-caution span12" style="padding-left: 5px; padding-right: 5px;">
			                    		'. trans('view.ShopDetail.b.buyNow'). '
			                    		<span class="glyphicon glyphicon-save" aria-hidden="true"></span>
			                    	</a>
			                    </div>
		                    </div>
		                </div>
					</div>
			    </div>
			</div>';

        $html .= '<input type="hidden" class="form-control" id="ShopID" value='. $_object->shopID. ' >';
		return $html;
	}

	/**
	 * 商品詳細資訊
	 * @param object $_object 資料物件
	 */
	public function detail($_object)
	{
		//輸出物件
		$html = '';
		//將資料空白去除
        $_object = reSetKey($_object);

        foreach($_object as $row){
        	foreach($row as $value){
        		$html .= '<li><a href="/MenuListDetail?MenyID='. $value. '">'. trans('menu.menu.'. $value). '</a></li>';
        	}
        }

        return $html;
	}

	/**
	 * 商品規格
	 * @param object $_object 資料物件
	 */
	public function norm($_object)
	{
        if(empty($_object->norm))
            return '';
        $_object->norm = json_decode($_object->norm);

        //輸出物件
        $html = '<table class="table table-striped table-bordered">
                    <tbody>';
        // dd($_object->norm);
        foreach($_object->norm as $key => $value){
        	$html .= '	<tr>
			                <th scope="row" id="th">'. $key. '</th>
			                <td>'. $value. '</td>
			            </tr>';
        }
        $html .= '	</tbody>
				</table>';

        return $html;
	}
}