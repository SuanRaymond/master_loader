<?php
namespace App\Presenter;

class sGame_presenter{
    /**
     * 富貴刮刮樂
     * @param object $_object 資料物件
     */
    public function OddsDetail($_object)
    {
        $html = '<div id="openrebate">';
        $_object = reSetKey($_object);
        foreach($_object as $key => $value){
            $html .= '<div class="Awards Awards'.$key.'"> '.$value.'% </div>';
        }
        $html .= '</div>';
        return $html;
    }
    /**
     * 敲金蛋
     * @param object $_object 資料物件
     */
    public function OddsDetailEgg($_object)
    {
        // dd($_object);
        $html = '<div id="openrebate">';
        $_object = reSetKey($_object);
        foreach($_object as $row => $group){
            foreach($group as $key => $value){
                $html .= '<div class="EggAwards EggAwards'.$row.$key.'"> '.$value.'% </div>';
            }
        }
        // foreach($_object as $key => $value){
        //     $html .= '<div class="Awards Awards'.$key.'"> '.$value.'% </div>';
        // }
        $html .= '</div>';
        return $html;
    }
}