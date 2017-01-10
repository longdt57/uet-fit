<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sanpham;
use App\UserListImport;
use App\Utils;
use DB;

class SanphamController extends Controller
{
    public function detail(Sanpham $sanpham){
      $enableEdit=true;
    	return view('sanpham.detail',compact('sanpham','enableEdit'));
    }

    public function create(){
    	return view('sanpham.create');
    }

    public function store(Request $request){
      if($request->hasFile('excel_input')){
        $lastsp = Sanpham::orderBy((new Sanpham)->getKeyName(), 'desc')->first();

        $path = $request->file('excel_input')->getRealPath();

			  \Excel::load($path, function($reader) {
          foreach($reader->toArray() as $key=>$v){
            Sanpham::insert($v);
          }
        });

         $sanpham = Sanpham::where((new Sanpham)->getKeyName(), '>', $lastsp->getID());
         $soluong_ketqua=$sanpham->count();
         $sanpham = $sanpham->paginate(10);
         $filter = MyHomeController::$FILTER_SANPHAM;
         $keyword="";
         $pagi=true;
         return view('home.index', compact('sanpham','keyword','filter','soluong_ketqua','pagi'));
      }

      $insert = Utils::requestToInsertArray($request->toArray(), (new Sanpham)->getTable());
      Sanpham::insert($insert);
      return view('sanpham.create')->with('result', 'Success!');
    }

    public function edit(Sanpham $sanpham){
      return view('sanpham.edit', compact('sanpham'));
    }
    public function update(Request $request){
      $id = $request->id;
      $insert = Utils::requestToInsertArray($request->toArray(), (new Sanpham)->getTable());
      DB::table((new SanPham)->getTable())->where('id',$id)->update($insert);

      $sanpham = Sanpham::find($id);
      return view('sanpham.detail',compact('sanpham'));
    }
}
