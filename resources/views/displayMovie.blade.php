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

		<div class="movieContainer">

    <?php

			$id = $_GET['id'];
			$films = App\Film::find($id);

			echo "<h2>$films->titre</h2>";
			echo "<img src=\"$films->affiche\"/>";
			echo "<div class=\"infoContainer\">";
			echo "<p class=\"synopsis\"> $films->synopsis</p>";
			echo "<p class=\"durée\"> durée : $films->durée min</p>";
			echo "<p class=\"réalisateur\"> réalisateur : $films->réalisateur</p>";
			echo "<p class=\"genre\"> genre : $films->genre</p>";
			echo "</div>";
			echo $films->vidéo;

			?>
</div>
</div>
</div>
@stop
