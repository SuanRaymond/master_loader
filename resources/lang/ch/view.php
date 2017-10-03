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
			'shareInfo'=> '推荐資訊（点我）',
			'shareUrl' => '推荐網址：',
			'sharCopy' => '点我复制推荐网址',
			'share'    => '推荐码：',
			'nickName' => '昵称：',
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
			'check'         => '请输入上方图案内的数字',
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
				'AddressList'=> '我的收货地址',
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
				'Checkplaceholder' => '请输入验证码（6位皆为数字）',
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
				'price'       => '单价 ',
				'quantity'    => '数量 ',
				'totalprice'  => '总价 ',
				'totalpoints' => '总PP ',
				'bDate'       => '购买日期 ',
			],

		],
		'AddressList' =>[
            'AddressListTitle'   => '管理收货地址',
            'NewAddressTitle'    => '新增收货地址',
            'UpdateAddressTitle' => '编辑收货地址',
            'SelectAddressTitle' => '选择收货地址',
            'b' =>[
                'cancel'     => '取消',
                'update'     => '编辑',
                'delete'     => '删除',
                'confirm'    => '确认',
                'back'       => '返回',
                'select'     => '选择',
                'goaddress'  => '我的收货地址',
                'newaddress' => '新增地址',
            ],
            'th' =>[
                'Prompt'    => '全部字段皆必填',
                'addressee' => '收货人',
                'phone'     => '联系电话',
                'address'   => '送货地址',
                'main'      => '设为默认',
                'yes'       => '是',
                'no'        => '否',
                'showmain'  => '默认地址',
                'phonebr'   => '联系<br>电话',
                'addressbr' => '送货<br>地址',
            ],

        ],
		//===會員中心====會員中心====會員中心====會員中心====會員中心====會員中心====會員中心===

		//===任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面====任務頁面===
		'Task' =>[
			'TitleListName'   => '藏蛋名称',
			'TitleListPoints' => '所需PP',
			'TitleListEgg'    => '最高获得<br>金蛋',
			'MemberPoints'    => '目前PP：',
			'th' =>[
				'ListName1' => '藏蛋A',
				'ListName2' => '藏蛋B',
				'ListName3' => '藏蛋C',
				'ListName4' => '藏蛋D',
			],
			'b' =>[
				'Buy'    => '藏',
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


	];

