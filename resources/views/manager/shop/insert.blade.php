@extends('manager.layout.layout')

@section('cssImport')
@stop

@section('jsImport')
	<script type="text/javascript">
		$(function(){
			$("#phtoUpdate").change(function(){
				run(this, function (data){
					$("#phtoImg").attr("src", data);
					$("#phtoArea").val(data);
				});
			});
		});

		function run(input_file, get_data){
			/*input_file：文件按鈕對象*/
			/*get_data: 轉換成功後執行的方法*/
			if(typeof(FileReader) === 'undefined'){
				alert("抱歉，你的浏覽器不支持 FileReader，不能將圖片轉換為Base64，請使用現代浏覽器操作！");
			}
			else{
				try{
					/*圖片轉Base64 核心代碼*/
					var file = input_file.files[0];
					//這裡我們判斷下類型如果不是圖片就返回 去掉就可以上傳任意文件
					if(!/image\/\w+/.test(file.type)){
					alert("請確保文件為圖像類型");
					return false;
					}
					var reader = new FileReader();
					reader.onload = function(){
					get_data(this.result);
					}
					reader.readAsDataURL(file);
				}
				catch (e){
					alert('圖片轉Base64出錯啦！'+ e.toString())
				}
			}
		}
	</script>
@stop

@section('content')
	<input type="file" id="phtoUpdate">
	<hr>
	<img style="max-height: 300px; height: 8em; min-width:8em;" id="phtoImg">
	<hr>
	<textarea style="display: block; width: 100%;height: 30em;" id="phtoArea"></textarea>
@stop




