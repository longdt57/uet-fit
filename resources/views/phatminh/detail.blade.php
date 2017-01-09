@extends('layout')
@section('content')


<h2 style="margin-top:50px"> {{$phatminh->Name}}</h2>
<table class="table table-bordered">
	<tr>
		<td class="col-md-3"><strong>Tên sáng chế</strong></td>
		<td>{{$phatminh->Name}}</td>
	</tr>
	<tr>
		<td><strong>Số hiệu bằng, ký hiệu</strong></td>
		<td>{{$phatminh->Code}}</td>
	</tr>
	<tr>
		<td><strong>Lĩnh vực</strong></td>
		<td>{{$phatminh->field}}</td>
	</tr>
	<tr>
		<td><strong>Ngày công bố</strong></td>
		<td>{{$phatminh->DatePublish}}</td>
	</tr>
	<tr>
		<td><strong>Ngày cấp</strong></td>
		<td>{{$phatminh->DateLicense}}</td>
	</tr>
	<tr>
		<td><strong>Chủ sở hữu chính</strong></td>
		<td>{{$phatminh->Owner}}</td>
	</tr>
	<tr>
		<td><strong>Tác giả</strong></td>
		<td>{{$phatminh->Author}}</td>
	</tr>
	<tr>
		<td><strong>Điểm nổi bật</strong></td>
		<td>{{$phatminh->diem_noi_bat}}</td>
	</tr>
	<tr>
		<td><strong>Mô tả</strong></td>
		<td>{{$phatminh->mota_ve_sangche_phatminh_giaiphap}}</td>
	</tr>
	<tr>
		<td><strong>Nội dung chuyển giao</strong></td>
		<td>{{$phatminh->noidung_cothe_chuyengiao}}</td>
	</tr>
	<tr>
		<td><strong>Thị trường ứng dụng</strong></td>
		<td>{{$phatminh->thitruong_ungdung}}</td>
	</tr>

</table>
<?php $link_edit="/phatminh_edit/$phatminh->IID"; ?>
@stop
