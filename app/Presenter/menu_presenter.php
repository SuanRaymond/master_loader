<?php
namespace App\Presenter;

class menu_presenter{
	/**
	 * 類別清單
	 * @param object $_object 資料物件
	 */
	public function menuList($_object)
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

	public function menuListMenuCommodity($_object)
	{
		//輸出物件
		$html = '';
		//將資料空白去除
        $_object = reSetKey($_object);

        foreach($_object as $menuID => $group){
    		$html .= 	'<div class="panel panel-default">
						    <div class="panel-body">
						        <div class="popular-search-div">
						            <span class="popular">'. trans('menu.menu.'. $menuID). '</span>
						            <span class="see-more">'. trans('view.Shop.b.more'). '</span>
						        </div>
						        <div class="popular-search">';
        	foreach($group as $shopID => $row){
        		if(strlen($row->title) > 20){
        			$row->title = mb_substr($row->title, 0, 20). '...';
        		}
        		$html .= 	'<a href="/ShopDetail?ShopID='. $shopID. '" class="thumbnail">
                				<img src="images/shop/item/'. $shopID. '/Title.png"  height="100%" alt="" >
                				<div class="CommodityTitle">'. $row->title. '</div>
                				<span class="label label-success">$ '. $row->price. '</span>
                    			<span class="label label-danger">PP '. $row->points. '</span>
            				</a>';
        	}
        	$html .= 			'</div>
						    </div>
						</div>';
        }

        return $html;
	}
}
