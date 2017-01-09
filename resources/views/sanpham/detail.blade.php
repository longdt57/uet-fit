@extends('layout')
@section('content')

<h2 style="margin-top:100px">{{$sanpham->ten_san_pham}}</h2>
<table class="table table-bordered">
	<tr>
		<td class="col-md-3"><strong>Tên sản phẩm</strong></td>
		<td>{{$sanpham->ten_san_pham}}</td>
	</tr>
	<tr>
		<td><strong>Lĩnh vực</strong></td>
		<td>{{$sanpham->linh_vuc}}</td>
	</tr>
	<tr>
		<td><strong>Điểm nổi bật</strong></td>
		<td>{{$sanpham->dac_diem_noi_bat}}</td>
	</tr>
	<tr>
		<td><strong>Mô tả chung</strong></td>
		<td><?php echo "$sanpham->mo_ta_chung";?></td>
	</tr>
	<tr>
		<td><strong>Quy trình chuyển giao</strong></td>
		<td>{{$sanpham->quy_trinh_chuyen_giao}}</td>
	</tr>
	<tr>
		<td><strong>Khả năng ứng dụng</strong></td>
		<td>{{$sanpham->kha_nang_ung_dung}}</td>
	</tr>

</table>
<?php $link_edit="/sanpham_edit/$sanpham->IID"; ?>
@stop
