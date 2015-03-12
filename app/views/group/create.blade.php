@extends('layout.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2" id="home">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<h3>Register a group to the event</h3>
	<br>

</div>
@stop