<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detai_du_an_caccap;
use App\Detai;
class DetaiController extends Controller
{
    public function detail(Detai_du_an_caccap $detai){
      $enableEdit=true;
    	return view('detai.detail', compact('detai','enableEdit'));
    }
    public function create(){
    	return view('detai.create');
    }
    public function store(Request $request){
      if($request->hasFile('excel_input')){
        $lastsp = Detai_du_an_caccap::orderBy(Detai_du_an_caccap::$COLUMN_ID, 'desc')->first();

        $path = $request->file('excel_input')->getRealPath();

        \Excel::load($path, function($reader) {
          foreach($reader->toArray() as $key=>$v){
            $insert =[
              Detai_du_an_caccap::$COLUMN_TEN=>$v[Detai_du_an_caccap::$COLUMN_TEN],
              Detai_du_an_caccap::$COLUMN_MASO =>$v[Detai_du_an_caccap::$COLUMN_MASO],
              Detai_du_an_caccap::$COLUMN_LINHVUC=>$v[Detai_du_an_caccap::$COLUMN_LINHVUC],
              Detai_du_an_caccap::$COLUMN_NAMBEGIN =>$v[Detai_du_an_caccap::$COLUMN_NAMBEGIN],
              Detai_du_an_caccap::$COLUMN_NAMEND =>$v[Detai_du_an_caccap::$COLUMN_NAMEND],
              Detai_du_an_caccap::$COLUMN_COQUAN =>$v[Detai_du_an_caccap::$COLUMN_COQUAN],
              Detai_du_an_caccap::$COLUMN_CHUNHIEM=>$v[Detai_du_an_caccap::$COLUMN_CHUNHIEM],
              Detai_du_an_caccap::$COLUMN_DDNOIBAT=>$v[Detai_du_an_caccap::$COLUMN_DDNOIBAT],
              Detai_du_an_caccap::$COLUMN_MOTACHUNG=>$v[Detai_du_an_caccap::$COLUMN_MOTACHUNG],
              Detai_du_an_caccap::$COLUMN_CHUYENGIAO=>$v[Detai_du_an_caccap::$COLUMN_CHUYENGIAO],
              Detai_du_an_caccap::$COLUMN_UNGDUNG=>$v[Detai_du_an_caccap::$COLUMN_UNGDUNG]
            ];
            Detai_du_an_caccap::insert($insert);
          }
        });


         $detai_du_an_caccap = Detai_du_an_caccap::where(Detai_du_an_caccap::$COLUMN_ID, '>', $lastsp->getID());
         $soluong_ketqua=$detai_du_an_caccap->count();
         $detai_du_an_caccap = $detai_du_an_caccap->paginate(10);
         $filter=MyHomeController::$FILTER_DETAI;
         $keyword="";
         $pagi=true;
         return view('home.index', compact('detai_du_an_caccap','keyword','filter','soluong_ketqua','pagi'));

      }
      $insert = [
        Detai_du_an_caccap::$COLUMN_TEN => $request->ten_detai,
        Detai_du_an_caccap::$COLUMN_MASO =>$request->maso_kyhieu,
        Detai_du_an_caccap::$COLUMN_LINHVUC=>$request->linhvuc,
        Detai_du_an_caccap::$COLUMN_NAMBEGIN=>$request->nam_begin,
        Detai_du_an_caccap::$COLUMN_NAMEND=>$request->name_end,
        Detai_du_an_caccap::$COLUMN_COQUAN =>$request->co_quan,
        Detai_du_an_caccap::$COLUMN_CHUNHIEM =>$request->chu_nhiem_detai,
        Detai_du_an_caccap::$COLUMN_DDNOIBAT =>$request->diem_noi_bat,
        Detai_du_an_caccap::$COLUMN_MOTACHUNG =>$request->mota_chung,
        Detai_du_an_caccap::$COLUMN_CHUYENGIAO =>$request->mota_quytrinh_chuyengiao,
        Detai_du_an_caccap::$COLUMN_UNGDUNG =>$request->ket_qua_thuchien_ungdung
      ];
      Detai_du_an_caccap::insert($insert);
    	return view('detai.create')->with('result','Success!');
    }

    public function edit(Detai_du_an_caccap $detai){
      return view('detai.edit', compact('detai'));
    }
    public function update(Request $request){
      $detai=Detai_du_an_caccap::find($request->ID);
      $insert = [
        Detai_du_an_caccap::$COLUMN_TEN => $request->ten_detai,
        Detai_du_an_caccap::$COLUMN_MASO =>$request->maso_kyhieu,
        Detai_du_an_caccap::$COLUMN_LINHVUC=>$request->linhvuc,
        Detai_du_an_caccap::$COLUMN_NAMBEGIN=>$request->nam_begin,
        Detai_du_an_caccap::$COLUMN_NAMEND=>$request->name_end,
        Detai_du_an_caccap::$COLUMN_COQUAN =>$request->co_quan,
        Detai_du_an_caccap::$COLUMN_CHUNHIEM =>$request->chu_nhiem_detai,
        Detai_du_an_caccap::$COLUMN_DDNOIBAT =>$request->diem_noi_bat,
        Detai_du_an_caccap::$COLUMN_MOTACHUNG =>$request->mota_chung,
        Detai_du_an_caccap::$COLUMN_CHUYENGIAO =>$request->mota_quytrinh_chuyengiao,
        Detai_du_an_caccap::$COLUMN_UNGDUNG =>$request->ket_qua_thuchien_ungdung
      ];
      $detai->updateDatabyarray($insert);
      $detai->save();
      $detai = Detai_du_an_caccap::find($request->ID);
      return view('detai.detail', compact('detai'));
    }
}
