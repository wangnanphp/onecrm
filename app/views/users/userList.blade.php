@extends('layouts.master')

@section('content')
<h2>员工列表</h2>
<br />
<div id="wrapper" class="row" name="user-list" module="user">
    <div class="col-md-12">
        <table class="table datatable table-striped table-hover" id="table-1">
            <thead>
                <tr>
                    <th>ID</th> <th>登陆E-mail</th> <th>账号</th> <th>真实姓名</th>
                    <th>身份证号</th> <th>电话</th> <th>最后登录时间</th> <th>最后登录IP</th>
                    <th>是否在职</th> <th>状态</th> <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $u_v)
                <tr data-id="{{ $u_v->id }}">
                    <td>{{ $u_v->id }}</td>
                    <td>{{ $u_v->login_email }}</td>
                    <td>{{ $u_v->login_name }}</td>
                    <td>{{ $u_v->realname }}</td>
                    <td>{{ $u_v->idcards }}</td>
                    <td>{{ $u_v->phone }}</td>
                    <td>{{ $u_v->last_login_time }}</td>
                    <td>{{ $u_v->last_login_ip }}</td>
                    <td>{{-- $u_v->work --}}
                        <div class="make-switch switch-small" data-text-label="<i class='entypo-user'></i>">
                                <input type="checkbox" name="work" checked />
                        </div>
                    </td>
                    <td>{{-- $u_v->status --}}
                        <div class="make-switch switch-small" data-on-label="<i class='entypo-lock-open'></i>" data-off-label="<i class='entypo-lock'></i>" data-on="success" data-off="danger">
                                <input name="status" type="checkbox" checked />
                        </div>
                    </td>
                    <td class="center">
                        <button type="button" class="btn btn-info btn-xs"> <i class="entypo-eye"></i> </button>
                        <button type="button" class="btn btn-gold btn-xs"> <i class="entypo-pencil"></i> </button>
                        <button type="button" class="btn btn-danger btn-xs"> <i class="entypo-cancel"></i> </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>
@endsection