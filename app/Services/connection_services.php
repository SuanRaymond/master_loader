<?php
namespace App\Services;

class connection_services{

	/**
	 * API 送資料給 API
	 * @param  object $_object 資料物件
	 */
	public function callApi($_object)
	{
		$_object->reKey     = config('app.key');
        $_object->deBugMode = false;
        if(config('app.debug') == true && config('app.useType') == 'LOCAL'){
            $_object->deBugMode = true;
        }

		//初始化加密方法
        $encrypt_services = new encrypt_services($_object->reKey);
		//轉換資料為JSON
		$_object->sendParams = json_encode($_object->sendParams);
		$_object->sign       = $_object->sendParams;
        if(!$_object->deBugMode){
			$_object->sendParams = $encrypt_services->LaravelEncode($_object->sendParams);
			$_object->sign       = $encrypt_services->EnSign($_object->sign);
        }
        //資料加密與打包
        $_object->Post_Array   = http_build_query(
            array(
                'Params' => $_object->sendParams,
                'Sign'   => $_object->sign
        ));

         //送出
        return $this->sendHTTP($_object->sendApiUrl. '/'. $_object->callFunction, $_object->Post_Array);
	}

	/**
	 * 跨網域送出POST
	 */
	public function sendHTTP($Url, $Post_Array){
		$OutData = '';
		try{
			//初始化
		    $Curl = curl_init();
		    $TimeOut = 30;
		    //設定抓取網址
		    curl_setopt($Curl, CURLOPT_URL, $Url);
		    //POST 啟用
		    curl_setopt($Curl, CURLOPT_POST, true);
		    //POST 字串
		    curl_setopt($Curl, CURLOPT_POSTFIELDS, $Post_Array);
		    //逾時時間
		    curl_setopt($Curl, CURLOPT_CONNECTTIMEOUT, $TimeOut);
		  	//是否回傳
		  	curl_setopt($Curl, CURLOPT_RETURNTRANSFER, true);
		  	//加上 agent 不然反代不回你
		  	curl_setopt($Curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/49.0.2623.110 Safari/537.36");
		  	//抓取網頁
		    $OutData = curl_exec($Curl);
		    curl_close($Curl);
		}
		catch (Exception $e) {
			$OutData = json_encode(['result'=>'99']);
		}
		return $OutData;
	}

	/**
     * 取得連線雜項資料
     */
    public function getInfo()
    {
		$tempIP        = ip();
		$info          = (object) array();
		$info->ip      = $tempIP;
		$info->browser = browser();

		//將多重IP取出
		$tempIP = substr($tempIP, 0, strpos($tempIP, ',', 0));
        if($tempIP == ''){
            $tempIP = $info->ip;
        }

		$Post_Array    = http_build_query(array());
		$result        = $this->sendHTTP(env('GET_POSITION'). $tempIP, $Post_Array, false);
		$result        = json_decode($result);
        if($result){
            $info->position = '{"status":"SU","CY":"'. $result->country_name. '","CT":"'. $result->city. '","TZ":"'. $result->time_zone. '"}';
        }
        else{
            $info->position = '{"status":"ER"}';
        }
        return $info;
    }
}