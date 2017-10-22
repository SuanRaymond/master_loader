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

			@if(isset($box->result->bodyMineBody))
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
						{!! $box->ctrlHtml->btn !!}
					</div>
				</form>
			</div>
		</div>
	</div>

	@if(!empty($box->result->bodyUpTree))
		<div class="portlet">
			<div class="portlet-title">
				<div class="caption"></div>
				<div class="actions">
				</div>
			</div>
			<div class="portlet-body">
				<ul class="breadcrumb">
		            {!! $box->result->bodyUpTree !!}
		        </ul>
			</div>
		</div>
	@endif

	@if(isset($box->result->bodyMineBody))
		@if($box->result->bodyMineBody != '')
			<div class="portlet box green">
				<div class="portlet-title">
					<div class="caption"><i class="icon-flag"></i>{{ trans('managerView.transactionList.t.title') }}</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="portlet-body flip-scroll">
					@if($box->result->bodyMineBody != '')
						<table class="table-bordered table-striped table-condensed flip-content" id="dataTableMine">
							<thead class="flip-content">
								<tr class="tableRowB">
									<th style="text-align: center;">{{ trans('managerView.th.account') }}/{{ trans('managerView.th.nickName') }}</th>
									<th style="text-align: center;">{{ trans('managerView.th.group') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.points') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.integral') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.bonus') }}</th>
								</tr>
							</thead>
							<tbody>
		                    	{!! $box->result->bodyMineBody !!}
							</tbody>
						</table>

						@if(!is_null($box->result->bodyMineMode))
		                    {!!$box->result->bodyMineMode!!}
		                @endif
					@else
						<div class="alert" style="text-align: center;">
							<strong>{{ trans('managerView.nodata') }}</strong>
						</div>
					@endif
				</div>
			</div>
		@endif
	@endif

	@if(isset($box->result->bodyDownBody))
		@if($box->result->bodyDownBody != '')
			<div class="portlet box blue">
				<div class="portlet-title">
					<div class="caption"><i class="icon-group"></i>{{ trans('managerView.transactionList.t.titleDown') }}</div>
					<div class="tools">
						<a href="javascript:;" class="collapse"></a>
					</div>
				</div>
				<div class="portlet-body flip-scroll">
					@if($box->result->bodyDownBody != '')
						@if(!is_null($box->result->pageTop))
	                        {!! $box->result->pageTop !!}
	                    @endif
						<table class="table-bordered table-striped table-condensed flip-content" id="dataTableDown">
							<thead class="flip-content">
								<tr class="tableRowB">
									<th style="text-align: center;">{{ trans('managerView.th.account') }}/{{ trans('managerView.th.nickName') }}</th>
									<th style="text-align: center;">{{ trans('managerView.th.group') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.points') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.integral') }}</th>
									<th style="text-align: center;" class="numeric">{{ trans('managerView.th.bonus') }}</th>
								</tr>
							</thead>
							<tbody>
		                    	{!! $box->result->bodyDownBody !!}
							</tbody>
						</table>
						@if(!is_null($box->result->pageBottom))
		                    {!!$box->result->pageBottom!!}
		                @endif

		                @if(!is_null($box->result->bodyDownMode))
		                    {!!$box->result->bodyDownMode!!}
		                @endif
					@else
						<div class="alert" style="text-align: center;">
							<strong>{{ trans('managerView.nodata') }}</strong>
						</div>
					@endif
				</div>
			</div>
		@endif
	@endif
@stop




