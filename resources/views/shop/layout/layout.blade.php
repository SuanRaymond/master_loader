@extends('layout.layout')

@section('cssImport')
    @yield('shopCssImport')
@stop

@section('jsImport')
    @yield('shopJsImport')
@stop

@section('content')
    @yield('shopContent')
@stop

@section('contentBottom')
    @yield('shopContentBottom')
    @if(session()->get('menu')!='/')
        <div class="fly">
            <a class="WaitingBtn" href="javascript:history.back(1)">
                <span>
                    回上页
                </span>
            </a>
            <hr>
            <a href="#Top">
                <span>
                    TOP
                </span>
            </a>
        </div>
    @endif
    <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
        <div class="btn-group btn-group-justified" role="group" aria-label="Justified button group">
            <div class="span3">
                <a class="btn navbar-brand WaitingBtn" role="button" href="/Shop" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-home" aria-hidden="true"></span>
                    {{ trans('view.shophome') }}
                </a>
            </div>
            <div class="dropup span3">
                <a class="btn navbar-brand" role="button" href=":javascript" id="simple-menu"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    {{ trans('view.sort') }}
                </a>

                <ul class="dropdown-menu" aria-labelledby="simple-menu">
                    {!! $box->html->menuList !!}
                    <li role="separator" class="divider"></li>
                    <li><a class="WaitingBtn" href="/Shop">{{ trans('menu.menu.0') }}</a></li>
                </ul>
            </div>
            <div class="span3">
                <a class="btn navbar-brand WaitingBtn" role="button" href="/ShopCar" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
                    {{ trans('view.shopcar') }}
                </a>
            </div>
            <div class="span3">
                <a class="btn navbar-brand WaitingBtn" role="button" href="/MFire" style="padding-left: 0px; padding-right: 0px;">
                    <span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                    {{ trans('view.mfile') }}
                </a>
            </div>
        </div>
    </nav>
@stop






