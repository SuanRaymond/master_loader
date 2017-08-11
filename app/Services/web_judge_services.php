<?php
namespace App\Services;
class web_judge_services{

    public $box;

	public function __construct($_object)
    {
        $this->box = $_object;
    }
	/**
	 * 判斷式模組
	 * @param  object $_system	資料物件
	 * @param  array  $_switch  模組切換
	 * @return string          	0：正確
	 * @return CMA           	確認帳號
	 * @return CPW           	確認密碼
	 * @return CAPI           	確認API 回傳的資料

	 */
	public function check($_switch)
	{
		$this->box->status = 0;
		foreach($_switch as $key){
			switch($key){
				/************** 確認資訊 **************/
				case 'CMSS':
					$this->box->loginType = false;
					$this->box->member = session()->get('member', '{}');
					//確認會員資料是不是空白
					if($this->box->member != ''){
						//確認會員資料是不是 JSON
						if(isJson($this->box->member)){
							//將會員資料轉換為 Object
							$this->box->member = json_decode($this->box->member);
							//是否登入
							if(isset($this->box->member->account) &&
							   isset($this->box->member->token)){
								if($this->box->member->account != '' &&
								   $this->box->member->token != ''){
									$this->box->loginType = true;
								}
							}
						}
					}
					break;
				case 'CMA':
					//帳號是否輸入
			    	if(!isset($this->box->account)){
			    		return $this->respone(1);
			    	}
			    	//帳號是否過長
			    	if(strlen($this->box->account) > 20){
			    		return $this->respone(2);
					}
					//帳號是否過短
					if(strlen($this->box->account) < 6){
						return $this->respone(3);
					}
					break;
				case 'CPW':
					//密碼是否輸入
			    	if(!isset($this->box->password)){
			    		return $this->respone(4);
			    	}
			    	//密碼是否過長
			    	if(strlen($this->box->password) > 20){
			    		return $this->respone(5);
					}
					//密碼是否過短
					if(strlen($this->box->password) < 6){
						return $this->respone(6);
					}
					//密碼是否符合規則
					if(!preg_match("/^([0-9A-Za-z]+)$/", $this->box->password)){
			    		return $this->respone(7);
					}
					break;
				case 'CAPI':
					//確認回傳資料是不是空白
					if($this->box->result == ''){
						return $this->respone(8);
					}
					//確認回傳資料是不是 JSON
					if(!isJson($this->box->result)){
						return $this->respone(9);
					}
					//將資料轉換為 Object
					$this->box->result = json_decode($this->box->result);
					//比對回傳狀態是否為成功
					if($this->box->result->Result != 0){
            			return $this->respone($this->box->result->Result);
        			}
					break;

			}
		}

		return $this->box;
	}

	public function respone($_status)
	{
		$this->box->status = $_status;
		return $this->box;
	}
}
