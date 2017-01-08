@extends('layout')

@section('content')
<?php
  if(isset($result)){
    $message = $result;
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>
<form class="form-horizontal" method="POST" action="/profiles-store" enctype="multipart/form-data">
<h2 style="margin:auto; width:fit-content" class="text-primary">Chuyên gia mới</h2>
<br><br>
{{ csrf_field() }}
	<div class="form-group">
	<label class="control-label col-sm-2">Ảnh</label>
	<div class="col-sm-10">
	  <input type="file" accept="image/*"  name="Link_anh">
	</div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Họ và tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Ho_va_ten" placeholder="" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Học hàm/học vị</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Hoc_vi" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày sinh</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="Nam_sinh" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Chuyên ngành</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Chuyen_nganh">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Cơ quan công tác</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Co_quan">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Hướng nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="Huong_nghien_cuu"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Danh sách công trình nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="DsCong_trinh_nghien_cuu"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Danh sách kết quả nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="DsKet_qua_nghien_cuu"></textarea>
    </div>
  </div>
  <div class="form-group">
  <label class="control-label col-sm-2 text-info">Hoặc từ file excel</label>
  <div class="col-sm-10">
    <input type="file" accept=".csv, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel"
      name="excel_input"></input>
  </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Submit</button>
    </div>
  </div>

</form>

@stop
