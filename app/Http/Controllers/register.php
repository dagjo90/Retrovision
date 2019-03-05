<?php
use \App\Account;
use \App\User;
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class register extends Controller

{

  public function create (request $request) {

    $account = new \App\Account;
    $account->name = $request->input('name');
    $account->first_name = $request->input('first_name');
    $account->email = $request->input('email');
    $account->password = bcrypt($request->input('password'));
    $account->save();

    $user = new \App\User;
    $user->username = $request->input('username');
    $user->birthday = 0;
    $user->avatar = "0";
    $user->account_id = $account->id;
    $user->save();

    session(['log' => $account]);
    echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";
    return view ("main");
}

public function registerUser (request $request) {
  $account = session('log');
  if ($account != null) {
  return view ('addUser');

}

else {
  echo "You need to be logged in to add a user";
  return view ('welcome');
}
}

  public function addUser (request $request) {
$account = session('log');

if ($account != null) {
    $user = new \App\User;
    $user->username = $request->input('username');
    $user->birthday = "1990";
    $user->avatar = "0";
    $user->account_id = "$account->id";
    $user->save();

    echo "A new user named $user->username was created for <strong>$account->first_name $account->name</strong>";
    return view ('main');
  }

  else {
    echo "You need to be logged in to add a user";
    return view ('welcome');
  }
}
}
