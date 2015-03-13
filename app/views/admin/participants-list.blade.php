@extends('layout.master')

@section('content')
<div class="col-lg-12" id="participant-list">
	<h1>List of Participants</h1>
	<div class="hline"></div>
	<br>
	
	<div class="row">
		<div class="col-lg-2">
			<ul class="list-group">
				<li class="list-group-item"><a href="{{ URL::route('dashboard') }}">All</a></li>
				<li class="list-group-item"><a href="{{ URL::route('admin.showKids') }}">Kids (12 - below)</a></li>
				<li class="list-group-item"><a href="{{ URL::route('admin.showTeens') }}">Teens (13 - 21)</a></li>
				<li class="list-group-item"><a href="{{ URL::route('admin.showAdults') }}">Adults (22 - 59)</a></li>
				<li class="list-group-item"><a href="{{ URL::route('admin.showSeniors') }}">Seniors (60 - above)</a></li>
			</ul>
		</div>
		<div class="col-lg-10">
			<div class="panel panel-default">
				<div class="panel-heading">
					<div class="row">
						<div class="col-md-10">
							<h3 class="panel-title">{{ isset($pageTitle) ? $pageTitle : '' }}</h3>
						</div>
						<div class="col-md-2">
							<a href="#" class="btn btn-primary btn-xs pull-right">Export All</a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					@if($participants)
					<h4>Total: <span class="text-info">{{ sizeof($participants) }}</span></h4>
					<table class="table table-condensed table-hover">
				      <thead>
				        <tr>
				          <th>#</th>
				          <th>Name</th>
				          <th>Age</th>
				          <th>Sex</th>
				          <th>Address</th>
				          <th>Email Address</th>
				          <th>Contact Number</th>
				          <th>Registration Type</th>
				          <th>Guardian</th>
				        </tr>
				      </thead>
				      <tbody>
				      @foreach($participants as $participant)
				        <tr>
				          <th scope="row">{{ ++$currentRow }}</th>
				          <td>{{ e($participant->name) }}</td>
				          <td>{{ e($participant->age) }} </td>
				          <td>{{ e($participant->segment) }}</td>
				          <td>{{ e($participant->address) }}</td>
				          <td>{{ e($participant->email_address) }}</td>
				          <td>{{ e($participant->contact_number) }}</td>
				          <td>{{ e($participant->registration->reg_type) }}</td>
				          <td></td>
				        </tr>
				        @endforeach
				      </tbody>
				    </table>
				    @else
				    	<h4>No results found</h4>
				    @endif
				</div><!-- .panel-body -->
			</div><!-- .panel -->
		</div>
	</div>
</div>
@stop