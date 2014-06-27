@extends('layouts.master')

@section('content')

<h3>浏览库存商品</h3>

<table class="table table-bordered table-striped datatable" id="table-2">
    <thead>
        <tr>
            <th>
                <div class="checkbox checkbox-replace">
                    <input type="checkbox" id="chk-1">
                </div>
            </th>
            <th>添加人</th>
            <th>所属类别</th>
            <th>商品名</th>
            <th>库存数量</th>
            <th>操作人</th>
            <th>地址</th>
            <th>添加时间</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
    </thead>

    <tbody>
        <tr>
            <td>
                <div class="checkbox checkbox-replace">
                    <input type="checkbox" id="chk-1">
                </div>
            </td>
            <td>晓威</td>
            <td>日用品类</td>
            <td>毛巾</td>
            <td>2014件</td>
            <td>晓威刘</td>
            <td>北京</td>
            <td>2014-6-25</td>
            <td>开启</td>
            <td>
                <a href="#" class="btn btn-default btn-sm btn-icon icon-left">
                    <i class="entypo-pencil"></i>
                   编辑
                </a>

                <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                    <i class="entypo-cancel"></i>
                   删除
                </a>

                <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                    <i class="entypo-info"></i>
                    查看详情
                </a>
            </td>
        </tr>

    </tbody>
</table>
<a href="/goodstock/addStock" class="btn btn-primary">
    <i class="entypo-plus"></i>
    添加商品
</a>

<script type="text/javascript">
jQuery(window).load(function()
{
    $("#table-2").dataTable({
        "sPaginationType": "bootstrap",
        "sDom": "t<'row'<'col-xs-6 col-left'i><'col-xs-6 col-right'p>>",
        "bStateSave": false,
        "iDisplayLength": 8,
        "aoColumns": [
            { "bSortable": false },
            null,
            null,
            null,
            null
        ]
    });

    $(".dataTables_wrapper select").select2({
        minimumResultsForSearch: -1
    });

    // Highlighted rows
    $("#table-2 tbody input[type=checkbox]").each(function(i, el)
    {
        var $this = $(el),
            $p = $this.closest('tr');

        $(el).on('change', function()
        {
            var is_checked = $this.is(':checked');

            $p[is_checked ? 'addClass' : 'removeClass']('highlight');
        });
    });

    // Replace Checboxes
    $(".pagination a").click(function(ev)
    {
        replaceCheckboxes();
    });
});

// Sample Function to add new row
var giCount = 1;

function fnClickAddRow()
{
    $('#table-2').dataTable().fnAddData(['<div class="checkbox checkbox-replace"><input type="checkbox" /></div>', giCount+".2", giCount+".3", giCount+".4", giCount+".5" ]);

    replaceCheckboxes(); // because there is checkbox, replace it

    giCount++;
}
</script>


@endsection