<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class modifyController extends Controller
{
    public function showProfile () {

      $account = session('log');

      if($account !=null) {
        $account = session('log');
      return view ('profile');



} else {
  echo "you need to be logged in to modify your account";
  return view ('welcome');
}
    }

public function modifyAccount(request $request) {
  $account = session('log');

if (($request->input('name'))!== null){
  $account->name = $request->input('name');
}

if (($request->input('first_name')) !== null) {
  $account->first_name = $request->input('first_name');
}

if (($request->input('email')) !== null) {
  $account->email = $request->input('email');
}
if (($request->input('password'))!== null) {
  $account->password = bcrypt($request->input('password'));
}
  $account->save();

  echo "your changes have been successfully made";
  return view ('profile');
}

}
