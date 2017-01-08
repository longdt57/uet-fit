@extends('layout')

@section('style')
#custom-search-input{
    padding: 3px;
    border: solid 1px #E4E4E4;
    border-radius: 6px;
    background-color: #fff;
}

#custom-search-input input{
    border: 0;
    box-shadow: none;
}

#custom-search-input button{
    margin: 2px 0 0 0;
    background: none;
    box-shadow: none;
    border: 0;
    color: #666666;
    padding: 0 8px 0 10px;
    border-left: solid 1px #ccc;
}

#custom-search-input button:hover{
    border: 0;
    box-shadow: none;
    border-left: solid 1px #ccc;
}

#custom-search-input .glyphicon-search{
    font-size: 23px;
}
.a-text-color{
	color: #666666;
}
a:visited{
	color:#005266;
}
.item{
	margin-bottom:25px;
}
.item-title{
	margin:0px;
}

@stop
@section('content')
	<?php
		$locallinks=Request::root();
		function cutstr($in){
			return substr($in, 0,500)."...";
		}
	?>
	<div class="row" style="margin-top:20px">
        <div class="col-md-6">
            <form id="custom-search-input" method="GET" action="/home/search">
                <div class="input-group col-md-12">
                    <input type="text" class="form-control input-lg"
	                    name="keyword" <?php if(isset($keyword)) echo ' value="'.$keyword.'"' ?> />
                    <span class="input-group-btn">
                        <button class="btn btn-info btn-lg" type="submit	">
                            <i class="glyphicon glyphicon-search"></i>
                        </button>
                    </span>

                </div>
				  
            </form>


        </div>
        <div class="form-group col-md-2 ">
			  <select class="form-control input-lg" onchange="">
			    <option>Tất cả</option>
			    <option>Tên</option>
			    <option>Thời gian</option>
			    <option>Mô tả</option>
			  </select>
			</div>
			
        <div class="col-md-8">
        <ul class="nav nav-tabs" style="margin-top:10px">
			    <li <?php if(!isset($filter)||(isset($filter) &&
				        	$filter=="tatca")) echo 'class="active"';?>>
				        	<a href="/search/tatca">Tổng quan</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="profiles") echo 'class="active"';?>>
				        	<a href="/search/profiles">Chuyên gia</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="detai_du_an_caccap") echo 'class="active"';?>>
				        	<a href="/search/detai">Đề tài</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="phatminh_sangche") echo 'class="active"';?>>
				        	<a href="/search/phatminh">Phát minh</a></li>
				<li <?php if(isset($filter) &&
				        	$filter=="sanpham") echo 'class="active"';?>>
				        	<a href="/search/sanpham">Sản phẩm</a></li>
				<li <?php if(isset($filter) &&
				        	$filter=="thongtinchung") echo 'class="active"';?>>
				        	<a href="/search/doanhnghiep">Doanh nghiệp</a></li>
			</ul>
		</div>

	</div>
	@if(isset($hasChart)&&$hasChart)
		<div id="count-chart" class = "col-md-12" style="height:200px; margin-top:20px">
			
				<?php echo \lava::render('ColumnChart', 'Tổng quan', 'count-chart');?>
			
		</div>
	@endif
<?php if(isset($counts)){ ?>
<div style="margin-top:20px" class="col-md-12">
	<p>
	Hiện đang có {{$counts['profiles']}} chuyên gia; {{$counts['detai_du_an_caccap']}}
	 đề tài, dự án các cấp; {{$counts['bangphatminh_sangche']}} bằng phát minh,
	 sáng chế, giải pháp hữu ích; {{$counts['thongtinchung']}} doanh nghiệp ứng dụng
	 công nghệ;
</p>
	
	</div>
<?php } else{
		if(isset($soluong_ketqua)) ?>
		<div style="margin-top:10px">
			<small >Kết quả tìm kiếm: {{$soluong_ketqua}} mục</small>
		</div>
		<?php if(isset($profiles)){?>
				@if($filter=="tatca")
					<a href="/search/profiles" class="a-text-color"><h3 >Chuyên gia</h3></a>
				@endif
				<ul>
						<?php
						foreach($profiles as $profile){ ?>
							<p  class="item">
								<a href="/profiles/{{$profile->getKey()}}">
										<h4 class="text-primary item-title" >{{$profile->Hoc_vi}}.
											{{$profile->Ho_va_ten}}</h4></a>
										<small class="text-primary">{{$locallinks."/profiles/$profile->Level-
                      $profile->Name-$profile->Date"}}</small><br>
										<small class="text-default">{{$profile->Co_quan}}</small>
							</p>
								<?php

						}?>


				</ul>
				<?php if(isset($pagi)){?>
					{{$profiles->links()}}
				<?php }?>

		<?php } ?>
		<?php if(isset($detai_du_an_caccap)){ ?>
				@if($filter=="tatca")
					<a href="/search/detai" class="a-text-color"><h3>Đề tài, dự án các cấp</h3></a>
				@endif
				<ul>
					<?php foreach($detai_du_an_caccap as $detai){ ?>
						<p class="item">
							<a href="/detai/{{$detai->id}}">
									<h4 class="item-title">{{$detai->ten_detai}}</h4></a>
									<small class="text-primary">{{$locallinks."/detai/$detai->Code
                    -$detai->Chairman-$detai->datestart-$detai->dateend"}}</small><br>
									<small >{{cutstr($detai->mota_chung)}}</small>
						</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$detai_du_an_caccap->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($bangphatminh_sangche)){?>
			@if($filter=="tatca")
					<a href="/search/phatminh" class="a-text-color"><h3>Bằng phát minh sáng chế</h3></a>
			@endif
			<ul>
				<?php foreach($bangphatminh_sangche as $phatminh){ ?>
					<p class="item">
						<a href="/phatminh/{{$phatminh->id}}">
							<h4 class="item-title">{{$phatminh->ten_sangche_phatminh_giaiphap}}</h4>
						</a>
							<small class="text-primary">{{$locallinks."/phatminh/$phatminh->code
                -$phatminh->owner-$phatminh->datepublish"}}</small><br>
							<small >{{cutstr($phatminh->mota_ve_sangche_phatminh_giaiphap)}}</small>

					</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$bangphatminh_sangche->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($sanpham)){?>
			@if($filter=="tatca")
				<a href="/search/profiles" class="a-text-color"><h3>Sản phẩm, công nghệ</h3></a>
			@endif
			<ul>
				<?php foreach($sanpham as $sp){ ?>
					<p class="item">
						<a href="/sanpham/{{$sp->id}}">
							<h4 class="item-title">{{$sp->ten_san_pham}}</h4>
						</a>
						<small class="text-primary">{{$locallinks."/sanpham/$sp->field"}}</small><br>
						<small >{{cutstr($sp->mo_ta_chung)}}</small>
					</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$sanpham->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($doanhnghiep)){?>
			@if($filter=="tatca")
					<a href="/search/doanhnghiep" class="a-text-color"><h3>Doanh nghiệp</h3></a>
			@endif
			<ul>
				<?php foreach($doanhnghiep as $dn){ ?>
					<p class="item">
						<a href="/doanhnghiep/{{$dn->Id}}">
							<h4 class="item-title">{{$dn->TenDoanhNghiep}}</h4></a>
							<small class="text-primary">{{$locallinks."/doanhnghiep/$dn->city-
                $dn->field-$dn->Phone"}}</small><br>
							<small class="text-default">{{$dn->DiaChi}}</small>

					</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$doanhnghiep->links()}}
				<?php }?>
		<?php }?>


<?php } ?>


@stop
