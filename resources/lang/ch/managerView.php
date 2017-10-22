<?php
	/**
	 * b  => 按鈕
	 * th => 欄位名稱
	 * cl => 控制項的標籤
	 * ca => 控制項的預設說明
	 */
	return [
		'title'    => 'FunMugle',
		'plzenter' => '请输入',
		'and'      => '或',
		'confirm'  => '确认',
		'cancel'   => '取消',
		'update'   => '上傳',
		'nodata'   => '没有任何资料喔！',
    	'pageStyle'                 => '页次 %d / %d，本页显示 %d ~ %d 笔，总共搜寻到 %d 笔记录',

		'c'                         => [
	        'title'                 => '搜寻工具',
	        'adminDown'	=> '搜寻下线',
	        'account'        	    => '会员账号',
	        'row'                   => '行数',
	    ],
	    'b'                         => [
	        'send'                  => '送出',
	        'edit'                  => '编辑',
	        'change'				=> '更動',
	        'search'                => '搜寻',
	        'clear'                 => '清除',
	        'enabled'               => '已启用',
	        'disabled'              => '未启用',
	        'close'                 => '关闭',
	        'cancel'                => '取消',
	        'confirm'               => '确认',
	        'view'              	=> '查看',
	    ],
	    'th' => [
            'account'  => '账号',
            'nickName' => '昵称',
            'group'    => '所属群组',
            'points'   => 'PP',
            'integral' => '金蛋',
            'bonus'    => '紅利',
            'useinfo'  => '启用状态',
            'status'   => '狀態',
            'note'	   => '備註',
            'detail'   => '详细信息',
            'edit'     => '修改',
            'cDate'    => '修改时间',
            'bDate'    => '创建时间',
        ],
	    's' => [
	    	'0' => '未選擇',
	    ],
	    'date'                      => [
		    'title'                 => '选择时间',
		    'dateMode'              => '选择区间',
		    'start'                 => '开始时间',
		    'end'                   => '结束时间',
		    'today'                 => '今天',
		    'lastDay'               => '昨天',
		    'thisWeek'              => '这周',
		    'lastWeek'              => '上周',
		    'thisMonth'             => '这个月',
		    'lastMonth'             => '上个月',
		],
		'login'                     => [
	        't'                     => [
	            'title'             => '请先登入',
	            'lang'              => '更换语言',
	        ],
	        'c'                     => [
	            'account'           => '请输入账号',
	            'password'          => '请输入密码',
	        ],
	        'b'                     => [
	            'login'             => '登入',
	        ],
	    ],
	    'profile'                   => [
	        't'                     => [
	            'title'    => '基本数据',
	            'key'      => '项目',
	            'value'    => '内容',
	            'nickName' => '昵称',
	            'account'  => '账号',
	            'password' => '密码',
	            'currency' => '币别',
	            'points'   => 'PP',
	            'integral' => '金蛋',
				'bonus'    => '紅利',
	            'group'    => '所属群组',
	            'ip'       => '登入IP',
	            'position' => '登入位置',
	            'browser'  => '登入装置',
	            'cDate'    => '最近登入时间',
	            'bDate'    => '注册日期',
	            'edit'     => '修改',
	        ],
	    ],

	    'accountList' => [
	    	't'                     => [
	            'title'             => '账户列表',
	            'titleMine'         => '搜寻账户',
	            'titleDown'         => '下线',
	        ],
	    	'th' => [
	    		'ip'                 => 'IP位置',
	    		'position'           => '所在位置',
	    		'equipment'          => '使用裝置',
    			'passworderrorcount' => '密碼錯誤次數',
    			'loginDate'          => '最後登入時間',
    			'cuser'              => '修改者',
				'buser'              => '創建者',
	    	],
	    ],

	   	'transactionList' => [
	    	't'                     => [
	            'title'             => '账户列表',
	            'titleMine'         => '搜寻账户',
	            'titleDown'         => '下线',
	        ],
	    	'th' => [
	    		'ip'                 => 'IP位置',
	    		'position'           => '所在位置',
	    		'equipment'          => '使用裝置',
    			'passworderrorcount' => '密碼錯誤次數',
    			'loginDate'          => '最後登入時間',
    			'cuser'              => '修改者',
				'buser'              => '創建者',
	    	],
	    ],

	    'shopOrderList' => [
	    	't'                     => [
	            'title'             => '購物清單',
	            'detailMemberTitle' => '訂購會員資訊',
	            'detailShopTitle'   => '訂購商品資訊',
	        ],
	        'tr' => [
	        	'0'  => '未確認訂單',
	        	'1'  => '已收款未出貨',
	        	'2'  => '已出貨',
	        	'3'  => '訂單結束',
	        	'10' => '訂單失敗'
	        ],
	    	'th' => [
	    		'phone'       => '電話',
	    		'address'     => '地址',
	    		'memo'        => '備註',
	    		'cusername1'  => '第一次改變狀態者',
	    		'cDate1'      => '第一次改變時間',
	    		'cusername2'  => '第二次改變狀態者',
	    		'cDate2'      => '第二次改變時間',
	    		'cusername3'  => '第三次改變狀態者',
	    		'cDate3'      => '第三次改變時間',
	    		'shoporderID' => '購物編號',
	    		'price'       => '售價',
	    		'transport'   => '運費',
	    		'quantity'    => '數量',
	    	],
	    ],

	    'rebateList' => [
	    	't'                     => [
	            'title'             => '藏蛋清單',
	            'detailRebateTitle' => '藏蛋加速資訊',
	        ],
	        'tr' => [
	        	'0'  => '停用',
	        	'1'  => '啟用',
	        ],
	    	'th' => [
	    		'rebateID' 	  	=> '藏蛋編號',
	    		'moneyBack'   	=> '預計返利',
	    		'back'   	  	=> '目前返利',
	    		'baseOdds'    	=> '返利速度',
	    		'checkinCount'	=> '連續簽到天數',
	    		'lowerCount'  	=> '下線人數',
	    		'payCountType1'	=> '下線購買藏蛋套餐1人數',
	    		'payCountType2' => '下線購買藏蛋套餐2人數',
	    		'payCountType3' => '下線購買藏蛋套餐3人數',
	    		'payCountType4' => '下線購買藏蛋套餐4人數',
	    	],
	    ],

	    'backList' => [
	    	't'                     => [
	            'title'             => '返利清單',
	            'detailBackTitle' => '任務小遊戲',
	        ],
	        'tt' => [
	        	'0'  => '神秘寶箱',
	        	'1'  => '敲金蛋',
	        ],
	    	'th' => [
	    		'backID' 	  	=> '返利編號',
	    		'rebateID'   	=> '藏蛋編號',
	    		'before'   	  	=> '返利前',
	    		'after'    		=> '返利後',
	    		'baseOdds'		=> '返利速度',
	    		'taskOdds'		=> '任務加速',
	    		'back'  		=> '返利金蛋',
	    		'scratchID'		=> '編號',
	    		'type' 			=> '種類',
	    		'result' 		=> '賽果',
	    	],
	    ],

	   	'tradeList' => [
	    	't'                 => [
	            'title'         => '點數轉換',
	        ],
	        'ts' => [
	    		'1' 	  	=> 'PP轉換',
	    		'2' 	  	=> '金蛋轉換',
	    		'3' 	  	=> '紅利轉換',
	    	],
	       	'tp' => [
	    		'0' 	  	=> '轉出',
	    		'1' 	  	=> '轉入',
	    	],
	    	'th' => [
	    		'tradeID' 	  	=> '轉點編號',
	    		'trader' 	  	=> '對象',
	    		'status' 		=> '種類',
	    		'path' 			=> '方向',
	    		'before'   	  	=> '轉點前',
	    		'after'    		=> '轉點後',
	    	],
	    ],

	    'insertShop' => [
	    	'title' => '新增商品',
	    	'c' => [
	    		'title'       => '標題',
	    		'subTitle'    => '副標題',
	    		'imagesTitle' => '主頁圖片',
	    		'imagesShow'  => '展示圖片',
	    		'menuID'      => '商品類別ID',
	    		'price'       => '售價',
	    		'points'      => '積分',
	    		'transport'   => '運費',
	    		'quantity'    => '數量',
	    		'chstyle'     => '風格',
	    		'detail'      => '商品說明',
	    		'norm'        => '規格',
	    		'memo'        => '備註',
	    	],
	    	'p' => [
	    		'title'       => '最多50個字元',
	    		'subTitle'    => '最多100個字元',
	    		'imagesTitle' => '主頁圖片名稱',
	    		'imagesShow'  => '展示圖片名稱，多圖片請以,隔開',
	    		'menuID'      => '商品類別ID',
	    		'price'       => '售價',
	    		'points'      => '積分',
	    		'transport'   => '運費',
	    		'quantity'    => '數量',
	    		'chstyle'     => '使用Json格式',
	    		'detail'      => '商品說明',
	    		'norm'        => '使用Json格式',
	    		'memo'        => '備註',
	    	],
	    ],

	    'updateShop' => [
	    	'title' => '商品更新',
	    	'searchImages' => '搜尋到的商品',
	    	's' => [
	    		'shopID'	  => '商品編號',
	    	],
	    	'c' => [
	    		'title'       => '標題',
	    		'subTitle'    => '副標題',
	    		'imagesTitle' => '主頁圖片',
	    		'imagesShow'  => '展示圖片',
	    		'menuID'      => '商品類別ID',
	    		'price'       => '售價',
	    		'points'      => '積分',
	    		'transport'   => '運費',
	    		'quantity'    => '數量',
	    		'chstyle'     => '風格',
	    		'detail'      => '商品說明',
	    		'norm'        => '規格',
	    		'memo'        => '備註',
	    	],
	    	'p' => [
	    		'title'       => '最多50個字元',
	    		'subTitle'    => '最多100個字元',
	    		'imagesTitle' => '主頁圖片名稱',
	    		'imagesShow'  => '展示圖片名稱，多圖片請以,隔開',
	    		'menuID'      => '商品類別ID',
	    		'price'       => '售價',
	    		'points'      => '積分',
	    		'transport'   => '運費',
	    		'quantity'    => '數量',
	    		'chstyle'     => '使用Json格式',
	    		'detail'      => '商品說明',
	    		'norm'        => '使用Json格式',
	    		'memo'        => '備註',
	    	],
	    ],

	    'updateImages' => [
	    	'searchImages' => '搜尋到的圖檔',
	    	'updateImages' => '將上傳的圖檔',
	    	'c' => [
	    		'FileName'         => '圖檔名稱',
	    		'ImagesUpdateFile' => '欲上傳的檔案',
	    	],
	    ],

	];

