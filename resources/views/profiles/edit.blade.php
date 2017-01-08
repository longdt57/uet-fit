@extends('layout')

@section('content')

<div class="col-md-4">
    <h3>{{$profile->Level}}. {{$profile->Name}}</h3>
  </div>
  <div class="col-md-2"><img class="img-rounded" src="{{$profile->ImageLink}}" alt="no link"></div>


<form class="form-horizontal" method="GET" action="/profiles_update"
style="margin-top:80px">

  <input type="hidden" name="ID" value="{{$profile->IID}}">
	<div class="form-group">
	<label class="control-label col-sm-2">Ảnh</label>
	<div class="col-sm-10">
	  <input type="file" accept="image/*"  name="Link_anh">
	</div>
  </div>

  <div class="form-group">
    <label class="control-label col-sm-2">Họ và tên</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Ho_va_ten" placeholder="" value="{{$profile->Name}}">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Học hàm/học vị</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Hoc_vi" required="true" value="{{$profile->Level}}" >

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Ngày sinh</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" name="Nam_sinh" value="{{$profile->Date}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Chuyên ngành</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Chuyen_nganh" value="{{$profile->Major}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Cơ quan công tác</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="Co_quan" value="{{$profile->WorkAddr}}">

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Hướng nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="Huong_nghien_cuu" >{{$profile->MajorResearch}}</textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Danh sách công trình nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="DsCong_trinh_nghien_cuu" >{{$profile->ListResearch}}</textarea>

    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2">Danh sách kết quả nghiên cứu</label>
    <div class="col-sm-10">
      <textarea class="form-control" rows="2" name="DsKet_qua_nghien_cuu" >{{$profile->ListResult}}</textarea>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Save</button>
    </div>
  </div>

</form>

@stop
