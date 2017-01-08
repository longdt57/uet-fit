@extends('layout')

@section('content')

<script type="text/javascript">
	var changelist = [];
	var editAbleChangelist = [];
	var createAble = 1;
	var editAble = 2;
	var full = 3;
	function createChange(checkbox){
		if(changelist[checkbox.name]==null) changelist[checkbox.name]=0;
		switch(changelist[checkbox.name]){
			case 0: changelist[checkbox.name] = createAble;
				break;
			case createAble: changelist[checkbox.name] = 0;
				break;
			case editAble: changelist[checkbox.name]=full;
				break;
			case full: changelist[checkbox.name] = editAble;
				break;
			default: changelist[checkbox.name]=-1;
		}
	}
	function editChange(checkbox){
		if(changelist[checkbox.name]==null) changelist[checkbox.name]=0;
		switch(changelist[checkbox.name]){
			case 0: changelist[checkbox.name] = editAble;
				break;
			case createAble: changelist[checkbox.name] = full;
				break;
			case editAble: changelist[checkbox.name]=0;
				break;
			case full: changelist[checkbox.name] = createAble;
				break;
			default: changelist[checkbox.name]=-1;
		}
	}
	function beforeSubmit(){
		var str="";
		var strId="";
		for(var i in changelist){
			if(changelist[i]!=null && changelist[i]!=0){
				str+= changelist[i]+'\n';
				strId +=i+'\n';
			}
		}
		document.getElementById("permissionChange").value=str;
		document.getElementById("permissionId").value=strId;
		
		return true;
	}
	
</script>

<form method="GET" action="/accounts-save" class="col-md-10" 
onsubmit="return beforeSubmit();">
	<input type="hidden" name="permissionId" id="permissionId" value="">
	<input type="hidden" name="permissionChange" id="permissionChange" value="">
	<table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Tên</th>
	        <th>Tên đăng nhập</th>
	        <th>Create</th>
	        <th>Edit</th>
	      </tr>
	    </thead>
	    <tbody>
	    @foreach($users as $user)
	      <tr>
	        <td>{{$user->name}}</td>
	        <td>{{$user->email}}</td>
	        <td>
	        <input type="checkbox" name="{{$user->email}}" onclick="createChange(this)"
	        	<?php if($user->create) echo "checked"?>
	        	>
	        </td>
	        <td><input type="checkbox" name="{{$user->email}}" onclick="editChange(this)"
	        <?php if($user->edit) echo "checked"?>></td>
	      </tr>

	    @endforeach
	      
	    </tbody>
	  </table>
	  
	  <div class="pull-right" style="margin-right:10px">
	  <button type="submit" class="btn btn-info btn-lg" >Save</button>
	  <a class="btn btn-default btn-lg">Cancel</a>
</form>
@stop