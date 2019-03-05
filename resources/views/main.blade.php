@extends('layout')

@section('title')
Retro Vision
@stop

@section('header')
@include('bigHeader')
@stop

@section('content')
<nav class="mainNav">

<div class="accountNav">




	<a class="leftText" href="/modify"><span class="fas fa-user-circle"></span>
		<p> Modify Account</p>
	</a>

	<a class ="rightText" href="/logout">
			<i class="fas fa-sign-out-alt"></i>
			<p> Logout</p>
	</a>
</div>
				<?php
				$account = session('log');
				$x = 0;
				$users = \App\User::where('account_id', '=', $account->id)->get();


				foreach ($users as $users){

				echo"<div id=\"user$x\"><p class =\"leftText\">$users->username</p>";


					echo "<a class=\"rightText\" href=\"/logUser?userId=$users->id\">
						<i class=\"fas fa-sign-in-alt\"></i>
						<p> Login</p>
						</a></div>";
				$x++;

			}

			if ($x<3) {

			echo "<div class=\"addUser\">

			<a href=\"/addUser\">
					<i class=\"fas fa-user-plus\"></i>
					<p> Add a user</p>
				</a></div>";
			}


				?>

			</nav>

@stop
