<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class index extends Controller
{
    public function home () {

      $account = session('log');

      if ($account != null) {
        echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";
      return view('main');

    } else {
          return view('welcome');
      }

    }


    public function main () {
      $account = session('log');

      if ($account != null) {
        echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";
      return view('main');

    } else {
          return view('welcome');
      }


}
  }
