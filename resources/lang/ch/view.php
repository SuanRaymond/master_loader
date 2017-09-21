<?php
	/**
	 * b  => 按鈕
	 * th => 欄位名稱
	 * cl => 控制項的標籤
	 * ca => 控制項的預設說明
	 */
	return [
		'title'    => 'FunMugle',
		'account'  => '手机号码',
		'password' => '密码',
		'plzenter' => '请输入',
		'and'      => '或',
		'confirm'  => '确认',
		'cancel'   => '取消',
		'update'   => '上傳',
		'nodata'   => '没有任何资料喔！',
		'shophome' => '首页',
		'sort'     => '分类',
		'shopcar'  => '购物车',
		'mfile'    => '我的',

		//===入口網站====入口網站====入口網站====入口網站====入口網站====入口網站====入口網站===
		'memberMenu' => [
			'nickName' => '昵称：',
			'share'    => '推荐码：',
			'points'   => 'PP：',
			'integral' => '金蛋：',
			'bonus'    => '赠送红利：',
			'logout'   => '登出',
			'login'    => '登入',
		],
		'homemenu' =>[
			'MFile'  => '会员中心',
			'returnhome' =>'返回入口',
			'closemenu' => '关闭选单',
		],

		'login' => [
			'headerTitle' => '登入',
			'subTitle'    => '请先登入',
			'b' => [
				'login'  => '登&nbsp;&nbsp;&nbsp;&nbsp;入',
				'other'  => '其&nbsp;他&nbsp;选&nbsp;项',
				'forget' => '忘&nbsp;记&nbsp;密&nbsp;码',
				'create' => '创&nbsp;建&nbsp;帐&nbsp;号',
			],
		],

		'registered' => [
			'headerTitle' 	=> '注册',
			'phone'         => '请输入手机号',
			'nickName'      => '请输入昵称',
			'mail'          => '请输入信箱（非必填)',
			'passowrd'      => '请输入密码',
			'passwordCheck' => '请输入密码确认',
			'recommendL'    => '推荐码',
			'recommend'     => '请输入推荐码（数字)',
			'check'         => '请输入上方图案内的文字',
			'b' => [
				'registered'  => '注&nbsp;&nbsp;&nbsp;&nbsp;册',
			],
		],


		'home' => [
			'headerTitle' => 'FunMugle',
			'b' => [
				'quickTask' => '每日任务',
				'quickShop' => '购物',
				'quickresume' => '公司简介',
				'quickstory' => '品牌故事',
			],
		],
		//===入口網站====入口網站====入口網站====入口網站====入口網站====入口網站====入口網站===

		//===購物網站====購物網站====購物網站====購物網站====購物網站====購物網站====購物網站===
		'Shop' => [
			'headerTitle' => '购物平台',
			'b' => [
				'more' => '查看更多',
			],
		],

		'ShopDetail' => [
			'headerTitle' => '商品资讯',
			'price'       => '购买',
			'transport'   => '运费',
			'bdate'		  => '上架时间',
			'b' => [
				'detail' => '详细资讯',
				'norm'   => '规格',
				'memo'   => '备注',
				'addCar' => '加入购物车',
				'buyNow' => '立即购买',
			],
		],

		'shopCar' => [
			'headerTitle'  => '购物车',
			'productTitle' => '产品',
			'totalMoney'   => '总金额',
			'priceTitle'   => '价格',
			'b' => [
				'Checkout' => '结帐'
			],
			'th' => [
				'productMoney'      => '金额',
				'productFare'       => '运费',
				'productPoint'      => '点数',
				'productQuantity'   => '数量',
				'productStyle'      => '样式',
				'productTotalPoint' => '可获得PP',
			]
		],
		'shopBuy' =>[
			'memberTitle'   => '买家资讯',
			'memberName'    => '收货人',
			'memberPhone'   => '联络电话',
			'memberAddress' => '地址',
			'b' => [
				'buy' => '付款'
			],
		],
		//===購物網站====購物網站====購物網站====購物網站====購物網站====購物網站====購物網站===

		//===會員中心====會員中心====會員中心====會員中心====會員中心====會員中心====會員中心===
		'MFile' => [
			'MFileTitle'  => '会员中心',
			'b' => [
				'CMFile' => '修改资料',
				'cancel' => '取消',
				'CPwd'   => '修改密码',
				'BuyList'=> '订单查询',
			],
			'th' => [
				'memberid'   => '推荐码',
				'account'    => '帐号',
				'pwd'        => '密码',
				'points'     => 'PP',
				'integral'   => '金蛋',
				'bonus'      => '赠送红利',
				'name'       => '昵称',
				'mail'       => '电子邮箱',
				'address'    => '地址',
				'birthday'   => '生日',
				'year'       => '西元',
				'years'      => '年',
				'month'      => '月',
				'day'        =>'日',
				'gender'     => '性别',
				'language'   => '语言',
				'cardnumber' => '银行卡号',
				'upID'       => '上层会员码',
			],
			'cl' =>[
				'man'    => '男',
				'woman'  => '女',
				'ENUS'   => 'English',
				'ZHCN'   => '简体中文',
				'ZHTW'   => '繁体中文',
			],

		],
		'CMFile' => [
			'CMFileTitle'  => '修改会员资料',
			'CMFileremark' => '*为必填',
			'b' => [
				'save'   => '储存',
				'cancel' => '取消',
			],
			'th' => [
				'name'       => '昵称',
				'mail'       => '电子邮箱',
				'address'    => '地址',
				'birthday'   => '生日',
				'year'       => '西元',
				'years'      => '年',
				'month'      => '月',
				'day'        =>'日',
				'gender'     => '性别',
				'language'   => '语言',
				'cardnumber' => '银行卡号'
			],
			'cl' =>[
				'select' => '选择',
				'man'    => '男',
				'woman'  => '女',
				'ENUS'   => 'English',
				'ZHCN'   => '简体中文',
				'ZHTW'   => '繁体中文',
			],

		],
		'CPwd' => [
			'CPwdTitle' => '修改密码',
			'ca' => [
				'oldpwd'   => '旧密码',
				'newpwd'   => '新密码',
				'renewpwd' => '新密码确认',
			],
		],
		'CheckCode' =>[
			'Title'  => '帐号验证',
			'remark' => '可重新发送验证码时间：',
			'b' =>[
				'resend'  => '重新发送',
				'CheckOK' => '认证',
			],
			'ca'     =>[
				'Checkplaceholder' => '请输入验证码（不区分英文字母大小写）',
			],
		],
		'BuyList' =>[
			'BuyListTitle' => '购买清单',
			'b' =>[
				'back' => '回首页',
			],
			'th' =>[
				'shoporderID' => '单号 ',
				'status0'     => '已下单',
				'status1'     => '已付款',
				'status2'     => '交易完成',
				'bDate'       => '购买日期 ',
			],

		],
		//===會員中心====會員中心====會員中心====會員中心====會員中心====會員中心====會員中心===

		//===任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面===
		'Task' =>[
			'TitleListName'   => '套餐名称',
			'TitleListPoints' => '所需PP',
			'TitleListEgg'    => '最高获得<br>金蛋',
			'MemberPoints'    => '目前PP：',
			'th' =>[
				'ListName1' => '藏蛋套餐A',
				'ListName2' => '藏蛋套餐B',
				'ListName3' => '藏蛋套餐C',
				'ListName4' => '藏蛋套餐D',
			],
			'b' =>[
				'Buy'    => '购',
				'GoShop' => '前往商城',
			],
			'cl' =>[
				'SignName' => '每日签到',
				'GameName' => '每日小游戏',
				'SignDay' => '连续 ',
				'badge1' => '已完成',
				'badge0' => '未完成',
			],
		],
		'games' =>[
			'b' =>[
				'send' => '兑',
			],
		],
		'sign' =>[
			'b' =>[
				'send' => '签',
			],
		],
		//===任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面===

		//===後台頁面====後台頁面====後台頁面====後台頁面====後台頁面====後台頁面====後台頁面===
		'manager' => [
			'c'                         => [
		        'title'                 => '搜寻工具',
		        'account'        	    => '会员账号',
		        'row'                   => '行数',
		    ],
		    'b'                         => [
		        'send'                  => '送出',
		        'edit'                  => '编辑',
		        'search'                => '搜寻',
		        'clear'                 => '清除',
		        'enabled'               => '已启用',
		        'disabled'              => '未启用',
		        'close'                 => '关闭',
		        'cancel'                => '取消',
		        'confirm'               => '确认',
		    ],
		    's' => [
		    	'0' => '未選擇',
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
		            'title'             => '基本数据',
		            'key'               => '项目',
		            'value'             => '内容',
		            'nickName'          => '昵称',
		            'account'           => '账号',
		            'password'          => '密码',
		            'currency'          => '币别',
		            'points'            => '账户余额',
		            'group'             => '所属群组',
		            'ip'                => '登入IP',
		            'position'          => '登入位置',
		            'browser'           => '登入装置',
		            'cDate'             => '最近登入时间',
		            'bDate'             => '注册日期',
		            'edit'              => '修改',
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
		],

	];

