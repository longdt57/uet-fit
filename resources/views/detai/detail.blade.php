@extends('layout_detail')

@section('content')


<h2 style="margin-top:50px">{{$detai->ten_detai}}</h2>

<table class="table table-bordered" style="margin-top:20px; width:90%; ">
	<tr>
		<td class="col-md-3"><strong>Tên đề tài, đề án</strong></td>
		<td>{{$detai->ten_detai}}</td>
	</tr>
	<tr>
		<td><strong>Mã số, ký hiệu</strong></td>
		<td>{{$detai->maso_kyhieu}}</td>
	</tr>
	<tr>
		<td><strong>Lĩnh vực</strong></td>
		<td>{{$detai->linhvuc}}</td>
	</tr>
	<tr>
		<td><strong>Năm bắt đầu</strong></td>
		<td>{{$detai->nam_begin}}</td>
	</tr>
	<tr>
		<td><strong>Năm kết thúc</strong></td>
		<td>{{$detai->nam_end}}</td>
	</tr>
	<tr>
		<td><strong>Cơ quan chủ trì</strong></td>
		<td>{{$detai->co_quan}}</td>
	</tr>
	<tr>
		<td><strong>Chủ nhiệm đề tài</strong></td>
		<td>{{$detai->chu_nhiem_detai}}</td>
	</tr>
	<tr>
		<td><strong>Điểm nổi bật</strong></td>
		<td>{{$detai->diem_noi_bat}}</td>
	</tr>
	<tr>
		<td><strong>Mô tả chung</strong></td>
		<td>{{$detai->mota_chung}}</td>
	</tr>
	<tr>
		<td><strong>Mô tả quá trình chuyển giao</strong></td>
		<td><?php echo "$detai->mota_quytrinh_chuyengiao";?></td>
	</tr>
	<tr>
		<td><strong>Kết quả thực hiện và khả năng ứng dụng</strong></td>
		<td>{{$detai->ket_qua_thuchien_ungdung}}</td>
	</tr>


</table>
<?php $link_edit="/detai_edit/$detai->IID"; ?>
@stop
