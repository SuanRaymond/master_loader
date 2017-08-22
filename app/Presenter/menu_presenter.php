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
        		$html .= '<li><a href="/MenuListDetail?MenyID='. $value. '">'. trans('menu.menu.'. $value). '</a></li>';
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
						            <span class="see-more">'. trans('view.Shop.b.more'). '</span>
						        </div>
						        <div class="popular-search">';
        	foreach($group as $shopID => $row){
        		if(strlen($row->title) > 20){
        			$row->title = mb_substr($row->title, 0, 20). '...';
        		}
        		$html .= 	'<a href="/ShopDetail?ShopID='. $shopID. '" class="thumbnail">
                				<img src="images/shop/item/'. $shopID. '/Title.jpg"  height="100%" alt="" >
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
                if(strlen($row->title) > 7){
                    $row->title = mb_substr($row->title, 0, 7). '...';
                }
                $html .= '
                        <a href="/ShopDetail?ShopID='.$ShopID.'">
                            <div class="span5 sortListBox">
                                <img class="span12 sortImg" src="images/shop/item/'.$ShopID.'/Title.png">
                                <div class="span12 sortListTextBox">
                                    <div class="span12 sortListTextTitle">'. $row->title.'</div>
                                    <div class="span6 sortListTextMoney">$ '. $row->price.'</div>
                                    <div class="span6 sortListTextPoint">PP '. $row->price.'</div>
                                </div>
                            </div>
                        </a>';
            }
        }
        for($i=1;$i<=7;$i++){
            $html .= '<div class="span5 sortListBox">
                        <img class="span12 sortImg" src="images/shop/item/'.$ShopID.'/Title.png">
                        <div class="span12 sortListTextBox">
                            <div class="span12 sortListTextTitle">'. $row->title.'</div>
                            <div class="span6 sortListTextMoney">$ '. $row->price.'</div>
                            <div class="span6 sortListTextPoint">PP '. $row->price.'</div>
                        </div>
                      </div>';
        }
        return $html;
    }
}
