<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use App\Utils;
use DB;
class ProfileController extends Controller
{
    public function detail(Profile $profile){
      $enableEdit=true;
    	return view('profiles.detail', compact('profile','enableEdit'));
    }
    public function create(){
    	return view('profiles.create');
    }
    public function store(Request $request){
      if($request->hasFile('excel_input')){
        $lastsp = Profile::orderBy((new Profile)->getKeyName(), 'desc')->first();

        $path = $request->file('excel_input')->getRealPath();

        \Excel::load($path, function($reader) {
          foreach($reader->toArray() as $key=>$v){
            Profile::insert($v);
          }
        });

         $profiles = Profile::where((new Profile)->getKeyName(), '>', $lastsp->getID());
         $soluong_ketqua=$profiles->count();
         $profiles = $profiles->paginate(10);
         $filter = MyHomeController::$FILTER_PROFILE;
         $keyword="";
         $pagi=true;
         return view('home.index', compact('profiles','keyword','filter','soluong_ketqua','pagi'));
      }
      $insert = Utils::requestToInsertArray($request->toArray(), (new Profile)->getTable());
    	Profile::insert($insert);
      $result = "success!";
      return view('profiles.create')->with('result', $result);

    }
    public function edit(Profile $profile){
        return view('profiles.edit', compact('profile'));
    }
    public function update(Request $request){
        $id = $request->ID;
        $tb = new Profile;
        $insert = Utils::requestToInsertArray($request->toArray(), (new Profile)->getTable());
        DB::table($tb->getTable())->where($tb->getKeyName(),$id)->update($insert);

        $profile = Profile::find($id);
        return view('profiles.detail', compact('profile'));
    }
}
