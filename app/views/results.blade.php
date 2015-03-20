@extends('layout.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2" id="home">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<br>
	<div class="hline"></div>
	<p>	You have successfully registered to the event.</p>
	<p>Etiam tristique eros eget purus pharetra, eu eleifend ligula tincidunt. Morbi interdum consequat ipsum, quis porttitor lorem tempor non. Duis ullamcorper nisl vel orci varius vehicula. Etiam molestie erat et leo pretium sagittis. Maecenas ut diam molestie, vehicula nisl nec, pulvinar ipsum. Nunc viverra ex et nibh efficitur rhoncus. Sed ornare mi odio, id bibendum nunc malesuada et. Etiam et elit vel est condimentum sodales. In ante mi, posuere eu congue pellentesque, luctus a augue. Quisque sodales, massa ut tincidunt aliquam, ligula enim suscipit dolor, a elementum nisl nibh vel nisl. Suspendisse luctus nunc mattis mi dapibus faucibus. Morbi imperdiet urna vel leo consequat imperdiet. Aliquam erat volutpat. Curabitur non magna elit.</p>

	<div class="panel panel-default">
		<div class="panel-body">
			<div class="row">
				<div class="col-lg-6">
					<h4>Registration Type: <span class="text-info">{{ e($registration->reg_type) }}</span></h4>
					<h4>Participant/s:</h4>
				</div>
				<div class="col-lg-6">
					<h4>Date Registered: {{ e($registration->created_at) }}</h4>
				</div>
			</div>
			<table class="table">
				<thead>
					<tr>
						<th>Name</th>
						<th>Race Category</th>
						<th>Race Segment</th>
						<th>Race Shirt Size</th>
					</tr>
				</thead>
				<tbody>
					@foreach($registration->participants as $participant)
					<tr>
						<td>{{ $participant->name }}</td>
						<td>{{ $participant->category }}</td>
						<td>{{ $participant->segment }}</td>
						<td>{{ $participant->race_shirt_size }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			
		</div>
	</div>
	<div class="row">
		<div class="col-lg-12">
			<a class="btn btn-theme pull-right" href="{{ URL::route('home') }}">Back</a>
		</div>
	</div>
</div>
@stop