@extends('manager.layout.layout')

@section('cssImport')
@stop

@section('jsImport')
	<script type="text/javascript">
		$(document).ready(function(){
            $("#searchBtn").click(function(){
                RaySys.AJAX.Send({FileName: $("#FileName").val()}, '/ajax/GetImages', 'ImagesSuFun', 'ImagesErFun');
            });
            $("#ImagesUpdateFile").change(function(){
				ImgToBase64(this, function(data){
					$("#ImagesUpdateDemo").attr("src", data);
					$("#ImagesUpdateValues").val(data);
				});
			});

			$("#ImagesUpdateBtn").click(function(){
				UpdateBase64();
			});
        });

		function UpdateBase64(){
			var ImgBase64 = $("#ImagesUpdateValues").val();
			var ImgName = $("#UpdateFileName").val();
			if(ImgBase64 != '' && ImgBase64 != "{{ $box->baseImg }}"){
				if(ImgName != ''){
					RaySys.AJAX.Send({
	            		FileName: ImgName,
	            		File: ImgBase64
	            	}, '/ajax/InsertImages', 'ImagesSuFun', 'ImagesErFun');
				}
				else{
					swal("{{ trans('error.manager.images.title') }}");
				}
			}
			else{
				swal("{{ trans('error.manager.images.null') }}");
			}
		}
		function ImgToBase64(input_file, get_data){
			/*input_file：文件按鈕對象*/
			/*get_data: 轉換成功後執行的方法*/
			if(typeof(FileReader) === 'undefined'){
				alert("{{ trans('message.browserLow') }} FileReader");
			}
			else{
				try{
					/*圖片轉Base64 核心代碼*/
					var file = input_file.files[0];

					//這裡我們判斷下類型如果不是圖片就返回 去掉就可以上傳任意文件
					if(!/image\/jpeg+/.test(file.type)){
						alert("請確保文件為圖像類型");
						return false;
					}

					// if(file.width > 800){
					// 	alert("請確保文件為圖像類型w");
					// }
					// else if(file.height > 800){
					// 	alert("請確保文件為圖像類型h");
					// }

					var reader = new FileReader();
					reader.onload = function(){
						get_data(this.result);
					}
					reader.readAsDataURL(file);
				}
				catch(e){
					// alert('圖片轉Base64出錯啦！'+ e.toString())
				}
			}
		}
        function ImagesSuFun(_obj){
		    console.log(_obj);
        	RaySys.Alert.Timer("{{ trans('message.onWaited') }}", "{{ trans('message.onLoadSuc') }}", 1, 1000);
        	$("#ImagesDemo").prop("src", _obj.ResultJSON.data.images);
        	$("#ImagesTitleDemo").html(_obj.ResultJSON.data.title);
		}
		function ImagesErFun(_obj){
		    console.log(_obj);
			RaySys.Alert.Timer("{{ trans('message.onWaited') }}", "{{ trans('message.onLoadErr') }}", 2, 1000);
			$("#ImagesDemo").prop("src", "{{ $box->baseImg }}");
			$("#ImagesTitleDemo").html("");
		}
	</script>
@stop

@section('content')
	<div class="span12">
		<div class="portlet box red">
			<div class="portlet-title" id="toolsBar">
				<div class="caption"><i class="icon-search"></i>{{ trans('view.manager.c.title') }}</div>
				<div class="tools">
					<a href="javascript:;" class="collapse" id="toolsClose"></a>
				</div>
			</div>
			<div class="portlet-body">
				<form class="form-horizontal" id="searchForm">
					<div class="row-fluid">
						<div class="span12">
                            <div class="control-group">
                                <label class="control-label" for="FileName">{{ trans('view.manager.updateImages.c.FileName') }} ：</label>
                                <div class="controls">
	                                <input type="text" class="m-wrap span12" name="FileName" id="FileName"
	                                       placeholder="{{ trans('view.manager.updateImages.c.FileName') }}" value="">
                               </div>
                            </div>
                        </div>
						<div class="span12 pull-right">
                            <button class="btn green pull-right" type="button" id="searchBtn">
                                <i class="icon-search"></i> {{ trans('view.manager.b.search') }}
                            </button>
                            <button class="btn red pull-right" type="button" id="clearBtn">
                            	<i class="icon-trash"></i> {{trans('view.manager.b.clear') }}
                            </button>
                        </div>
					</div>
				</form>
			</div>
		</div>
	</div>

	<div class="portlet box green">
		<div class="portlet-title">
			<div class="caption"><i class="icon-cogs"></i>{{ trans('view.manager.updateImages.searchImages') }}</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"></a>
			</div>
		</div>
		<div class="portlet-body">
			<div class="row-fluid" align="center">
				<img src="{{ $box->baseImg }}"
				data-holder-rendered="true"
				style="max-height: 200px; max-width: 200px; display: block;"
				with="100%" height="100%"
				id="ImagesDemo">
				<h3 id="ImagesTitleDemo"></h3>
			</div>
		</div>
	</div>

	<div class="portlet box blue">
		<div class="portlet-title">
			<div class="caption"><i class="icon-cogs"></i>{{ trans('view.manager.updateImages.updateImages') }}</div>
			<div class="tools">
				<a href="javascript:;" class="collapse"></a>
			</div>
		</div>
		<div class="portlet-body">
			<form class="form-horizontal">
				<div class="row-fluid">
					<div class="span12">
		                <div class="control-group">
		                    <label class="control-label" for="ImagesUpdateFile">
		                    	{{ trans('view.manager.updateImages.c.ImagesUpdateFile') }} ：
		                    </label>
		                    <div class="controls">
		                        <input type="file" class="m-wrap span12" name="ImagesUpdateFile" id="ImagesUpdateFile"
		                               placeholder="{{ trans('view.manager.updateImages.c.ImagesUpdateFile') }}">
		                   </div>
		                </div>
		            </div>
		        </div>
		        <div class="row-fluid">
		            <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="UpdateFileName">{{ trans('view.manager.updateImages.c.FileName') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="UpdateFileName" id="UpdateFileName"
                                       placeholder="{{ trans('view.manager.updateImages.c.FileName') }}" value="">
                           </div>
                        </div>
                    </div>
                </div>
		        <div class="row-fluid">
		            <div class="span12 pull-right">
                        <button class="btn blue pull-right waitFrom" type="button" id="ImagesUpdateBtn">
                        	<i class="icon-upload-alt"></i> {{trans('view.update') }}
                        </button>
                    </div>
		        </div>
		    </form>
			<hr>
			<div class="row-fluid" align="center">
				<img src="{{ $box->baseImg }}"
				data-holder-rendered="true" style="max-height: 200px; max-width: 200px; display: block;"
				with="100%" height="100%" id="ImagesUpdateDemo">
			</div>
			<input class="hidden" type="text" id="ImagesUpdateValues">
		</div>
	</div>
@stop




