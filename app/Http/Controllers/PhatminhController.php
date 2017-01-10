<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bangphatminh_sangche;
use DB;
use App\Utils;
class PhatminhController extends Controller
{
    public function detail(Bangphatminh_sangche $phatminh){
      $enableEdit=true;
    	return view('phatminh.detail',compact('phatminh','enableEdit'));
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
            Bangphatminh_sangche::insert($v);
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
      $tb = new Bangphatminh_sangche;
      $insert = Utils::requestToInsertArray($request->toArray(),$tb->getTable());
      Bangphatminh_sangche::insert($insert);
    	return view('phatminh.create')->with('result','Success!');
    }
    public function edit(Bangphatminh_sangche $phatminh){
      return view('phatminh.edit',compact('phatminh'));
    }
    public function update(Request $request){
      $id = $request->ID;
      $tb = new Bangphatminh_sangche;
      $insert = Utils::requestToInsertArray($request->toArray(),$tb->getTable());
      DB::table($tb->getTable())->where($tb->getKeyName(),$id)->update($insert);

      $phatminh= Bangphatminh_sangche::find($request->ID);
      return $this->detail($phatminh);
    }
}
