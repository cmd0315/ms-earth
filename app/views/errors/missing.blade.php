@extends('layout.master')

@section('content')
<div class="section home" id="results">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
				<br>
				<div class="hline"></div>
				<h4>Sorry, the page that you are looking for is not available.</h4>
				<div class="row">
					<div class="col-lg-12">
						<a class="btn btn-theme pull-right" href="{{ URL::route('home') }}">Back</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop