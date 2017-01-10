<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detai_du_an_caccap;
use App\Detai;
use DB;
use App\Utils;
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
            Detai_du_an_caccap::insert($v);
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
      $tb = new Detai_du_an_caccap;
      $insert = Utils::requestToInsertArray($request->toArray(),
      $tb->getTable());
      Detai_du_an_caccap::insert($insert);
    	return view('detai.create')->with('result','Success!');
    }

    public function edit(Detai_du_an_caccap $detai){
      return view('detai.edit', compact('detai'));
    }
    public function update(Request $request){
      $id = $request->ID;
      $insert = Utils::requestToInsertArray($request->toArray(),
      (new Detai_du_an_caccap)->getTable());
      DB::table('detai_du_an_caccap')->where('id',$id)->update($insert);

      $detai = Detai_du_an_caccap::find($id);
      return view('detai.detail', compact('detai'));
    }
}
