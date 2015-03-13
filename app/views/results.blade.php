@extends('layout.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2" id="home">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<br>
	
	<div class="panel panel-default">
		<div class="panel-body">
			<h4>Category: <span class="text-danger">{{ e($participant->category) }}</span></h4>
			<h4>Segment: <span class="text-info">{{ e($participant->segment) }}</span></h4>
			<div class="hline"></div>
			<p>We sent you an email as a proof of your registration. Read the race event details in the attached waiver form. Print a copy and sign the waiver for. Present this to the ticket booth before the start of the race.</p>
			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-theme pull-right" href="{{ URL::route('home') }}">Back</a>
		</div>
	</div>
</div>
@stop