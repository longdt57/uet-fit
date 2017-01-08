<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use Auth;
use App\Utils;
class ProfileController extends Controller
{
    public function detail(Profile $profile){
    	return view('profiles.detail', compact('profile'));
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
        $profiles = Profile::find($id);
        $insert = Utils::requestToInsertArray($request->toArray(), (new Profile)->getTable());
        $insert[(new Profile)->getKeyName()] = $id;

      	$profiles->delete();

        Profile::insert($insert);
        $profile = Profile::find($request->ID);
        return view('profiles.detail', compact('profile'));
    }
}
