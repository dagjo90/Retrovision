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
			<form action="{{URL::to('/modify')}}" method="post" class="login" id="log" v-if='show'>
				{{ csrf_field() }}

				    <input type="text" name="name" id="name" v-model='name' placeholder="<?php echo "$account->name";?>">
            <input type="text" name="first_name" id="first_name" v-model='first_name' placeholder="<?php echo "$account->first_name";?>">
            <input type="text" name="email" id="email" v-model='email' placeholder="<?php echo "$account->email";?>">
				    <input type="password" name="password" id="password" v-model='password' placeholder="New password if needed">
				    <div class="connexion">
				    	<input id="validate" type="submit" value="Validate">
				    </div>

			</form>
</div>

      <a href="{{URL::to('/deleteAccount')}}"><button id="deleteAccount"> Delete Account</button></a>

</div>
@stop
