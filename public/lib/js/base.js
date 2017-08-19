var RaySys = {};
RaySys.LanguageObj = {};

/**
 * 字串類別的處理
 * RaySys.Str
 * -----------------------------------------
 * LTrin  = 去左空白
 * Trin   = 去左右空白
 * RTrin  = 去右空白
 * Return = 去段行
 * -----------------------------------------
 * LGet = 取出左邊字串(字串,數量)
 * CGet = 取出中間字串(字串,數量)
 * RGet = 取出右邊字串(字串,數量)
 * MGet = 取出左右邊字串(字串,數量,分隔字串)
 * Get  = 取出的共用function
 * -----------------------------------------

 * 字串類別的驗證
 * RaySys.Validate
 * -----------------------------------------
 * Int     = 是否為純數字
 * Flo     = 是否為含有小數點的數字
 * Str     = 是否為純英文
 * StoI    = 是否為英文或數字
 * ChStr   = 是否為純中文
 * Phone   = 是否為十碼電話0900-000000
 * Email   = 是否為電子信箱abc@abc.com
 * Special = 是否為英文或數字或中文
 * Check   = 驗證的共用function

 * -----------------------------------------
 * 字串類別的變形
 * RaySys.Deform
 * Upper     = 轉換成大寫
 * Lower     = 轉換成小寫
 * Merger    = 字串分割(字串,數量,分隔字串)1234567890 -> 123,456,789,0
 * Split     = 字串取得--陣列輸出(字串,分隔字串)123,456,789,0 -> 陣列
 * Substring = 取出指定標的內的字串(主字串,開始標的,結束標的)
 * SringINt  = 字串與數值自動轉換
 * Request   = 取得網址列參數

 * -----------------------------------------
 * 字串類別的存取
 * RaySys.SL.Session
 * Set   = 存入Session(名稱,值)
 * Get   = 存入Session(名稱)
 * Clear = 清除Session

 * -----------------------------------------
 * 訊息輸出
 * RaySys.Alert
 * Log   = console
 * Fixet = 不可取消的視窗(標題,訊息,狀態)
 * Check = 再次確認的視窗(標題,訊息,狀態,確認按鈕的文字,取消按鈕的文字,按下確認後所要執行的函數)
 * Status = 狀態：0：訊息、1：成功、2：錯誤、3：警告

 * -----------------------------------------
 * AJAX 訪問
 * RaySys.AJAX
 * Send = 送出(資料(請使用object),目標路徑,成功後要呼叫的函式,失敗後要呼叫的函式)
 */
RaySys = {
    LanguageObj:{},
    Str:{
        LTrin:function(InString){
            return String(InString).replace(/^\s+/,'');
        },
        Trin:function(InString){
            return String(InString).replace(/^\s+|\s+$/g,'');
        },
        RTrin:function(InString){
            return String(InString).replace(/\s+$/,'');
        },
        Return:function(InString){//看段行
            return String(InString).replace(/\r\n/g,'');
        },
        LGet:function(InString,n){
            return this.Get(InString,n,"","LGet");
        },
        CGet:function(InString,n){
            return this.Get(InString,n,"","CGet");
        },
        RGet:function(InString,n){
            return this.Get(InString,n,"","RGet");
        },
        MGet:function(InString,n,Mark){//分割
            return this.Get(InString,n,Mark,"MGet");
        },
        Get:function(InString,n,Mark,Switch){
            InString=String(InString),n=parseInt(n),Mark=String(Mark||"O"),Switch=String(Switch);
            if(!((n<=0)||(n>InString.length))){
                if(Switch=="LGet"){InString=InString.substring(0,n);}
                if(Switch=="CGet"){InString=InString.substr(Math.floor((InString.length-n)/2),n);}
                if(Switch=="RGet"){InString=InString.substr((InString.length)-n,n);}
                if(Switch=="MGet"){InString=InString.substring(0,n)+Mark+InString.substr((InString.length)-n,n);}
            }
            return InString;
        }
    },
    Validate:{
        Int:function(InString){
            return this.Check(InString,String(InString).match(/^[0-9]+/));
        },
        Flo:function(InString){
            return this.Check(InString,String(InString).match(/^[0-9]+.[0-9]+/));
        },
        Str:function(InString){
            return this.Check(InString,String(InString).match(/^[A-Za-z]+/));
        },
        StoI:function(InString){
            return this.Check(InString,String(InString).match(/^[A-Za-z0-9]+/));
        },
        ChStr:function(InString){
            return this.Check(InString,String(InString).match(/^[\u0391-\uFFE5]+$/));
        },
        Phone:function(InString){
            return this.Check(InString,String(InString).match(/^[0-9]{4}-[0-9]{6}/));
        },
        Email:function(InString){
            return this.Check(InString,String(InString).match(/^[a-zA-Z0-9_]+@[a-zA-Z0-9._]+/));
        },
        Special:function(InString){
            return this.Check(InString,String(InString).match(/^[A-Za-z0-9\u0391-\uFFE5]+/));
        },
        Check:function(InString,StringTemp){
            if(String(StringTemp).length==String(InString).length&&StringTemp!=null){InString = true;}else{InString = false;}
            return InString;
        }
    },
    Deform:{
        Upper:function(InString){
            return String(InString).toUpperCase();
        },
        Lower:function(InString){
            return String(InString).toLowerCase();
        },
        Merger:function(Input_String,n,Mark){
            Input_String=String(Input_String),Mark=String(Mark),n=parseInt(n);
            var Output_String=Input_String;
            if(!(n>=Input_String.length)){
                Output_String="";
                for(var i=0;i<Input_String.length;i=i+n){
                    Output_String = Output_String + Mark + Input_String.slice(i,(i + n));
                }
                Output_String = Output_String.replace(Mark, "");
            }
            return Output_String;
        },
        Split:function(InString,Mark){
            InString=String(InString),Mark=String(Mark);
            var Output_Arry=[];
            for(var x=0;x<InString.length;x++){
                if(InString.search(Mark)<0){
                    Output_Arry[x]=InString.replace(Mark,"");
                    break;
                }
                Output_Arry[x]=InString.substring(0,InString.search(Mark));
                InString=InString.replace(Output_Arry[x]+Mark,"");
            }
            return Output_Arry;
        },
        Substring:function(InString,_SStr,_EStr){
            var StrNum = InString.indexOf(_SStr,0);
            return InString.substring(StrNum,(InString.indexOf(_EStr,StrNum+1)) + _EStr.length);
        },
        SringINt:function(InString){
            InString=String(InString);
            var StringTemp=InString.match(/^[0-9]+/);
            if(((InString==""||InString==null||InString==NaN)&& InString.length!=0)||(StringTemp.length!=Input_Data.length||StringTemp==null)){
                return "";
            }
            if(typeof Input_Data=='number'){
                var Output_String=Input_Data.toString();
                return Output_String;
            }
            else if(typeof Input_Data=='string'){
                var Output_String=parseInt(Input_Data);
                return Output_String;
            }
        },
        Request:function(){
            return location.search.replace("?","");
        },
    },
    SL:{
        Session:{
            Set:function(_Name,_Value){
                var WinObj=window.top||window;var SessionStr=WinObj.name;var ResultStr='';if(SessionStr!=''){var SessionBox=SessionStr.split('&');var IsFind=false;for(var i=0;i<SessionBox.length;i++){var ValueBox=SessionBox[i].split('=');if(ValueBox[0]==_Name){ValueBox[1]=_Value;IsFind=true;}if(ResultStr==''){ResultStr=ValueBox[0]+'='+ValueBox[1];}else{ResultStr=ResultStr+'&'+ValueBox[0]+'='+ValueBox[1];}}if(!IsFind){if(ResultStr==''){ResultStr=_Name+'='+_Value;}else{ResultStr=ResultStr+'&'+_Name+'='+_Value;}}}else{ResultStr=_Name+'='+_Value;}WinObj.name=ResultStr;
            },
            Get:function(_Name){
                var WinObj=window.top||window;var bFind=false;var SessionStr=WinObj.name;if(SessionStr!=''){var SessionBox=SessionStr.split('&');for(var i=0;i<SessionBox.length;i++){var ValueBox=SessionBox[i].split('=');if(ValueBox[0]==_Name){return ValueBox[1];bFind=true;break;}}if(!bFind){return '';}}else{return '';}
            },
            Clear:function(){
                var WinObj=window.top||window;WinObj.name='';
            }
        }
    },
    Alert:{
        Log:function(_Value){
            console.log(_Value);
        },
        Fixet:function(_Title, _Msg, _Status){
            _Status = this.Status(_Status);
            swal({
                title: _Title,
                text: _Msg,
                type: _Status,
                allowEscapeKey: false,
                showCancelButton: false,
                closeOnConfirm: false,
                showConfirmButton: false,
                showLoaderOnConfirm: true
            });
        },
        Check:function(_Title, _Msg, _Status, _ConfirmButtonText, _CancelButtonText, _Function){
            if(_Function === null){
                _Function = function(){};
            }
            _Status = this.Status(_Status);
            swal({
                title: _Title,
                text: _Msg,
                type: _Status,
                html: true,
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                closeOnConfirm: false,
                confirmButtonText: _ConfirmButtonText,
                cancelButtonText: _CancelButtonText
            },
            _Function
            );
        },
        Loading:function(){
            swal({
                title: "跳转中<img src='../../images/loadertitle.gif'><br>Loading<img src='../../images/loadertitle.gif'>",
                text: "",
                type: "",
                html: true,
                allowEscapeKey: false,
                showCancelButton: false,
                closeOnConfirm: false,
                showConfirmButton: false,
                showLoaderOnConfirm: false
            });
        },
        Status:function(_Status){
            if(_Status == 0){
                return 'info';
            }
            else if(_Status == 1){
                return 'success';
            }
            else if(_Status == 2){
                return 'error';
            }
            else if(_Status == 3){
                return 'warning';
            }
            else{
                return "";
            }
        },
    },
    AJAX:{
        Send:function(_Data, _Url, _SuFunName, _ErFunName){
            $.ajax({
                type: 'POST',
                url:  _Url,
                data: _Data,
                dataType: 'json',
                success: function(ResultJSON){
                    var fun;
                    if(ResultJSON.result != "SU"){
                        fun = window[_ErFunName];
                    }else{
                        fun = window[_SuFunName];
                    }
                    _Data.ResultJSON = ResultJSON;
                    if(typeof fun == "function"){
                        fun.apply(window, [_Data]);
                    }
                }
            });
        }
    }
};







$(document).ready(function(){
    // var Lang = RaySys.SL.Session.Get("Language");
    // if(Lang == ""){
    //     RaySys.SL.Session.Set("Language", "tw");
    //     Lang = "tw";
    // }
    // $.getScript('./lang/' + Lang + "/view.js", function(data, textStatus, jqxhr){
    //     $(".Rstr").each(function(){
    //         var html  = $(this).html();
    //         var ReKey = RaySys.Deform.Substring(html, "@@", "@@");
    //         var LnKey = ReKey.replace("@@", "").replace("@@", "");
    //         html      = html.replace(ReKey, RaySys.LanguageObj[LnKey]);
    //         $(this).html(html);
    //     });
    // });

    $(".span1").addClass("col-xs-1 col-sm-1 col-md-1 col-lg-1");
    $(".span2").addClass("col-xs-2 col-sm-2 col-md-2 col-lg-2");
    $(".span3").addClass("col-xs-3 col-sm-3 col-md-3 col-lg-3");
    $(".span4").addClass("col-xs-4 col-sm-4 col-md-4 col-lg-4");
    $(".span5").addClass("col-xs-5 col-sm-5 col-md-5 col-lg-5");
    $(".span6").addClass("col-xs-6 col-sm-6 col-md-6 col-lg-6");
    $(".span7").addClass("col-xs-7 col-sm-7 col-md-7 col-lg-7");
    $(".span8").addClass("col-xs-8 col-sm-8 col-md-8 col-lg-8");
    $(".span9").addClass("col-xs-9 col-sm-9 col-md-9 col-lg-9");
    $(".span10").addClass("col-xs-10 col-sm-10 col-md-10 col-lg-10");
    $(".span11").addClass("col-xs-11 col-sm-11 col-md-11 col-lg-11");
    $(".span12").addClass("col-xs-12 col-sm-12 col-md-12 col-lg-12");

});


