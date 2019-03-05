<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;
class filmsController extends Controller
{


    public function addMovies () {

        $account = session('log');
        if ($account != null) {
          echo "Bonjour <strong>$account->first_name $account->name</strong>, vous êtes bien connecté !";
        return view ('addMovies');
      } else {
        echo "you need to be connected to add a movie";
        return view ('welcome');
      }


    }

    public function createMovie(request $request) {

      $movie = new \App\Film;
      $movie->titre = $request->input('titre');
      $movie->titre_original = $request->input('titre_original');
      $movie->année = $request->input('année');
      $movie->durée = $request->input('durée');
      $movie->acteurs = $request->input('acteurs');
      $movie->réalisateur = $request->input('réalisateur');
      $movie->synopsis = $request->input('synopsis');
      $movie->genre = $request->input('genre');
      $movie->studio = $request->input('studio');
      $movie->affiche = $request->input('affiche');
      $movie->vidéo = $request->input('vidéo');
      $movie->save();

      echo "movie added successfully";
      return view ('addMovies');

    }

    public function displayMovies () {
    $account = session('log');
    $user = session('user');
    if ($user != null){
      echo "Welcome $user->username";
      return view('displayMovies');
    } else if ($account != null && $user == null) {
      echo "You need to select a user to go on";
      return view ('main');
    }

    else if ($account == null && $user == null) {
      echo "You need to be logged in to go on";
      return view ('welcome');
    }

  }

    public function displayMovie (request $request) {

      if (isset($_GET['id'])){
      $id = $_GET['id'];
			$films = \App\Film::find($id);
      return view('displayMovie');
    } else if (session('log') == null){
      echo "You need to be logged in to proceed";
      return view ('welcome');
    } else if (session('user') == null && session('log') != null){
      echo "Please select a user";
      return view('main');
    } else {
      echo "Please select a movie";
      return view ('displayMovies');
    }

    }

    public function addFavorites (request $request) {
      if (session('user') != null && session('log') != null){
        if(isset($_GET['filmId'])){
          $id = $_GET['filmId'];
			       $film = \App\Film::find($id);

             $user = session('user');

             $favorite = new \App\Favorite;
             $favorite->film_id = $film->id;
             $favorite->user_id = $user->id;

             $favoriteCheck = \App\Favorite::where('film_id', $film->id)->where('user_id', $user->id)->first();

      if (isset($favoriteCheck)){

        $favoriteCheck->delete();

        echo "$film->titre was deleted from favorite list of $user->username";
        return view ('displayMovies');

      } else {

        $favorite->save();
        echo "$film->titre was added successfully to favorite list of $user->username";
        return view ('displayMovies');
      }} else {
        echo "please select a movie to add";
        return view('displayMovies');
      }

    } else if (session('user') == null && session('log') != null){
      echo "please select a user";
      return view ('main');
    } else {
      echo "You must be logged in to go on";
      return view ('welcome');
    }
  }

  public function addLater (request $request) {
      if (session('user') != null && session('log') != null){
        if(isset($_GET['filmId'])){
          $id = $_GET['filmId'];
             $film = \App\Film::find($id);

             $user = session('user');

      $later = new \App\WatchLater;
      $later->film_id = $film->id;
      $later->user_id = $user->id;


      $laterCheck = \App\WatchLater::where('film_id', $film->id)->where('user_id', $user->id)->first();

  if (isset($laterCheck)){
    $laterCheck->delete();

  echo "$film->titre was deleted from Watch Later list of $user->username";
  return view ('displayMovies');

  } else {
    $later->save();
    echo "$film->titre was added successfully to Watch Later list of $user->username";
    return view('displayMovies');
  }} else {
    echo "please select a movie to add";
    return view('displayMovies');
  }

} else if (session('user') == null && session('log') != null){
  echo "please select a user";
  return view ('main');
} else {
  echo "You must be logged in to go on";
  return view ('welcome');
}
}


  public function removeLater() {

    if (session('user') != null && session('log') != null){
      if(isset($_GET['filmId'])){
        $id = $_GET['filmId'];
           $film = \App\Film::find($id);

           $user = session('user');

      $later = \App\WatchLater::where('film_id', $film->id)->where('user_id', $user->id)->first();
      $later->delete();

      echo "The movie has been removed from the watch later list";
      return view ('displayLater');
    } else {
      echo "please select a movie to remove";
      return view('displayMovies');
    }} else if (session('user') == null && session('log') != null){
      echo "please select a user";
      return view ('main');
    } else {
      echo "You must be logged in to go on";
      return view ('welcome');
    }


}

  public function removeFavorite() {
    if (session('user') != null && session('log') != null){
      if(isset($_GET['filmId'])){
        $id = $_GET['filmId'];
           $film = \App\Film::find($id);

           $user = session('user');

      $later = \App\Favorite::where('film_id', $film->id)->where('user_id', $user->id)->first();
      $later->delete();

      echo "The movie has been removed from the favorites list";
      return view ('displayFavorite');
} else {
  echo "please select a movie to remove";
  return view('displayMovies');
}} else if (session('user') == null && session('log') != null){
  echo "please select a user";
  return view ('main');
} else {
  echo "You must be logged in to go on";
  return view ('welcome');
}


  }


public function displayFavorite (){

  $account = session('log');
  $user = session('user');

  if ($user != null && $account != null){
    echo "welcome $user->username";
  return view('displayFavorite');
} else {
  echo "you need to be logged in to go on";
  if ($account != null) {
  return view ('main');
} else {
  return view ('welcome');
}
}

}

public function displayLater (){
  $account = session('log');
  $user = session('user');

  if ($user != null && $account != null){
    echo "welcome $user->username";
  return view('displayLater');
} else {
  echo "you need to be logged in to go on";
  if ($account != null) {
  return view ('main');
} else {
  return view ('welcome');
}
}

}
}
