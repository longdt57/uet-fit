<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Profile;
use App\Detai_du_an_caccap;
use App\Bangphatminh_sangche;
use App\Sanpham;
use App\Doanhnghiep;
use Khill\Lavacharts\Lavacharts;
use App\Utils;

class MyHomeController extends Controller
{
  public $pagi_number=10;
  public $pagi=true;
  public static $FILTER_ALL = "tatca";
  public static $FILTER_PROFILE = "profiles";
  public static $FILTER_DETAI = "detai_du_an_caccap";
  public static $FILTER_SANPHAM = "sanpham";
  public static $FILTER_PHATMINH = "phatminh_sangche";
  public static $FILTER_DOANHNGHIEP = "thongtinchung";

  
  public function index()
  {
      $counts = array();
      $counts['profiles']=session('profilescount',function(){
        return DB::table('profiles')->count();});
      $counts['bangphatminh_sangche']=session('phatminhcount', function(){
        return DB::table('bangphatminh_sangche')->count();});
      $counts['detai_du_an_caccap']=session('detaicount', function(){
        return DB::table('detai_du_an_caccap')->count();});
      $counts['sanpham']=session('sanphamcount',function(){
        return DB::table('sanpham')->count();});
      $counts['thongtinchung']=session('doanhnghiepcount', function(){
        return DB::table('thongtinchung')->count();});
      session([
        'profilescount'=>$counts['profiles'],
        'phatminhcount'=>$counts['bangphatminh_sangche'],
        'detaicount'=>$counts['detai_du_an_caccap'],
        'sanphamcount'=>$counts['sanpham'],
        'doanhnghiepcount'=>$counts['thongtinchung']
        ]);
      
      $rows = array(
          "Nhà nghiên cứu"=>$counts['profiles'],
          "Phát minh"=>$counts['bangphatminh_sangche'],
          "Đề tài"=>$counts['detai_du_an_caccap'],
          "Sản phẩm"=>$counts['sanpham'],
          "Doanh nghiệp"=>$counts['thongtinchung']
        );
      Utils::createChart($rows, "Tổng quan");
      $hasChart = true;
      return view('home.index',compact('counts','hasChart'));
  }

  public function search(Request $request){

      $filter=session('filter',"tatca");
      $keyword=$request->input('keyword',"");
      session(['keyword'=>$keyword]);
      if($filter== "tatca"){
          return $this->search_tatca();
      }else if($filter=="profiles"){

        return $this->search_profiles();
      }else if($filter=="detai_du_an_caccap"){
        return $this->search_detai();
      }else if($filter=="phatminh_sangche"){
        return $this->search_phatminh();
      }else if($filter=="sanpham"){
        return $this->search_sanpham();
      }else if($filter=="thongtinchung"){
        return $this->search_doanhnghiep();
      }

      return "error";
  }
  public function search_tatca(){
    $filter = "tatca";
    session(['filter'=>$filter]);
    $keyword=session('keyword',"");
    $profiles = Profile::where('Ho_va_ten','like',"%$keyword%");
    $bangphatminh_sangche = Bangphatminh_sangche::where('ten_sangche_phatminh_giaiphap','like',"%$keyword%");
    $detai_du_an_caccap=Detai_du_an_caccap::where('ten_detai','like',"%$keyword%");
    $doanhnghiep = Doanhnghiep::where('TenDoanhNghiep','like',"%$keyword%");
    $sanpham = Sanpham::where('ten_san_pham','like',"%$keyword%");

    $soluong_ketqua = $profiles->count()+$bangphatminh_sangche->count()
    +$detai_du_an_caccap->count()+$sanpham->count()+$doanhnghiep->count();

    $rows = array(
      "Nhà nghiên cứu"=>$profiles->count(),
      "Phát minh"=>$bangphatminh_sangche->count(),
      "Đề tài"=>$detai_du_an_caccap->count(),
      "Sản phẩm"=>$sanpham->count(),
      "Doanh nghiệp"=>$doanhnghiep->count()
      );
      
    Utils::createChart($rows,"Tổng quan");
    $hasChart = $keyword==""?true:false;

    $profiles = $profiles->limit(5)->get();
    $bangphatminh_sangche= $bangphatminh_sangche->limit(5)->get();
    $detai_du_an_caccap = $detai_du_an_caccap->limit(5)->get();
    $sanpham = $sanpham->limit(5)->get();
    $doanhnghiep = $doanhnghiep->limit(5)->get();

    

    return view('home.index',compact('profiles','bangphatminh_sangche',
    'detai_du_an_caccap','sanpham','doanhnghiep','keyword','filter','soluong_ketqua','hasChart'));

  }
  public function search_profiles(){
    $filter = "profiles";
    session(['filter'=>$filter]);
    $keyword = session('keyword',"");
    $profiles = Profile::where('Ho_va_ten','like',"%$keyword%");
    $soluong_ketqua=$profiles->count();

    $pagi_number=$this->pagi_number;
    $pagi=$this->pagi;
    $profiles = $profiles->paginate($pagi_number);

    $title = Utils::$CHART_TITLE;
    $counts = Utils::$CHART_COUNT;
    $queryStr = "select Hoc_vi as $title, count(*) as $counts from profiles group by 
    Hoc_vi order by $counts desc limit 8";
    Utils::createChart_queryStr($queryStr, "Nhà khoa học");
    $hasChart = $keyword==""?true:false;
    return view('home.index', compact('profiles','keyword','filter','soluong_ketqua','pagi','hasChart'));
  }
  public function search_detai(){
    $filter="detai_du_an_caccap";
    session(['filter'=>$filter]);
    $keyword = session('keyword',"");
    $detai_du_an_caccap=Detai_du_an_caccap::where('ten_detai','like',"%$keyword%");
    $soluong_ketqua=$detai_du_an_caccap->count();

    $pagi_number=$this->pagi_number;
    $pagi=$this->pagi;
    $detai_du_an_caccap=$detai_du_an_caccap->paginate($pagi_number);

  $title = Utils::$CHART_TITLE;
    $counts = Utils::$CHART_COUNT;
    $queryStr = "select linhvuc as $title , count(*) as $counts from detai_du_an_caccap 
    group by linhvuc order by $counts desc limit 8";
    Utils::createChart_queryStr($queryStr, "Nhà khoa học");
    $hasChart = $keyword==""?true:false;

    return view('home.index', compact('detai_du_an_caccap','keyword','filter','soluong_ketqua','pagi','hasChart'));
  }
  public function search_phatminh(){
    $filter="phatminh_sangche";
    session(['filter'=>$filter]);
    $keyword = session('keyword',"");

    $pagi_number=$this->pagi_number;
    $pagi=$this->pagi;
    $bangphatminh_sangche = Bangphatminh_sangche::where('ten_sangche_phatminh_giaiphap','like',"%$keyword%");
    $soluong_ketqua = $bangphatminh_sangche->count();
    $bangphatminh_sangche=$bangphatminh_sangche->paginate($pagi_number);
    return view('home.index', compact('bangphatminh_sangche','keyword','filter','soluong_ketqua','pagi'));

  }
  public function search_sanpham(){
    $filter="sanpham";
    session(['filter'=>$filter]);
    $keyword = session('keyword',"");

    $pagi_number=$this->pagi_number;
    $pagi=$this->pagi;
    $sanpham = Sanpham::where('ten_san_pham','like',"%$keyword%");
    $soluong_ketqua=$sanpham->count();
    $sanpham = $sanpham->paginate($pagi_number);
    return view('home.index', compact('sanpham','keyword','filter','soluong_ketqua','pagi'));

  }
  public function search_doanhnghiep(){
    $filter="thongtinchung";
    session(['filter'=>$filter]);
    $keyword = session('keyword',"");

    $pagi_number=$this->pagi_number;
    $pagi=$this->pagi;
    $doanhnghiep = Doanhnghiep::where('TenDoanhNghiep','like',"%$keyword%");
    $soluong_ketqua= $doanhnghiep->count();
    $doanhnghiep= $doanhnghiep->paginate($pagi_number);
    return view('home.index', compact('doanhnghiep','keyword','filter','soluong_ketqua','pagi'));

  }
  public function accounts(){
    $users = DB::table('users')->paginate(5);
    return view('accounts', compact('users'));
  }
  public function accounts_save(Request $request){
    if($request->has('permissionId')){
      $permissionlist = $request->permissionChange;
      $idlist = $request->permissionId;
      $listPer = explode('\n', $permissionlist);
      $listId = explode('\n', $idlist);
      $createChange = 1;
      $editChange=2;
      $full=3;
      $key = $listId[0];
      $user = DB::table('users')->where("email",'"'.$listId[0].'"')->first();
        return $user;
      for ($i=0; $i<count($idlist); $i++) {
        $user = DB::table('users')->where('email',$listId[$i])->first();
        return $user;
        switch ($listPer[$i]) {
          case $createChange:
            $user['create'] = !$user['create'];
            break;
          case $editChange:
            $user['edit'] = !$user['edit'];
            break;
          case $full:
            $user['edit'] = !$user['edit'];
            $user['create'] = !$user['create'];
            break;
          
          default:
            # code...
            break;
        }
      }
      $oldUser = DB::table('users')->find($user['id']);
      $oldUser->delete();
      DB::table('users')->insert($user);
      $users = DB::table('users')->paginate(5);
      return view('accounts', compact('users'));
    }else return "no change";
    
  }

}
