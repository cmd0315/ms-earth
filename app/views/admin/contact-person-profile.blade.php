@extends('layout.master')

@section('content')
<div class="col-lg-12" id="participant-list">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<br>
	<div class="row">
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="row">
					<div class="col-lg-12">
						<h4>{{ $contact_person->name }}</h4>
						<div class="hline"></div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<p><strong>ID:</strong> {{ $contact_person->contact_person_id }}</p>
						<p><strong>Registration Type:</strong> {{ $contact_person->registration->reg_type }}</p>
						<p><strong>Address:</strong> {{ $contact_person->address }}</p>
						<p><strong>Email Address:</strong> {{ $contact_person->email_address }}</p>
						<p><strong>Contact Number:</strong> {{ $contact_person->contact_number }}</p>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<h4>Members:</h4>
						<table class="table table-condensed table-hover">
					      <thead>
					        <tr>
					          <th>#</th>
					          <th>Name</th>
					          <th>Age</th>
					          <th>Sex</th>
					        </tr>
					      </thead>
					      <tbody>
					      <?php $count = 0; ?>
					      @foreach($contact_person->registration->participants as $participant)
					        <tr>
					          <th scope="row">{{ ++$count }}</th>
					          <td>{{ e($participant->name) }}</td>
					          <td>{{ e($participant->age) }} </td>
					          <td>{{ e($participant->segment) }}</td>
					        </tr>
					        @endforeach
					      </tbody>
					    </table>
					</div>
				</div>
			</div><!-- .panel-body -->
		</div><!-- .panel -->
	</div>
	<div class="row">
		<div class="col-lg-12">
			<a href="{{URL::route('dashboard')}}" class="btn btn-theme pull-right">Back to List of Participants</a>
		</div>
	</div>
</div>
@stop