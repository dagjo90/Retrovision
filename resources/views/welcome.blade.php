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

			<form action="{{URL::to('/login')}}" method="post">
				{{ csrf_field() }}
				    <input type="text" name="login" id="login" placeholder="Login">
				    <input type="password" name="password" id="password" placeholder="Password">
				   	<input id="submit" type="submit" value="Connexion">
			</form>

		</div>


<div class="registerScreen">
			<form action="{{URL::to('/home')}}" method="post" class="login" id="sign" >
				{{ csrf_field() }}

				    <input type="text" name="username" id="username" placeholder="Username" value="{{ old('username') }}" required>
						@if ($errors->has('username'))
								<span class="help-block">
										<strong>{{ $errors->first('username') }}</strong>
								</span>
						@endif

					  <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" required>
						@if ($errors->has('name'))
								<span class="help-block">
										<strong>{{ $errors->first('name') }}</strong>
								</span>
						@endif

						<input type="text" name="first_name" id="first_name" placeholder="First name" value="{{ old('first_name') }}" required>
						@if ($errors->has('first_name'))
								<span class="help-block">
										<strong>{{ $errors->first('first_name') }}</strong>
								</span>
						@endif

						<input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
						@if ($errors->has('email'))
								<span class="help-block">
										<strong>{{ $errors->first('email') }}</strong>
								</span>
						@endif

						<input type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}" required>
						@if ($errors->has('password'))
								<span class="help-block">
										<strong>{{ $errors->first('password') }}</strong>
								</span>
						@endif

				    	<input id="submitRegister" type="submit" value="Register">
			</form>

			</div>

			<button id="displayButton" onclick="displayRegister()" >Register</button>
			<button id="toggleback" onclick="displayLogin()" >Login</button>
		</div>

		</div>


<script src="js/login.js"></script>
@stop
