@extends('manager.layout.layout')

@section('cssImport')
<link href="./lib/css/manager/trumbowyg.min.css" rel="stylesheet" type="text/css"/>
@stop

@section('jsImport')
<script src="./lib/js/manager/trumbowyg.min.js" type="text/javascript"></script>
<script src="./lib/js/manager/zh_cn.min.js" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $("#InsertDetailArea").trumbowyg({
        lang: 'zh_cn'
      });
      $("#InsertMemoArea").trumbowyg({
        lang: 'zh_cn'
      });

      $("#insertBtn").click(function(){
        $("#detail").val($('#InsertDetailArea').trumbowyg('html'));
        $("#memo").val($('#InsertMemoArea').trumbowyg('html'));
        $("#InserForm").submit();
      });

      $("#searchBtn").click(function(){
        RaySys.AJAX.Send({ShopID: $("#sShopID").val()}, '/ajax/GetShop', 'ShopSuFun', 'ShopErFun');
      });
    });

    function ShopSuFun(_obj){
        console.log(_obj);
        RaySys.Alert.Timer("{{ trans('message.onWaited') }}", "{{ trans('message.onLoadSuc') }}", 1, 1000);
        $("#ImagesDemo").prop("src", _obj.ResultJSON.data.images);
        $("#ImagesTitleDemo").html(_obj.ResultJSON.data.title);
        $("#shopID").val(_obj.ResultJSON.data.shopID);
        $("#title").val(_obj.ResultJSON.data.title);
        $("#subTitle").val(_obj.ResultJSON.data.subtitle);
        $("#imagesTitle").val(_obj.ResultJSON.data.imagestitle);
        $("#imagesShow").val(_obj.ResultJSON.data.imagesshow);
        //$("#menuID").val(_obj.ResultJSON.data.menuID);
        $("#price").val(_obj.ResultJSON.data.price);
        $("#points").val(_obj.ResultJSON.data.points);
        $("#transport").val(_obj.ResultJSON.data.transport);
        $("#quantity").val(_obj.ResultJSON.data.quantity);
        $("#chstyle").val(_obj.ResultJSON.data.style);
        //$("#detail").val(_obj.ResultJSON.data.detail);
        $("#norm").val(_obj.ResultJSON.data.norm);
        //$("#memo").val(_obj.ResultJSON.data.memo);
    }
    function ShopErFun(_obj){
        console.log(_obj);
      RaySys.Alert.Timer("{{ trans('message.onWaited') }}", "{{ trans('message.onLoadErr') }}", 2, 1000);
      $("#ImagesDemo").prop("src", "{{ $box->baseImg }}");
      $("#ImagesTitleDemo").html("");
      $("#shopID").val("");
      $("#title").val("");
      $("#subTitle").val("");
      $("#imagesTitle").val("");
      $("#imagesShow").val("");
      //$("#menuID").val("");
      $("#price").val("");
      $("#points").val("");
      $("#transport").val("");
      $("#quantity").val("");
      $("#chstyle").val("");
      //$("#detail").val("");
      $("#norm").val("");
      //$("#memo").val("");
    }

  </script>
@stop

@section('content')
  <div class="span12">
    <div class="portlet box red">
      <div class="portlet-title" id="toolsBar">
        <div class="caption"><i class="icon-search"></i>{{ trans('managerView.c.title') }}</div>
        <div class="tools">
          <a href="javascript:;" class="collapse" id="toolsClose"></a>
        </div>
      </div>
      <div class="portlet-body">
        <form class="form-horizontal" id="searchForm">
          <div class="row-fluid">
            <div class="span12">
                            <div class="control-group">
                                <label class="control-label" for="sShopID">{{ trans('managerView.updateShop.s.shopID') }} ：</label>
                                <div class="controls">
                                  <input type="text" class="m-wrap span12" name="sShopID" id="sShopID"
                                         placeholder="{{ trans('managerView.updateShop.s.shopID') }}" value="">
                               </div>
                            </div>
                        </div>
                    </div>
                  <div class="row-fluid">
            <div class="span12 pull-right">
                            <button class="btn green pull-right" type="button" id="searchBtn">
                                <i class="icon-search"></i> {{ trans('managerView.b.search') }}
                            </button>
                            <button class="btn red pull-right" type="button" id="clearBtn">
                              <i class="icon-trash"></i> {{trans('managerView.b.clear') }}
                            </button>
                        </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="portlet box green">
    <div class="portlet-title">
      <div class="caption"><i class="icon-cogs"></i>{{ trans('managerView.updateShop.searchImages') }}</div>
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
      <div class="caption"><i class="icon-cogs"></i>{{ trans('managerView.updateShop.title') }}</div>
      <div class="tools">
        <a href="javascript:;" class="collapse"></a>
      </div>
    </div>
    <div class="portlet-body">
      <form class="form-horizontal" action="UpdateShop" method="post" id="InserForm">
        {{ csrf_field() }}
        <div class="row-fluid">
          <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="shopID">{{ trans('managerView.updateShop.s.shopID') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="shopID" id="shopID"
                                 placeholder="{{ trans('managerView.updateShop.s.shopID') }}"
                                 value="{{ $box->params->shopID }}" readonly="true">
                           </div>
                        </div>
                    </div>
                </div>
        <div class="row-fluid">
          <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="title">{{ trans('managerView.updateShop.c.title') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="title" id="title"
                                       placeholder="{{ trans('managerView.updateShop.p.title') }}"
                                       value="{{ $box->params->title }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="subTitle">{{ trans('managerView.updateShop.c.subTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="subTitle" id="subTitle"
                                       placeholder="{{ trans('managerView.updateShop.p.subTitle') }}"
                                       value="{{ $box->params->subTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesTitle">{{ trans('managerView.updateShop.c.imagesTitle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesTitle" id="imagesTitle"
                                       placeholder="{{ trans('managerView.updateShop.p.imagesTitle') }}"
                                       value="{{ $box->params->imagesTitle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="imagesShow">{{ trans('managerView.updateShop.c.imagesShow') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="imagesShow" id="imagesShow"
                                       placeholder="{{ trans('managerView.updateShop.p.imagesShow') }}"
                                       value="{{ $box->params->imagesShow }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="menuID">{{ trans('managerView.updateShop.c.menuID') }} ：</label>
                            <div class="controls">
                                <select class="m-wrap span12" name="menuID" id="menuID">
                  <option value="">{{ trans('managerView.s.0') }}</option>
                  <option value="1001" {!! $box->params->menuID == 1001 ? 'selected="true"' : '' !!}>
                    {{ trans('menu.menu.1001') }}
                  </option>
                  <option value="2001" {!! $box->params->menuID == 2001 ? 'selected="true"' : '' !!}>
                    {{ trans('menu.menu.2001') }}
                  </option>
                </select>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="price">{{ trans('managerView.updateShop.c.price') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="price" id="price"
                                       placeholder="{{ trans('managerView.updateShop.p.price') }}"
                                       value="{{ $box->params->price }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="points">{{ trans('managerView.updateShop.c.points') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="points" id="points"
                                       placeholder="{{ trans('managerView.updateShop.p.points') }}"
                                       value="{{ $box->params->points }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="transport">{{ trans('managerView.updateShop.c.transport') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="transport" id="transport"
                                       placeholder="{{ trans('managerView.updateShop.p.transport') }}"
                                       value="{{ $box->params->transport }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="quantity">{{ trans('managerView.updateShop.c.quantity') }} ：</label>
                            <div class="controls">
                                <input type="number" class="m-wrap span12" name="quantity" id="quantity"
                                       placeholder="{{ trans('managerView.updateShop.p.quantity') }}"
                                       value="{{ $box->params->quantity }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="chstyle">{{ trans('managerView.updateShop.c.chstyle') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="chstyle" id="chstyle"
                                       placeholder="{{ trans('managerView.updateShop.p.chstyle') }}"
                                       value="{{ $box->params->chstyle }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertDetailArea">{{ trans('managerView.updateShop.c.detail') }} ：</label>
                            <div class="controls">
                              <input type="hidden" name="detail" id="detail">
                                <div id="InsertDetailArea"></div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="norm">{{ trans('managerView.updateShop.c.norm') }} ：</label>
                            <div class="controls">
                                <input type="text" class="m-wrap span12" name="norm" id="norm"
                                       placeholder="{{ trans('managerView.updateShop.p.norm') }}"
                                       value="{{ $box->params->norm }}">
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
                    <div class="span12">
                        <div class="control-group">
                            <label class="control-label" for="InsertMemoArea">{{ trans('managerView.updateShop.c.memo') }} ：</label>
                            <div class="controls">
                              <input type="hidden" name="memo" id="memo">
                                <div id="InsertMemoArea"></div>
                           </div>
                        </div>
                    </div>
                </div>
                <div class="row-fluid">
          <div class="span12 pull-right">
                        <button class="btn green pull-right" type="button" id="insertBtn">
                            <i class="icon-upload-alt"></i> {{trans('managerView.confirm') }}
                        </button>
                    </div>
        </div>
        </form>
    </div>
  </div>
@stop





