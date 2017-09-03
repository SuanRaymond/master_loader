<?php
namespace App\Presenter;

class bateList_presenter{
    /**
     * 藏蛋清單
     * @param object $_object 資料物件
     */
    public function bateList($_object)
    {
        //輸出物件
        $html = '
                <div class="panel-body title">
                    <div class="span3">
                        '. trans('view.Task.TitleListName') .'
                    </div>
                    <div class="span3">
                        '. trans('view.Task.TitleListPoints') .'
                    </div>
                    <div class="span3">
                        '. trans('view.Task.TitleListEgg') .'
                    </div>
                    <div class="span3">
                        &nbsp;
                    </div>
                </div>';
        $_object = reSetKey($_object);
        foreach($_object as $typeID => $row){
            // dd($row);
            $html .='
                    <hr>
                    <div class="panel-body list">
                        <div class="span3">
                            '. trans('view.Task.th.ListName'.$row->Type) .'
                        </div>
                        <div class="span3">
                            '. pFormat($row->Point) .'
                            <input type="hidden" value="'.$row->Point.'" id="points'.$row->Type .'">
                        </div>
                        <div class="span3">
                            '. pFormat($row->MoneyBack) .'
                        </div>
                        <div class="span3">
                            <a class="button button-rounded button-flat-primary" id="Buy'.$row->Type.'">'. trans('view.Task.b.Buy') .'</a>
                        </div>
                    </div>
                    ';
        }
        return $html;
    }
    /**
     * 任務清單
     * @param object $_object 資料物件
     */
    public function taskList($_object)
    {
        //輸出物件
        $html = '
                <div class="panel-body">
                    <div class="list-group">
                        <a href="/Sign" class="list-group-item">
                            '. trans('view.Task.cl.SignName') .'
                            <span class="label label-danger">'. trans('view.Task.cl.SignDay') .$_object->CheckinCount.'</span>
                            <span class="badge badge'.$_object->Checkin.'">'. trans('view.Task.cl.badge'.$_object->Checkin) .'</span>
                        </a>
                        <a href="/SGame" class="list-group-item">
                            '. trans('view.Task.cl.GameName') .'
                            <span class="badge badge'.$_object->ScratchCard.'">'. trans('view.Task.cl.badge'.$_object->ScratchCard) .'</span>
                        </a>
                    </div>
                </div>';

        return $html;
    }
    /**
     * 藏蛋清單 底下按鈕
     * @param object $_object 資料物件
     */
    public function contentBottom()
    {
        //輸出物件
        $html = '
                <nav class="navbar navbar-default navbar-fixed-bottom row" role="navigation">
                    <div class="span7 taskNavbarBottom" style="text-align: center;">
                        '. trans('view.Task.MemberPoints') . auth()->user->points .'
                        <input type="hidden" value="'. pRFormat(auth()->user->points) .'" id="points">
                    </div>
                    <a class="span5 button button-flat-caution taskNavbarBottom" role="button" href="/Shop">
                        '. trans('view.Task.b.GoShop') .'
                    </a>
                </nav>';

        return $html;
    }
}