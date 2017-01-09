@extends('layout')

@section('content')
<?php
  if(isset($result)){
    $message = $result;
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>

<form class="form-horizontal" method="POST" action="{{ url('/phatminh-store')}}" enctype="multipart/form-data">
<h2 style="margin:auto; width:fit-content" class="text-primary">Phát minh mới</h2>
<br><br>
{{ csrf_field() }}
  <div class="form-group">
    <label class="control-label col-sm-2">Tên phát minh</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ten_sangche_phatminh_giaiphap" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mã số</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="sobang_kyhieu" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Lĩnh vực</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="thuoclinhvucKHCN" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày công bố</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="ngaycongbo">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày cấp</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="ngaycap">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Chủ sở hữu chính</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="chusohuuchinh"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tác giả</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="tacgia"></textarea>

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
      <textarea class="form-control" rows="2" name="mota_ve_sangche_phatminh_giaiphap"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Nội dung có thể chuyển giao</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="noidung_cothe_chuyengiao"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Thị trường ứng dụng</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="thitruong_ungdung"></textarea>
    </div>
  </div>

<label class="control-label col-sm-2">Ảnh</label>
  <div class="col-sm-10">
    <input type="file" accept="image/*"  name="Link_anh">
  </div>
  <br>
  <br>
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
