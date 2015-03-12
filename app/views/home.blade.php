@extends('layout.outer.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2" id="home">
	<h1>FUN RUN REGISTRATION</h1>
	<h3>Who are you registering?</h3>
	<br>
	<div class="panel panel-default">
		<!-- List group -->
		<ul class="list-group">
			<a href="{{ URL::route('individual_registration.create') }}"><li class="list-group-item">Myself</li></a>
			<a href="{{ URL::route('another_person_registration.create') }}"><li class="list-group-item">Another Person</li></a>
			<a href="{{ URL::route('group_registration.create') }}"><li class="list-group-item">A Group</li></a>
		</ul>
	</div>
</div>
@stop