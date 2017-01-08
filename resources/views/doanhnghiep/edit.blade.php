@extends('layout')

@section('content')
<?php
  if(isset($result)){
    $message = $result;
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
?>
<form class="form-horizontal" method="GET" action="/doanhnghiep_update">
<h2 style="margin:auto; width:fit-content" class="text-primary">{{$doanhnghiep->Name}}</h2>
<br><br>

<input type="hidden" name="ID" value="{{$doanhnghiep->IID}}">
  <div class="form-group">
    <label class="control-label col-sm-2">Tên doanh nghiệp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="TenDoanhNghiep" value="{{$doanhnghiep->Name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày cập nhật</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="NgayCapNhat" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Lĩnh vực</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="LinhVuc" value="{{$doanhnghiep->Field}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tỉnh/Thành phố</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="TinhThanhPho" value="{{$doanhnghiep->City}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Địa chỉ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="DiaChi" value="{{$doanhnghiep->Addr}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="Email" value="{{$doanhnghiep->Email}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Số điện thoại</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Phone" value="{{$doanhnghiep->Phone}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Fax</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax" value="{{$doanhnghiep->Fax}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Website</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Website">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mã số doanh nghiệp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Mã số thuế</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Loại hình</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày đăng kí thành lập</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Tên người đại diện theo pháp luật</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Số điện thoại</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Địa chỉ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngành nghề kinh doanh chính</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Thông tin đăng ký thuế</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Các chi nhanh của Doanh nghiệp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Các văn phòng đại diện của doanh nghiệp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Đăng ký, Chứng nhân DN, tổ chức KH&CN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Số quyết định</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Thời gian đăng ký</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Nơi cấp</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Xếp hạng trình độ công nghệ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Hướng nghiên cứu KH&CN</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Số lượng cán bộ nghiên cứu khoa học</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Công nghệ nổi bật</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Sử dụng công nghệ</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Fax"></textarea>

    </div>
  </div>

  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>

</form>

@stop
