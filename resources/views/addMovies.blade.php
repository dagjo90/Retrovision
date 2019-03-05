




<?php
$account = session('log');
?>
@extends('layout')

@section('title')
Retro Vision
@stop

@section('header')
@include('bigHeader')
@stop

@section('content')
		<div class="formContainer">
			<div class="loginScreen">
			<form action="{{URL::to('/addMovies')}}" method="post" class="login" id="log" v-if='show'>
				{{ csrf_field() }}
				<div class="login">
				    <input type="text" name="titre" id="titre" placeholder="Titre">
            <input type="text" name="titre_original" id="titre_original" placeholder="Titre original">
            <input type="text" name="réalisateur" id="réalisateur" placeholder="Réalisateur">
            <input type="text" name="acteurs" id="acteurs" placeholder="Acteurs">
            <input type="integer" name="année" id="année" placeholder="Année">
            <input type="text" name="synopsis" maxlength="225" id="synopsis" placeholder="Synopsis">
            <input type="text" name="genre" id="genre" placeholder="Genre">
            <input type="text" name="studio" id="studio"placeholder="Studio">
            <input type="integer" name="durée" id="durée" placeholder="Durée en minutes">
            <input type="text" name="affiche" id="affiche" placeholder="Url de l'affiche">
            <input type="text" name="vidéo" id="vidéo" placeholder="Url de la vidéo">
				    <div class="connexion">
				    	<input type="submit" value="Add Movie">
				    </div>
				</div>
			</form>
</div>
@stop
