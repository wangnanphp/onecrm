@extends('layouts.master')

@section('content')
<h2>部门列表管理</h2>
<br />
<div id="wrapper" class="row" name="role-list" module="role">
    <div class="col-md-12">
        <table class="table datatable table-striped table-hover" id="table-1">
            <thead>
                <tr>
                    <th>ID</th> <th>部门名称</th> <th>描述</th> <th>添加时间</th> <th>修改时间</th> <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($role_list as $rl_v)
                <tr data-id="{{ $rl_v->id }}">
                    <td>{{ $rl_v->id }}</td>
                    <td>|&sim;
                        <?php $tmp_path_length = floor(strlen($rl_v->path) / 2); ?>
                        @for(;$tmp_path_length > 0; $tmp_path_length--)
                            &sim;
                        @endfor
                        {{ $rl_v->name }}
                    </td>
                    <td>{{ $rl_v->description }}</td>
                    <td>{{ $rl_v->created_at }}</td>
                    <td>{{ $rl_v->updated_at }}</td>
                    <td class="center">
                        <button class="btn btn-gold btn-xs role-modify"> <i class="entypo-pencil"></i> </button>
                        <button type="button" class="btn btn-danger btn-xs role-delete"> <i class="entypo-cancel"></i> </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

{{-- 弹出层 S --}}
@section('modal')
    @include('publics.chat')
    @section('modal_content')
    bbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbbb
    @endsection
@endsection
{{-- 弹出层 E --}}