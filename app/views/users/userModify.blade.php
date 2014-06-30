@extends('layouts.master')

@section('content')
<h2>修改员工信息</h2>
<br />
<div id="wrapper" class="row" name="modify-user" module="user">
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="panel-title">修改员工信息</div>
                <div class="panel-options">
                    <a href="#" data-rel="collapse"><i class="entypo-down-open"></i></a>
                    <a href="#" data-rel="close"><i class="entypo-cancel"></i></a>
                </div>
            </div>
            <div class="panel-body">
                <form id="add-user" class="validate form-horizontal form-groups-bordered" role="form"  action="/user/user-modify" method="post" enctype="multipart/form-data">
                    <input name="id" type="hidden" value="{{ $user->id }}"/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="login_email">登陆E-mail</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-mail"></i></span>
                                <input class="form-control" name="login_email" type="text" value="{{ $user->login_email }}" readonly="readonly" data-validate="required,email" data-message-required="无名无氏，如何登陆？" data-message-email="嗯~~应该是电子邮箱吧，对俗称E-mail！" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="password">登陆密码</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-key"></i></span>
                                <input class="form-control" name="password" type="password" placeholder="密码">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="password_confirmation">重复密码</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-key"></i></span>
                                <input class="form-control" name="password_confirmation" type="password" placeholder="重复密码">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="idcards">身份证编号</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-vcard"></i></span>
                                <input class="form-control" name="idcards" type="text" value="{{ $user->idcards }}" placeholder="请输入真实身份证号码">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="realname">真实姓名</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="entypo-user"></i></span>
                                <input class="form-control" name="realname" type="text" value="{{ $user->realname }}" placeholder="请输入真实姓名">
                            </div>
                        </div>
                    </div>
                    @if( $user->idcards_image )
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="idcards_image">原身份证</label>
                        <div class="col-sm-9">
                            <img src="{{ $user->idcards_image }}" />
                        </div>
                    </div>
                    @endif
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="idcards_image">身份证上传</label>
                        <div class="col-sm-9">
                            <input class="form-control file2 inline btn btn-primary" type="file" name="idcards_image" data-label="<i class='glyphicon glyphicon-circle-arrow-up'></i> &nbsp;Browse Files" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="work">是否在职</label>
                        <div class="col-sm-9">
                            <div class="make-switch" data-text-label="<i class='entypo-user'></i>">
                                <input type="checkbox" name="work" @if( 0 == $user->work ) checked @endif/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="status">是否锁定</label>
                        <div class="col-sm-9">
                            <div class="make-switch" data-on-label="<i class='entypo-lock-open'></i>" data-off-label="<i class='entypo-lock'></i>" data-on="success" data-off="danger">
                                <input name="status" type="checkbox" @if( 0 == $user->status ) checked @endif />
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-9">
                        <button id="form-user-modify" type="submit" class="btn btn-success" data-url="/user/user-modify">修改</button>
                        <button type="reset" class="btn">重置</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection