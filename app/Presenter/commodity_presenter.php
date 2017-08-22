<?php
namespace App\Presenter;

class commodity_presenter{

	public function title($_object)
	{
		$html = '<div class="panel panel-default">
				    <div class="panel-body">
				        <div id="Banner">';

    	for($x=1;$x<=10;$x++){
    		if(is_file('./images/shop/item/'. $_object->shopID. '/item'. $x. '.jpg')){
			   $html .= '<img src="./images/shop/item/'. $_object->shopID. '/item'. $x. '.jpg" width="100%">';
			}
			else{
			   break;
			}
    	}

    	$html .= 	'</div>
    			  	<h4>'. $_object->title. '</h4>
			    </div>
			</div>
			<div class="panel panel-default">
			    <div class="panel-body">
			        <div class="" style="display: inline-block;">
			            <span id="DetailPrice">
			                '. trans('view.ShopDetail.price'). '：
			                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			                '. pFormat($_object->price). '</span><br>
			            <span id="DetailTransport">
			                '. trans('view.ShopDetail.transport'). '：
			                <span class="glyphicon glyphicon-usd" aria-hidden="true"></span>
			                '. pFormat($_object->transport). '</span>
			        </div>
			        <div class="pull-right" style="display: inline-block;">
			            <span id="DetailPoints">PP：<u><strong>
			            '. pFormat($_object->points). '</strong></u></span>
			        </div>
			    </div>
			</div>';

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
		$_object->norm = json_decode($_object->norm);
		//輸出物件
		$html = '<table class="table table-striped table-bordered">
        			<tbody>';

        foreach($_object->norm as $key => $value){
        	$html .= '	<tr>
			                <th scope="row">'. $key. '</th>
			                <td>'. $value. '</td>
			            </tr>';
        }
        $html .= '	</tbody>
				</table>';

        return $html;
	}
}