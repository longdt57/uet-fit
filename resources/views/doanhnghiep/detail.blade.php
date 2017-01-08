@extends('layout_detail')
@section('content')

<h2 style="margin-top:100px">{{$doanhnghiep->Name}}</h2>
<table class="table table-bordered">
	<tr>
		<td><strong>Tên doanh nghiệp</strong></td>
		<td>{{$doanhnghiep->Name}}</td>
	</tr>
	<tr>
		<td><strong>Lĩnh vực</strong></td>
		<td>{{$doanhnghiep->Field}}</td>
	</tr>
	<tr>
		<td><strong>Tỉnh/Thành phố</strong></td>
		<td>{{$doanhnghiep->City}}</td>
	</tr>
	<tr>
		<td><strong>Địa chỉ</strong></td>
		<td>{{$doanhnghiep->Addr}}</td>
	</tr>
	<tr>
		<td><strong>Email</strong></td>
		<td>{{$doanhnghiep->Email}}</td>
	</tr>
	<tr>
		<td><strong>Phone</strong></td>
		<td>{{$doanhnghiep->Phone}}</td>
	</tr>
	<tr>
		<td><strong>Fax</strong></td>
		<td>{{$doanhnghiep->Fax}}</td>
	</tr>

</table>
<?php $link_edit="/doanhnghiep_edit/$doanhnghiep->IID"; ?>
@stop
