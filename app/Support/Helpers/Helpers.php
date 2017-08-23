<?php
if(!function_exists('ip')){
    /**
     * 取得反向代理ip
     */
    function ip(){
        if(!empty($_SERVER["HTTP_CLIENT_IP"])){
            $cip = $_SERVER["HTTP_CLIENT_IP"];
        }
        else if(!empty($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        }
        else if(!empty($_SERVER["REMOTE_ADDR"])){
            $cip = $_SERVER["REMOTE_ADDR"];
        }
        else{
            $cip = "error!";
        }
        $cip = str_replace(', 192.168.21.200', '', $cip);
        $cip = str_replace('192.168.21.200 ,', '', $cip);
        $cip = str_replace('192.168.21.200', '', $cip);
        return $cip;
    }
}

if(!function_exists('mIView')){
    /**
     * Index View ReUse
     */
    function mIView($_name, $_cup = null){
        if(is_null($_cup)){
            $_cup = compact(null);
        }
        return view('index.'. $_name, $_cup);
    }
}

if(!function_exists('mSView')){
    /**
     * Shop View ReUse
     */
    function mSView($_name, $_cup = null){
        if(is_null($_cup)){
            $_cup = compact(null);
        }
        return view('shop.'. $_name, $_cup);
    }
}

if(!function_exists('mMView')){
    /**
     * Manager View ReUse
     */
    function mMView($_name, $_cup = null){
        if(is_null($_cup)){
            $_cup = compact(null);
        }
        return view('manager.'. $_name, $_cup);
    }
}

if(!function_exists('alert')){
    /**
     * 訊息視窗
     * @param  string   $_title     標題
     * @param  string   $_msg       內容
     * @param  array    $_status    狀態：0：訊息、1：成功、2：錯誤、3：警告
     * Demo
     * $flashAlert[] = alert(標題, 內容, 狀態);
     * setMesage($flashAlert);
     * OR
     * setMesage([alert(標題, 內容, 狀態)]);
     */
    function alert($_title, $_msg, $_status){
        if($_status == 0){
            $_status = 'info';
        }
        else if($_status == 1){
            $_status = 'success';
        }
        else if($_status == 2){
            $_status = 'error';
        }
        else if($_status == 3){
            $_status = 'warning';
        }
        else{

        }
        return ['title' => $_title, 'msg' => $_msg, 'status' => $_status];
    }
}


if(!function_exists('setMesage')){
    /**
     * Alert 訊息
     */
    function setMesage($_msg){
        //取出訊息陣列
        $msgBland = 'swal({title:"@title",text:"@msg",type:"@type",closeOnConfirm: false},function(){@next});';
        $flashAlertStr = '@next';
        if(!empty($_msg)){
            foreach($_msg as $key => $row){
                if(($key + 1) >= count($_msg)){
                    $flashAlertStr = str_replace('@next', 'swal("'. $row['title']. '", "'. $row['msg']. '", "'. $row['status']. '");', $flashAlertStr);
                }
                $msgtemp = $msgBland;
                $msgtemp = str_replace('@title', $row['title'], $msgtemp);
                $msgtemp = str_replace('@msg', $row['msg'], $msgtemp);
                $msgtemp = str_replace('@type', $row['status'], $msgtemp);
                $flashAlertStr = str_replace('@next', $msgtemp, $flashAlertStr);
            }
        }
        $flashAlertStr = str_replace('@next', '', $flashAlertStr);
        session()->put('msg', $flashAlertStr);
    }
}

if(!function_exists('ajaxRespone')){
    /**
     * 0 success, 1 fail msg->國際化語言錯誤訊息
     */
    /**
     * AJAX 共用回傳
     * @param  string   $_status 狀態
     * @param  string   $_msg    訊息
     * @param  array    $_data   資料陣列
     */
    function ajaxRespone($_status, $_msg, $_data = null){
        echo json_encode(array(
            'result' => $_status,
            'msg'    => $_msg,
            'data'   => $_data
        ));
        exit;
    }
}

if(!function_exists('isJson')){
    /**
     * 判斷是否為JSon
     * @param  string  $_json Json  字串
     * @return boolean              true：是、false：否
     */
    function isJson($_json){
        json_decode($_json);
        return json_last_error() == JSON_ERROR_NONE;
    }
}

if(!function_exists('getNull')){
    /**
     * 如果抓取得值不存在預設NULL
     * @param  object  $_object     物件 / 陣列
     * @param  string  $_key        Key
     * @return value                存在：值、不存在：NULL
     */
    function getNull($_object, $_key){
        $outData = null;
        if(isset($_object->$_key)){
            $outData = $_object->$_key;
        }
        else if(isset($_object[$_key])){
            $outData = $_object[$_key];
        }
        return $outData;
    }
}

if(!function_exists('reSetKey')){
    /**
     * 重新設定物件/陣列的KEY（全面轉為全小寫）
     * @param  object  $_object     物件 / 陣列
     */
    function reSetKey($_object, $_reCover = []){
        //輸出用
        $reObject = null;

        //覆蓋參數初始化
        $reCover = [];
        foreach($_reCover as $key){
            $reCover[strtolower($key)] = $key;
        }

        //確認使用方法
        if(gettype($_object) === 'object'){
            $reObject = (object) array();
        }
        else if(gettype($_object) === 'array'){
            $reObject = [];
        }

        //轉換
        foreach($_object as $key => $value){
            $reKey = strtolower($key);

            //替換部分KEY
            foreach($_reCover as $reCoverKey){
                $reKey = str_replace(strtolower($reCoverKey), $reCoverKey, $reKey);
            }

            if(gettype($_object) === 'object'){
                $reObject->$reKey = $value;
            }
            else if(gettype($_object) === 'array'){
                $reObject[$reKey] = $value;
            }
        }
        return $reObject;
    }
}

if(!function_exists('createSessionJson')){
    /**
     * Session Json 創建
     * @param  string  $_key        Key
     */
    function createSessionJson($_key){
        $json = [];
        session()->put($_key, json_encode($json));
    }
}

if(!function_exists('removeSessionJson')){
    /**
     * Session Json 刪除
     * @param  string  $_key        Key
     */
    function removeSessionJson($_key){
        session()->forget($_key);
    }
}

if(!function_exists('addSessionJson')){
    /**
     * Session Json 增加
     * @param  string  $_value      值
     * @param  string  $_key        Key
     */
    function addSessionJson($_key, $_value){
        $json = session()->get($_key, null);
        if(!is_null($json)){
            if(isJson($json)){
                $json   = json_decode($json);
                $json[] = $_value;
                session()->put($_key, json_encode($json));
            }
        }
    }
}

if(!function_exists('masSessionJson')){
    /**
     * Session Json 減少
     * @param  string  $_value      值
     * @param  string  $_key        Key
     */
    function masSessionJson($_key, $_value){
        $json = session()->get($_key, null);
        if(!is_null($json)){
            if(isJson($json)){
                $json   = json_decode($json);
                foreach($json as $key => $value){
                    if($_value == $value){
                        array_splice($json, $key, $key);
                        session()->put($_key, json_encode($json));
                        return;
                    }
                }
            }
        }
    }
}

if(!function_exists('getSessionJson')){
    /**
     * Session Json 撈取
     * @param  string  $_value      值
     * @param  string  $_key        Key
     */
    function getSessionJson($_key){
        $json = session()->get($_key, null);
        if(!is_null($json)){
            if(isJson($json)){
                $json = json_decode($json);
                return $json;
            }
        }
        return [];
    }
}


if(!function_exists('checkMobile')){
    function checkMobile() {
        $mbBrowser = 0;
        $userAgent = $_SERVER['HTTP_USER_AGENT'];    //取得用戶端的使用環境
        $accept    = $_SERVER['HTTP_ACCEPT'];

        //"i" 不區分大小寫
        if(preg_match('/(up.browser|up.link|mmp|symbian|smartphone|midp|wap|phone|android|iPad)/i', strtolower($userAgent))){
            $mbBrowser++;
        }
        //非行動裝置
        if(strpos(strtolower($userAgent),'windows') > 0){
          $mbBrowser = 0;
        }
        //有HTTP_X_WAP_PROFILE則必是行動裝置
        if((strpos(strtolower($accept),'application/vnd.wap.xhtml+xml') > 0) || ((isset($_SERVER['HTTP_X_WAP_PROFILE']) || isset($_SERVER['HTTP_PROFILE'])))){
          $mbBrowser++;
        }
        //額外放入暴力判斷
        $mobileSource = strtolower(substr($userAgent, 0, 4));
        $mbArray = array(
            'w3c ','acs-','alav','alca','amoi','audi','avan','benq','bird','blac',
            'blaz','brew','cell','cldc','cmd-','dang','doco','eric','hipt','inno',
            'ipaq','java','jigs','kddi','keji','leno','lg-c','lg-d','lg-g','lge-',
            'maui','maxo','midp','mits','mmef','mobi','mot-','moto','mwbp','nec-',
            'newt','noki','oper','palm','pana','pant','phil','play','port','prox',
            'qwap','sage','sams','sany','sch-','sec-','send','seri','sgh-','shar',
            'sie-','siem','smal','smar','sony','sph-','symb','t-mo','teli','tim-',
            'tosh','tsm-','upg1','upsi','vk-v','voda','wap-','wapa','wapi','wapp',
            'wapr','webc','winw','winw','xda ','xda-'
        );
        if(in_array($mobileSource, $mbArray)){
          $mbBrowser++;
        }
        //ALL_HTTP是ASP的variable
        // if(strpos(strtolower($_SERVER['ALL_HTTP']), 'OperaMini') > 0){
        //   $mbBrowser++;
        // }

        if($mbBrowser > 0){
          return true;
        }
        else {
          return false;
        }
    }
}

if(!function_exists('browser')){
    /**
     * 取得瀏覽器類型
     */
    function browser(){
        $agent = request()->server('HTTP_USER_AGENT');
        /*
        400 Chrome
        401 Safari
        402 Firefox
        403 Opera
        404 360SE
        405 搜狗
        406 騰訊
        407 世界之窗
        408 遨遊
        409 UC
        410 Avant
        411 IE.6
        412 IE.7
        413 IE.8
        418 EDGE
        420 IE 類別
        499 其他
        */
        if(stripos($agent, "Chrome") || (stripos($agent, "android") && stripos($agent, "linux") && stripos($agent, "mobile safari"))){
            $agent = 400;
        }
        else if(stripos($agent, "safari") && stripos($agent, "version")){
            $agent = 401;
        }
        else if(stripos($agent, "Firefox")){
            $agent = 402;
        }
        else if(stripos($agent, "opera")){
            $agent = 403;
        }
        else if(stripos($agent, "360SE")){
            $agent = 404;
        }
        else if(stripos($agent, "SE") && stripos($agent, "MetaSr")){
            $agent = 405;
        }
        else if(stripos($agent, "TencentTraveler") || stripos($agent, "QQBrowser")){
            $agent = 406;
        }
        else if(stripos($agent, "The world")){
            $agent = 407;
        }
        else if(stripos($agent, "Maxthon")){
            $agent = 408;
        }
        else if(stripos($agent, "UCWEB")){
            $agent = 409;
        }
        else if(stripos($agent, "Avant")){
            $agent = 410;
        }
        else if(stripos($agent, "MSIE 6.0") || stripos($agent, "IEMobile")){
            $agent = 411;
        }
        else if(stripos($agent, "MSIE 7.0") || stripos($agent, "IEMobile")){
            $agent = 412;
        }
        else if(stripos($agent, "MSIE 8.0") || stripos($agent, "IEMobile")){
            $agent = 413;
        }
        else if(stripos($agent, "MSIE") || stripos($agent, "IEMobile")){
            $agent = 420;
        }
        else if(stripos($agent, "EDGE")){
            $agent = 418;
        }
        else{
            $agent = 499;
        }

        return $agent;
    }
}

?>
