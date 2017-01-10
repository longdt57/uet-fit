<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Routing\Redirector;
use App\User;


class AccountManagerController extends Controller
{
  public function __construct()
  {
      $this->middleware('checkIsAdmin');
  }

  public function accounts(){
    $users = DB::table('users')->select('id','email','name','create','edit')->paginate(5);
    return view('auth.accounts_manager', compact('users'));
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

      for ($i=0; $i<count($idlist); $i++) {
        $user = DB::table('users')->where('id',$listId[$i])->first();
        switch ($listPer[$i]) {
          case $createChange:
            $user->create = !$user->create;
            break;
          case $editChange:
            $user->edit = !$user->edit;
            break;
          case $full:
            $user->edit = !$user->edit;
            $user->create = !$user->create;
            break;

        }
        DB::table('users')->where('id',$listId[$i])
                          ->update(['create'=>$user->create,
                          'edit'=>$user->edit]);
        //DB::table('users')->where('id',$listId[$i])->update('create',$user[''])
      }

    }
    return redirect('/home');

  }
  public function account_modify(User $user){
    $data = User::find($user->id);
    return view('auth.edit',compact('data'));
  }
  public function account_update(Request $request){
    $user = User::find($request->id);
    $update = array(
      'name'=>$request['name'],
      );
    if($request->password!=$user->password)
      $update['password']=bcrypt($request['password']);
    User::where('id',$request->id)->update($update);
    return redirect('/accounts-manager');
  }
  public function new_user(){
    return view('auth.create');
  }
  public function new_user_save(Request $data){
    if(User::where('email', $data->email)->count()==0){
      User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
          ]);

      return redirect('/accounts-manager');
    }
    $message = "Email exist";
    return view('auth.create',compact('message'));
    
  }

}
