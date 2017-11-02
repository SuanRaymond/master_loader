@extends('layout.layout')

@section('cssImport')
@stop

@section('jsImport')
    <script type="text/javascript">
        $(document).ready(function(){
            $("#FPwd_Submit").click(function(){
                if($("#account").val()!=""&& $("#checkCode").val()!=""&& $("#PasswordN").val()!=""&& $("#PasswordA").val()!=""){
                    // 四個欄位皆填寫
                    if($("#PasswordN").val()== $("#PasswordA").val()){
                        // 兩次密碼皆相同
                        $("#FPwd_Form").submit();
                    }else{
                        swal("提示", "密码与密码确认不符", "info");
                    }
                }else{
                    swal("提示", "所有栏位皆必填", "info");
                }
            });
            $("#FPwd_getCheck").click(function(){
                $account = $("#account").val();
                console.log($account);
                if($account!=""){
                    swal({
                        title: "請稍候！",
                        text: "简讯发送中",
                        type:"",
                        closeOnConfirm: false,
                        showConfirmButton: false,
                        showLoaderOnConfirm: true,
                        timer: 500,
                    },
                    function(){
                        RaySys.AJAX.Send({account: $account}, '/ajax/GetCheckCodeSend', 'SuFun', 'ErFun');
                    });
                }else{
                    swal("提示", "请输入帐号", "info");
                }
            });
        });
        function SuFun(_obj){
            swal("成功", "简讯已发送完成，若无收到简讯请稍待3至5分钟。", "success");
            $(".showRemind").show();
        }
        function ErFun(_obj){
            swal("失败", _obj.ResultJSON.error, "error");
        }
    </script>
@stop

@section('content')

    <div class="span12" style="text-align: center;"><h1>{{ trans('view.FPwd.Title') }}</h1></div>
    <div class="span12">
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane fade in active" id="PhoneAccount">
                <br><br>
                <form method="post" id="FPwd_Form">
                {{ csrf_field() }}
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-phone"></span>
                        <input type="text" class="form-control" placeholder="{{ trans('view.FPwd.ca.account') }}" id="account" name="account">
                    </div><br>
                    <div class="input-group span12">
                        <a id="FPwd_getCheck" class="WaitingBtn button button-flat-primary button-large  button-block">{{ trans('view.FPwd.b.getCheck') }}</a>
                        <span class="showRemind" style="display: none; color: red;">{{ trans('view.FPwd.ca.showRemind') }}</span>
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="test" class="form-control" placeholder="{{ trans('view.FPwd.ca.check') }}" id="checkCode" name="checkCode">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.FPwd.ca.NPwd') }}" id="PasswordN" name="PasswordN">
                    </div><br>
                    <div class="input-group">
                        <span class="input-group-addon glyphicon glyphicon-lock"></span>
                        <input type="password" class="form-control" placeholder="{{ trans('view.FPwd.ca.NPwdAgain') }}" id="PasswordA" name="PasswordA">
                    </div><br>
                    <br>
                </form>
                <div class="span6">
                    <a id="FPwd_Submit" class="button button-flat-primary button-large  button-block" style="padding-left: 2px;padding-right: 2px;">{{ trans('view.FPwd.b.getNPwd') }}</a>
                </div>
                <div class="span6">
                    <a href="/Login" id="RegisteredClick" class="button button-flat-primary button-large  button-block">{{ trans('view.cancel') }}</a>
                </div>
            </div>
        </div>
    </div>
@stop

@section('contentBottom')
@stop