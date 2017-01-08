<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bangphatminh_sangche;
class PhatminhController extends Controller
{
    public function detail(Bangphatminh_sangche $phatminh){
    	return view('phatminh.detail',compact('phatminh'));
    }
    public function create(){
    	return view('phatminh.create');
    }
    public function store(Request $request){
      if($request->hasFile('excel_input')){
        $lastsp = Bangphatminh_sangche::orderBy(Bangphatminh_sangche::$COLUMN_ID, 'desc')->first();

        $path = $request->file('excel_input')->getRealPath();

			  \Excel::load($path, function($reader) {
          foreach($reader->toArray() as $key=>$v){
            $insert =[
              Bangphatminh_sangche::$COLUMN_TEN=>$v[Bangphatminh_sangche::$COLUMN_TEN],
              Bangphatminh_sangche::$COLUMN_SOBANG=> $v[Bangphatminh_sangche::$COLUMN_SOBANG],
              Bangphatminh_sangche::$COLUMN_LINHVUC=>$v[Bangphatminh_sangche::$COLUMN_LINHVUC],
              Bangphatminh_sangche::$COLUMN_NGAYCONGBO=>$v[Bangphatminh_sangche::$COLUMN_NGAYCONGBO],
              Bangphatminh_sangche::$COLUMN_NGAYCAP=>$v[Bangphatminh_sangche::$COLUMN_NGAYCAP],
              Bangphatminh_sangche::$COLUMN_CHUSOHUU=>$v[Bangphatminh_sangche::$COLUMN_CHUSOHUU],
              Bangphatminh_sangche::$COLUMN_TACGIA=>$v[Bangphatminh_sangche::$COLUMN_TACGIA],
              Bangphatminh_sangche::$COLUMN_DDNOIBAT=>$v[Bangphatminh_sangche::$COLUMN_DDNOIBAT],
              Bangphatminh_sangche::$COLUMN_MOTACHUNG=>$v[Bangphatminh_sangche::$COLUMN_MOTACHUNG],
              Bangphatminh_sangche::$COLUMN_CHUYENGIAO=>$v[Bangphatminh_sangche::$COLUMN_CHUYENGIAO],
              Bangphatminh_sangche::$COLUMN_UNGDUNG=>$v[Bangphatminh_sangche::$COLUMN_UNGDUNG]

            ];
            Bangphatminh_sangche::insert($insert);
          }
        });


         $bangphatminh_sangche = Bangphatminh_sangche::where(Bangphatminh_sangche::$COLUMN_ID, '>', $lastsp->getID());
         $soluong_ketqua=$bangphatminh_sangche->count();
         $bangphatminh_sangche = $bangphatminh_sangche->paginate(10);
         $filter=MyHomeController::$$FILTER_PHATMINH;
         $keyword="";
         $pagi=true;
         return view('home.index', compact('bangphatminh_sangche','keyword','filter','soluong_ketqua','pagi'));

      }
      $insert = [
        Bangphatminh_sangche::$COLUMN_TEN=>$request->ten_sangche_phatminh_giaiphap,
        Bangphatminh_sangche::$COLUMN_SOBANG=> $request->sobang_kyhieu,
        Bangphatminh_sangche::$COLUMN_LINHVUC=>$request->thuoclinhvucKHCN,
        Bangphatminh_sangche::$COLUMN_NGAYCONGBO=>$request->ngaycongbo,
        Bangphatminh_sangche::$COLUMN_NGAYCAP=>$request->ngaycap,
        Bangphatminh_sangche::$COLUMN_CHUSOHUU=>$request->chusohuuchinh,
        Bangphatminh_sangche::$COLUMN_TACGIA=>$request->tacgia,
        Bangphatminh_sangche::$COLUMN_DDNOIBAT=>$request->diem_noi_bat,
        Bangphatminh_sangche::$COLUMN_MOTACHUNG=>$request->mota_ve_sangche_phatminh_giaiphap,
        Bangphatminh_sangche::$COLUMN_CHUYENGIAO=>$request->noidung_cothe_chuyengiao,
        Bangphatminh_sangche::$COLUMN_UNGDUNG=>$request->thitruong_ungdung
      ];
      Bangphatminh_sangche::insert($insert);
    	return view('phatminh.create')->with('result','Success!');
    }
    public function edit(Bangphatminh_sangche $phatminh){
      return view('phatminh.edit',compact('phatminh'));
    }
    public function update(Request $request){
      $phatminh = Bangphatminh_sangche::find($request->ID);
      $insert = [
        Bangphatminh_sangche::$COLUMN_TEN=>$request->ten_sangche_phatminh_giaiphap,
        Bangphatminh_sangche::$COLUMN_SOBANG=> $request->sobang_kyhieu,
        Bangphatminh_sangche::$COLUMN_LINHVUC=>$request->thuoclinhvucKHCN,
        Bangphatminh_sangche::$COLUMN_NGAYCONGBO=>$request->ngaycongbo,
        Bangphatminh_sangche::$COLUMN_NGAYCAP=>$request->ngaycap,
        Bangphatminh_sangche::$COLUMN_CHUSOHUU=>$request->chusohuuchinh,
        Bangphatminh_sangche::$COLUMN_TACGIA=>$request->tacgia,
        Bangphatminh_sangche::$COLUMN_DDNOIBAT=>$request->diem_noi_bat,
        Bangphatminh_sangche::$COLUMN_MOTACHUNG=>$request->mota_ve_sangche_phatminh_giaiphap,
        Bangphatminh_sangche::$COLUMN_CHUYENGIAO=>$request->noidung_cothe_chuyengiao,
        Bangphatminh_sangche::$COLUMN_UNGDUNG=>$request->thitruong_ungdung
      ];
      $phatminh->updateDatabyarray($insert);
      $phatminh->save();

      $phatminh= Bangphatminh_sangche::find($request->ID);
      return $this->detail($phatminh);
    }
}
