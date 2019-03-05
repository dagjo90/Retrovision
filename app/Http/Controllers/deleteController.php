<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class deleteController extends Controller

{

  public function deleteUser() {
    $account = session('log');
    $user = session('user');

    if ($user != null && $account != null){

    $laterDelete = \App\WatchLater::where('user_id', $user->id);
    $favoriteDelete = \App\Favorite::where('user_id', $user->id);
    $laterDelete->delete();
    $favoriteDelete->delete();
    $user->delete();
    echo "user deleted successfully";
    return view('main');
  }
  else if ($user == null && $account != null){
    echo "you need to choose a user" ;
      return view('main');
  } else {
    echo "you need to be logged in to go on";
    return view ('welcome');
  }
  }


  public function deleteAccount(request $request) {


  $account = session('log');
  if ($account != null){
  $user = \App\User::where('account_id', '=', $account->id)->get();

  foreach($user as $user) {
  $laterDelete = \App\WatchLater::where('user_id', $user->id);
  $laterDelete->delete();

  $favoriteDelete = \App\Favorite::where('user_id', $user->id);
  $favoriteDelete->delete();

  $userDelete = \App\User::where('account_id', $account->id);
  $userDelete->delete();

  }

  $accountDelete = \App\Account::find($account->id);
  $accountDelete->delete();

  $request->session()->forget('log');
  echo "account deleted successfully";
  return view('welcome');
} else {
  echo "you need to be logged in to go on";
  return view ('welcome');
}


  }

}
