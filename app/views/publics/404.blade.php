@extends('layouts.master')

@section('content')
<br/><br/>
<div id="wrapper" class="row" name="add-user-error" module="user">
    <div class="col-md-12">
        <div class="page-error-404">
            <div class="error-symbol">
                <i class="entypo-attention"></i>
            </div>
            <div class="error-text">
                <h2>404</h2>
                <p>您访问的页面不存在!</p>
            </div>
        </div><br/><br/>
        <div class="col-md-12"><a href="javascript:window.history.back();" class="btn btn-primary btn-block">点我返回</a></div>
</div>
<br/><br/><br/><br/>
@endsection