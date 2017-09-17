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

        foreach($_object as $row){
        	foreach($row as $value){
        		$html .= '<li><a href="/Sort?menuID='. $value. '">'. trans('menu.menu.'. $value). '</a></li>';
        	}
        }

        return $html;
	}

	/**
	 * 主頁顯示的商品列表
	 * @param object $_object 資料物件
	 */
	public function menuListMenuCommodity($_object)
	{
		//輸出物件
		$html = '';

        foreach($_object as $menuID => $group){
    		$html .= 	'<div class="panel panel-default">
						    <div class="panel-body">
						        <div class="popular-search-div">
						            <span class="popular">'. trans('menu.menu.'. $menuID). '</span>
						            <span class="see-more"><a href="/Sort?menuID='. $menuID. '">'. trans('view.Shop.b.more'). '</a></span>
						        </div>
						        <div class="popular-search">';
        	foreach($group as $shopID => $row){
        		if(strlen($row->title) > 20){
        			$row->title = mb_substr($row->title, 0, 20). '...';
        		}
        		$html .= 	'<a href="/ShopDetail?ShopID='. $shopID. '" class="thumbnail">
                				<img src="'. $row->images. '" height="100%" alt="" >
                				<div class="CommodityTitle">'. $row->title. '</div>
                				<span class="label label-success">$ '. pFormat($row->price). '</span>
                    			<span class="label label-danger">PP '. pFormat($row->points). '</span>
            				</a>';
        	}
        	$html .= 			'</div>
						    </div>
						</div>';
        }

        return $html;
	}

    /**
     * 分類頁顯示商品列表
     * @param object $_object 資料物件
     */
    public function sortList($_object)
    {
        $html = '';
        $_object = reSetKey($_object);
        // dd($_object);
        foreach ($_object as $menuID => $group) {
            foreach ($group as $ShopID => $row) {
                if(strlen($row->title) > 6){
                    $row->title = mb_substr($row->title, 0, 6). '...';
                }
                $html .= '
                        <a href="/ShopDetail?ShopID='.$ShopID.'">
                            <div class="span5 sortListBox">
                                <img class="span12 sortImg" src="'. $row->images. '">
                                <div class="span12 sortListTextBox">
                                    <div class="span12 sortListTextTitle">'. $row->title.'</div>
                                    <div class="span12 sortListTextMoney">$&nbsp;&nbsp; '. pFormat($row->price). '</div>
                                    <div class="span12 sortListTextPoint">PP '. pFormat($row->points). '</div>
                                </div>
                            </div>
                        </a>';
            }
        }
        return $html;
    }
}
