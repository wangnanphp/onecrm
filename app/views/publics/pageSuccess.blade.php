@extends('layouts.master')

@section('content')
<h2>操作成功</h2>
<br />
<div id="wrapper" class="row" name="add-user-error" module="user">
    <div class="col-md-12">
        <div class="alert alert-success"><strong>操作成功：</strong>{{ $successMsg }}</div>
    </div>
    <div class="col-md-12"><a href="@if( $url ) {{ $url }} @else javascript:window.history.back(); @endif" class="btn btn-primary btn-block">点我返回</a></div>
</div>
@endsection