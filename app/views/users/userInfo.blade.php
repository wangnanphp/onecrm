@extends('layouts.master')

@section('content')
<h2>查看员工信息</h2>
<br />
<div id="wrapper" class="row" name="modify-user" module="user">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">查看员工信息</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form id="user-info" class="form-horizontal form-groups-bordered" role="form">
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="login_email">登陆E-mail</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                <input class="form-control" type="text" value="{{ $user->login_email }}" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="login_email">登陆用户名</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                <input class="form-control" type="text" value="{{ $user->login_name }}" disabled="disabled" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="idcards">身份证编号</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-vcard"></i></span>
                                <input class="form-control" type="text" disabled="disabled" value="{{ $user->idcards }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="realname">真实姓名</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-user"></i></span>
                                <input class="form-control" type="text" disabled="disabled" value="{{ $user->realname }}" />
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="idcards_image">身份证图片</label>
                        <div class="col-sm-9">
                            <img src="{{ $user->idcards_image }}" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="work">是否在职</label>
                        <div class="col-sm-9">
                            <div class="make-switch" data-text-label="<i class='entypo-user'></i>">
                                <input disabled="disabled" type="checkbox" @if( 0 == $user->work ) checked @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="status">是否锁定</label>
                        <div class="col-sm-9">
                            <div class="make-switch" data-on-label="<i class='entypo-lock-open'></i>" data-off-label="<i class='entypo-lock'></i>" data-on="success" data-off="danger">
                                <input disabled="disabled" type="checkbox" @if( 0 == $user->status ) checked @endif />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection