@extends('layouts.master')

@section('content')

<h3>快速搜索商品实物</h3>

	<div class="col-sm-5">

		<div class="input-group">
			<div class="input-group-btn">
				<button type="button" class="btn btn-gold dropdown-toggle" data-toggle="dropdown">
					选择类别 <span class="caret"></span>
				</button>

				<ul class="dropdown-menu dropdown-gold">
					<li><a href="#">实物商品</a></li>
					<li><a href="#">销售实物</a></li>
					<li><a href="#">储存实物</a></li>
					<li><a href="#">退货实物</a></li>
					<li><a href="#">换货实物</a></li>
					<li class="divider"></li>
				</ul>
			</div>

			<input type="text" class="form-control">
			<span class="input-group-btn">
				<button class="btn btn-success" type="button">Go!</button>
			</span>
		</div>
	</div>
<br/>


@endsection