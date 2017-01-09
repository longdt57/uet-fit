@extends('layout')

@section('content')
<?php
  if(isset($result)){
    $message = $result;
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>

<form class="form-horizontal" method="POST" action="{{ url('/detai-store')}}"  enctype="multipart/form-data">
<h2 style="margin:auto; width:fit-content" class="text-primary">Đề tài mới</h2>
<br><br>
{{ csrf_field() }}
  <div class="form-group">
    <label class="control-label col-sm-2">Tên đề tài</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ten_detai" placeholder="">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mã số</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="maso_kyhieu" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Lĩnh vực</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="linhvuc" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Năm bắt đầu</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="nam_begin">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Năm kết thúc</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="nam_end">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Cơ quan</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="co_quan">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Chủ nhiệm đề tài</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ch_nhiem_detai">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Điểm nổi bật</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="diem_noi_bat"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mô tả chung</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="mota_chung"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mô tả quy trình chuyển giao</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="mota_quytrinh_chuyengiao"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Kết quả thực hiện ứng dụng</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="ket_qua_thuchien_ungdung"></textarea>
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
