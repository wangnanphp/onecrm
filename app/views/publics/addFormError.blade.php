@extends('layouts.master')

@section('content')
<h2>{{ $title }}</h2>
<br />
<div id="wrapper" class="row" name="add-user-error" module="user">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead><tr><th><div class="btn btn-danger"><i class="entypo-cancel"></i>出错啦！</div></th></tr></thead>
            <tbody>
                <tr>
                    <td class="padding-lg">
                        <div class="list-group">
                            @foreach($errorMsg as $emV)
                            <div class="list-group-item">
                                <div class="badge badge-warning"><i class="entypo-info"></i></div> {{ $emV }}
                            </div>
                            @endforeach
                        </div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="col-md-12"><a href="javascript:window.history.back();" class="btn btn-primary btn-block">点我返回</a></div>
</div>
@endsection