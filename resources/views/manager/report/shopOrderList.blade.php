@extends('manager.layout.layout')

@section('cssImport')
@stop

@section('jsImport')
	<script type="text/javascript">
		$(function(){
			$("#clearBtn").click(function(){
				$("#account").val("");
				$('#rowSelect')[0].selectedIndex = 0;
				$("#row").val("10");
				$("#adminDown").prop('checked', true).change();
			});

			@if(isset($box->result->bodyMine))
                $("#toolsClose").click();
            @endif

            $(".accountBtn").click(function(){
                $("#account").val($(this).val());
                $("#row").val("10");
                $("#searchForm").submit();
            });
		});
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
					{!! $box->ctrlHtml->row !!}
					<div class="row-fluid">
						{!! $box->ctrlHtml->account !!}
					</div>

					<div class="row-fluid">
						<div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="shopType">{{ trans('managerView.shopOrderList.cl.shopType') }}：</label>
                                <div class="controls">
                                    <div class="span10">
                                        <select class="span12 m-wrap" name="shopType" id="shopType">
                                            <option value="-1" {!! $box->params->shopType==-1 ? 'selected="true"' : '' !!} >
                                            	{{ trans('managerView.s.-1') }}
                                           	</option>
                                            <option value="0" {!! $box->params->shopType==0 ? 'selected="true"' : '' !!} >
                                            	{{ trans('managerView.shopOrderList.shopType.0') }}
                                            </option>
                                            <option value="1" {!! $box->params->shopType==1 ? 'selected="true"' : '' !!} >
                                            	{{ trans('managerView.shopOrderList.shopType.1') }}
                                            </option>
                                            <option value="2" {!! $box->params->shopType==2 ? 'selected="true"' : '' !!} >
                                            	{{ trans('managerView.shopOrderList.shopType.2') }}
                                            </option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
	                </div>
	                <div class="row-fluid">
						<div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="minPay">{{ trans('managerView.shopOrderList.cl.minPay') }}：</label>
                                <div class="controls">
                                    <div class="span10">
                                         <input type="number" class="m-wrap span10" name="minPay" id="minPay"
                                        placeholder="{{ trans('managerView.shopOrderList.cl.minPay') }}" value="{{ $box->params->minPay }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6">
                            <div class="control-group">
                                <label class="control-label" for="maxPay">{{ trans('managerView.shopOrderList.cl.maxPay') }}：</label>
                                <div class="controls">
                                    <div class="span10">
                                         <input type="number" class="m-wrap span10" name="maxPay" id="maxPay"
                                        placeholder="{{ trans('managerView.shopOrderList.cl.maxPay') }}" value="{{ $box->params->maxPay }}">
                                    </div>
                                </div>
                            </div>
                        </div>
	                </div>
					<div class="row-fluid">
						{!! $box->ctrlHtml->date !!}
					</div>
					<div class="row-fluid">
						{!! $box->ctrlHtml->btn !!}
					</div>
				</form>
			</div>
		</div>
	</div>

	@if(isset($box->result->body))
	    <div class="portlet box blue">
			<div class="portlet-title">
				<div class="caption"><i class="icon-cogs"></i>{{ trans('managerView.shopOrderList.t.title') }}</div>
				<div class="tools">
					<a href="javascript:;" class="collapse"></a>
				</div>
			</div>
			<div class="portlet-body no-more-tables">
				@if($box->result->body != '')
					@if(!is_null($box->result->pageTop))
		                {!! $box->result->pageTop !!}
		            @endif
					<table class="table table-striped table-bordered table-hover table-full-width cf" id="searchDataTable">
						<thead class="cf">
							<tr class="tableRowB">
								<th style="text-align: center;">{{ trans('managerView.shopOrderList.th.shoporderID') }}</th>
								<th style="text-align: center;">{{ trans('managerView.th.account') }}/{{ trans('managerView.th.nickName') }}</th>
								<th style="text-align: center;" class="numeric">{{ trans('managerView.shopOrderList.th.price') }}</th>
								<th style="text-align: center;" class="numeric">{{ trans('managerView.th.points') }}</th>
								<th style="text-align: center;" class="numeric">{{ trans('managerView.shopOrderList.th.transport') }}</th>
								<th style="text-align: center;" class="numeric">{{ trans('managerView.shopOrderList.th.quantity') }}</th>
								<th style="text-align: center;">{{ trans('managerView.th.status') }}</th>
								<th style="text-align: center;">{{ trans('managerView.th.bDate') }}</th>
								<th style="text-align: center;">{{ trans('managerView.th.detail') }}</th>
							</tr>
						</thead>
						<tbody>
	                    	{!! $box->result->body !!}
						</tbody>
					</table>
					@if(isset($box->result->detail))
	                    {!! $box->result->detail !!}
	                @endif
					@if(!is_null($box->result->pageBottom))
			            {!!$box->result->pageBottom!!}
			        @endif
				@else
					<div class="alert" style="text-align: center;">
						<strong>{{ trans('managerView.nodata') }}</strong>
					</div>
				@endif
			</div>
		</div>
	@endif
@stop




