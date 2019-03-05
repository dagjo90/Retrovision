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

<div class=formContainer>

<div class="loginScreen">

			<form action="{{URL::to('/addUser')}}" method="post" class="login" id="log" v-if='show'>
				{{ csrf_field() }}
				<div class="login">
				    <input type="text" name="username" id="username" v-model='username' placeholder="username">
				    <div class="connexion">
				    	<input id="userAdd" type="submit" value="Add user">
				    </div>
				</div>
			</form>
</div>
			</div>
@stop
