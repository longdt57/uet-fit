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
.carousel {
    margin-bottom: 0;
    padding: 0 40px 30px 40px;
}
/* The controlsy */
.carousel-control {
	left: -12px;
    height: 40px;
	width: 40px;
    background: none repeat scroll 0 0 #222222;
    border: 4px solid #FFFFFF;
    border-radius: 23px 23px 23px 23px;
    margin-top: 90px;
}
.carousel-control.right {
	right: -12px;
}
/* The indicators */
.carousel-indicators {
	right: 50%;
	top: auto;
	bottom: -10px;
	margin-right: -19px;
}
/* The colour of the indicators */
.carousel-indicators li {
	background: #cecece;
}
.carousel-indicators .active {
background: #428bca;
}
@stop
@section('content')
	
    
	<?php
		$locallinks=Request::root();
		function cutstr($in){
			return $in;
		}
		function cutstr2($in, $length){
			return substr($in, 0,$length)."...";
		}
	?>

	<div class="row" style="margin-top:20px">
        <div class="col-md-6">
            <form id="custom-search-input" method="GET" action="{{ url('/home/search')}}">
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


        <div class="col-md-8">
        <ul class="nav nav-tabs" style="margin-top:10px">
			    <li <?php if(!isset($filter)||(isset($filter) &&
				        	$filter=="tatca")) echo 'class="active"';?>>
				        	<a href="{{ url('/search/tatca')}}">Tổng quan</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="profiles") echo 'class="active"';?>>
				        	<a href="{{ url('/search/profiles')}}">Chuyên gia</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="detai_du_an_caccap") echo 'class="active"';?>>
				        	<a href="{{ url('/search/detai')}}">Đề tài</a></li>
			    <li <?php if(isset($filter) &&
				        	$filter=="phatminh_sangche") echo 'class="active"';?>>
				        	<a href="{{ url('/search/phatminh')}}">Phát minh</a></li>
				<li <?php if(isset($filter) &&
				        	$filter=="sanpham") echo 'class="active"';?>>
				        	<a href="{{ url('/search/sanpham')}}">Sản phẩm</a></li>
				<li <?php if(isset($filter) &&
				        	$filter=="thongtinchung") echo 'class="active"';?>>
				        	<a href="{{ url('/search/doanhnghiep')}}">Doanh nghiệp</a></li>
			</ul>
		</div>


	</div>
	@if(isset($hasChart)&&$hasChart)
		<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
        	['Title', 'percent'],	
          <?php 
          	foreach ($chartvalue as $key => $value) {
          		echo "['$key',$value],";	
          	}
          ?>
        ]);
        

        var options = {
          title: 'Test chart',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
		<div id="piechart_3d" class = "col-md-12" style="height:300px; margin-top:20px">
		</div>
		<?php 
          	foreach ($chartvalue as $key => $value) {
          		echo "['$key',$value],";	
          	}
          ?>
		
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
	<div class="row">
		<div class="col-md-12">
                <div id="Carousel" class="carousel slide">

                <ol class="carousel-indicators">
                    <li data-target="#Carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#Carousel" data-slide-to="1"></li>
                    <li data-target="#Carousel" data-slide-to="2"></li>
                    <li data-target="#Carousel" data-slide-to="3"></li>
                    <li data-target="#Carousel" data-slide-to="4"></li>
                </ol>

                <!-- Carousel items -->
                <div class="carousel-inner">

                <div class="item active">
                	<div class="row">

                    <?php foreach($profiles as $profile){?>
                    <div class="col-md-2"><a href="{{ url('/profiles/'.$profile->getKey())}}" class="thumbnail" style="height:200px; text-align:center;padding-top:120px; text-color:black"><strong>{{$profile->Hoc_vi}}.
											{{$profile->Ho_va_ten}}</strong><br>
                      <small class="text-primary"><?php echo cutstr2($profile->Co_quan,50);?></small></a></div>
                    <?php }?>

                	</div><!--.row-->
                </div><!--.item-->

                <div class="item">
                	<div class="row">
                    <?php foreach($detai_du_an_caccap as $detai){ ?>
                      <div class="col-md-2"><a href="{{ url('/detai/'.$detai->id)}}" class="thumbnail" style="height:200px; text-align:center;padding-top:120px; text-color:black"><strong>
                        <?php echo cutstr2($detai->ten_detai,50);?></strong><br>
                        </a></div>

                    <?php }?>

                	</div><!--.row-->
                </div><!--.item-->

                <div class="item">

                	<div class="row">

                    <?php foreach($sanpham as $sp){ ?>
                      <div class="col-md-2"><a href="{{ url('/sanpham/'.$sp->id)}}" class="thumbnail" style="height:200px; text-align:center;padding-top:120px; text-color:black"><strong>
                        <?php echo cutstr2($sp->ten_san_pham,50);?></strong><br>
                        </a></div>

                    <?php }?>

                	</div><!--.row-->
                </div><!--.item-->
                <div class="item">
                	<div class="row">
                    <?php foreach($bangphatminh_sangche as $phatminh){ ?>
                      <div class="col-md-2"><a href="{{ url('/phatminh/'.$phatminh->id)}}" class="thumbnail" style="height:200px; text-align:center;padding-top:120px; text-color:black"><strong>
                        <?php echo cutstr2($phatminh->ten_sangche_phatminh_giaiphap,50);?></strong><br>
                        </a></div>

                    <?php }?>

                	</div><!--.row-->
                </div><!--.item-->
                <div class="item">
                	<div class="row">

                    <?php foreach($doanhnghiep as $dn){ ?>
                      <div class="col-md-2"><a href="{{ url('/doanhnghiep/'.$dn->Id)}}" class="thumbnail" style="height:200px; text-align:center;padding-top:120px; text-color:black"><strong>
                        <?php echo cutstr2($dn->TenDoanhNghiep,50);?></strong><br>
                        </a></div>

                    <?php }?>

                	</div><!--.row-->
                </div><!--.item-->

                </div><!--.carousel-inner-->
                  <a data-slide="prev" href="#Carousel" class="left carousel-control" style="width:40px">‹</a>
                  <a data-slide="next" href="#Carousel" class="right carousel-control" style="width:40px">›</a>
                </div><!--.Carousel-->

		</div>
	</div>

<?php }else{
		if(isset($soluong_ketqua)){ ?>
		<div style="margin-top:10px">
			<small >Kết quả tìm kiếm: {{$soluong_ketqua}} mục</small>
		</div>
		<?php }
    if(isset($profiles)){?>
				@if($filter=="tatca")
					<a href="{{ url('/search/profiles')}}" class="a-text-color"><h3 >Chuyên gia</h3></a>
				@endif
				<ul>
						<?php
						foreach($profiles as $profile){ ?>
							<p  class="item">
								<a href="{{ url('/profiles/'.$profile->getKey())}}">
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
					<a href="{{ url('/search/detai')}}" class="a-text-color"><h3>Đề tài, dự án các cấp</h3></a>
				@endif
				<ul>
					<?php foreach($detai_du_an_caccap as $detai){ ?>
						<p class="item">
							<a href="{{ url('/detai/'.$detai->id)}}">
									<h4 class="item-title">{{$detai->ten_detai}}</h4></a>
									<small class="text-primary">{{$locallinks."/detai/$detai->Code
                    -$detai->Chairman-$detai->datestart-$detai->dateend"}}</small><br>
									<small ><strong>Lĩnh vực: </strong>{{$detai->linhvuc}}, 
									<strong>Mã số, ký hiệu: </strong>
									{{$detai->maso_kyhieu}}, <strong>Chủ nhiệm đề tài, tác giả: </strong>
									{{$detai->chu_nhiem_detai}}, <strong>Thời gian kết thúc:</strong>
									{{$detai->nam_end}}

									</small>
						</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$detai_du_an_caccap->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($bangphatminh_sangche)){?>
			@if($filter=="tatca")
					<a href="{{ url('/search/phatminh')}}" class="a-text-color"><h3>Bằng phát minh sáng chế</h3></a>
			@endif
			<ul>
				<?php foreach($bangphatminh_sangche as $phatminh){ ?>
					<p class="item">
						<a href="{{ url('/phatminh/'.$phatminh->id)}}">
							<h4 class="item-title">{{$phatminh->ten_sangche_phatminh_giaiphap}}</h4>
						</a>
							<small class="text-primary">{{$locallinks."/phatminh/$phatminh->code
                -$phatminh->owner-$phatminh->datepublish"}}</small><br>
							<small >
								<strong>Lĩnh vực: </strong>{{$phatminh->thuoclinhvucKHCN}},
								<strong>Số, ký hiệu, bằng: </strong>{{$phatminh->sobang_kyhieu}},
								<strong>Tác giả: </strong> {{$phatminh->tacgia}},
								<strong>Ngày công bố: </strong>{{$phatminh->ngaycongbo}}
							</small>

					</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$bangphatminh_sangche->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($sanpham)){?>
			@if($filter=="tatca")
				<a href="{{ url('/search/profiles')}}" class="a-text-color"><h3>Sản phẩm, công nghệ</h3></a>
			@endif
			<ul>
				<?php foreach($sanpham as $sp){ ?>
					<p class="item">
						<a href="{{ url('/sanpham/'.$sp->id)}}">
							<h4 class="item-title">{{$sp->ten_san_pham}}</h4>
						</a>
						<small class="text-primary">{{$locallinks."/sanpham/$sp->field"}}</small><br>
						<small >
							<strong>Lĩnh vực: </strong>{{$sp->linh_vuc}}, 
							<strong>Khả năng ứng dụng: </strong>{{$sp->kha_nang_ung_dung}},
						</small>
					</p>
					<?php }?>
				</ul>
				<?php if(isset($pagi)){?>
					{{$sanpham->links()}}
				<?php }?>
		<?php }?>
		<?php if(isset($doanhnghiep)){?>
			@if($filter=="tatca")
					<a href="{{ url('/search/doanhnghiep')}}" class="a-text-color"><h3>Doanh nghiệp</h3></a>
			@endif
			<ul>
				<?php foreach($doanhnghiep as $dn){ ?>
					<p class="item">
						<a href="{{ url('/doanhnghiep/'.$dn->Id)}}">
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
		<?php }}?>

@stop
