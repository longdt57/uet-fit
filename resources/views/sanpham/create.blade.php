@extends('layout')

@section('content')
<?php
  if(isset($result)){
    $message = $result;
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>
<form class="form-horizontal" method="POST" action="/sanpham-store" enctype="multipart/form-data">
<h2 style="margin:auto; width:fit-content" class="text-primary">Sản phẩm mới</h2>
<br><br>

{{ csrf_field() }}
  <div class="form-group">
    <label class="control-label col-sm-2">Tên sản phẩm</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="ten_san_pham" placeholder="" >
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Lĩnh vực</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="linh_vuc" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Điểm nổi bật</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="dac_diem_noi_bat"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mô tả chung</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="mo_ta_chung"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mô tả quy trình chuyển giao</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="quy_trinh_chuyen_giao"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Khả năng ứng dụng</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="kha_nang_ung_dung"></textarea>
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
