@extends('layout_detail')

@section('content')

<div class="row" style="margin-top:50px">

		<div class="col-md-4">
			<h3>{{$profile->Level}}. {{$profile->Name}}</h3>
		</div>
		<div class="col-md-2"><img class="img-rounded" src="{{$profile->ImageLink}}" alt="no link"></div>
</div>

<table class="table table-bordered" style="margin-top:20px; width:90%">
	<tr>
		<td class="col-md-3"><strong>Họ và tên</strong></td>
		<td>{{$profile->Name}}</td>
	</tr>
	<tr>
		<td><strong>Học hàm/học vị</strong></td>
		<td>{{$profile->Level}}</td>
	</tr>
	<tr>
		<td><strong>Năm sinh</strong></td>
		<td>{{$profile->Date}}</td>
	</tr>
	<tr>
		<td><strong>Chuyên ngành</strong></td>
		<td><?php echo "$profile->Major";?></td>
	</tr>
	<tr>
		<td><strong>Cơ quan công tác</strong></td>
		<td><?php echo "$profile->WorkAddr";?></td>
	</tr>

	<tr>
		<td><strong>Hướng nghiên cứu</strong></td>
		<td><?php echo "$profile->MajorResearch"; ?></td>
	</tr>
	<tr>
		<td><strong>Danh sách công trình nghiên cứu</strong></td>
		<td><?php echo $profile->ListResearch;?></td>
	</tr>
	<tr>
		<td><strong>Danh sách kết quả nghiên cứu</strong></td>
		<td><?php echo "$profile->ListResult"; ?></td>
	</tr>
</table>

<?php $link_edit="/profiles_edit/$profile->IID"; ?>

@stop
