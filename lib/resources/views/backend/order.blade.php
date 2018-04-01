@extends('backend.master')
@section('title','Đơn hàng')
@section('main')
<div class="main">
	
	<h4 class="mainTitle">
		Đơn hàng
	</h4>
	<div>
		<table class="table table-hover">
		 	<tr>
		 		<th>Mă đơn</th>
		 		<th>Tên khách hàng</th>
		 		<th>Email</th>
		 		<th>SDT</th>
		 		<th>Hóa đơn</th>
		 		<th>Tùy chọn</th>
		 	</tr>
		 	@foreach($acclist as $item)
		 	<tr>
		 		<td>{{$item->id}}</td>
		 		<td>{{$item->email}}</td>
		 		<td>{{$item->email}}</td>
		 		<td>{{$item->email}}</td>
		 		<td>@if($item->level == 1) Chủ @else Quản lý @endif</td>
		 		<td>
		 			<a href="{{asset('admin/account/edit/'.$item->id)}}" class="btn btn-warning"><i class="fa fa-pencil" aria-hidden="true"></i> Sửa</a>
					<a onclick="return confirm('Bạn có chắc chắn muốn xóa!')" href="" class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i> Xóa</a>
		 		</td>
		 	</tr>
		 	@endforeach
		 </table>
		 {{$acclist->links()}}
	</div>
	
</div>
@stop