<?php
use \App\Account;
use App\User;
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\DB;
use \Illuminate\Support\Facades\URL;

class login extends Controller {

public function login (request $request){

  $login = $request->input('login');
  $password = $request->input('password');

if(isset($login) && isset($password)){


  $account = \App\Account::where('email', '=', $login)->first();

  if($account != null && (Hash::check("$password", "$account->password") === true)) {


  echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";

  session(['log' => $account]);
  return view ('main');
   }
    else {
      echo "Invalid user or password please check ";
      return view ('welcome');
    }}
    else {
      echo "Invalid user or password please check ";
      return view ('welcome');
    }
  }

  public function logUser (request $request){
    $account = session('log');

    if (isset($_GET['userId']) && $account != null){
    $userId = $_GET['userId'];
    $user = \App\User::find($userId);
    session(['user' => $user]);
    echo "Welcome $user->username";
    return view ('displayMovies');
  } else if ($account != null && !isset($_GET['userId'])){
    echo "Choose a user";
    return view('main');
  } else {
    echo "you need to be logged in";
    return view ('welcome');
  }
}





  public function redirect() {

    $account = session('log');

  if ($account != null) {
    echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";
  return view('main');

  } else {
  echo "An error occured, please stay sane";
  return view('welcome');
}
  }

  public function logout(request $request) {
    $request->session()->forget('log');
    $request->session()->forget('user');
    return view('welcome');
  }
}
