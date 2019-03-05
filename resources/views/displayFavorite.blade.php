@extends('layout')
<div class="test">


@section('title')
Retro Vision
@stop

@section('header')
@include('bigHeader')
@stop
<div class="all">


@section('nav')
@include('navLayout')
@stop

@section('content')

	<div class="moviesContainer">
		<h2>My Favorites</h2>

	<?php
		$user = session('user');
    $favorites = \App\Favorite::where('user_id', '=', $user->id)->get();

    foreach ($favorites as $favorites){
		$films = \App\Film::where('id', '=', "$favorites->film_id")->get();

		foreach ($films as $film){

			echo "<div class=\"movie\">";
			echo "<a href=\"/displayMovie?id=$film->id\">";
			echo "<div class=\"affiche\">";
			echo "<img src=\"$film->affiche\">";
			echo "</div> </a>";


			/* in or out favorite list */

			$favoriteMovie = \App\Favorite::where('film_id', '=', $film->id)->first();

			if ($favoriteMovie !== null && ($favoriteMovie->user_id == $user->id)){

				$favoriteColor = "red";

			} else {

			$favoriteColor = "white";
			}

			/* in or out watch later list */

			$laterMovie = \App\WatchLater::where('film_id', '=', $film->id)->first();

			if ($laterMovie !== null && ($laterMovie->user_id == $user->id)){

			$laterColor = "red";

			} else {

				$laterColor = "white";
			}

				echo "<div class=\"icones\">";

				echo "<div class=\"$favoriteColor\">";
				echo "<a href=\"/addFavorites?filmId=$film->id&userId=$user->id\"><i class=\"fas fa-heart\"><p>Favorite</p></i></a></div>";

				echo "<div class=\"$laterColor\">";
				echo "<a href=\"/addLater?filmId=$film->id&userId=$user->id\"><i class=\"far fa-clock\"><p>Watch Later</p></i></a></div></div></div>";

			}}

		?>

</div>
</div>
</div>
@stop
