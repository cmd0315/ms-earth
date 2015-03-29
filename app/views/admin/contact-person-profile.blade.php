@extends('layout.master')

@section('content')
<div class="section home" id="results">
    <div class="container">
		<div class="row">
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
									<p><strong>ID:</strong> {{ $contact_person->registration_id }}</p>
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
								          <th>Race Shirt Size</th>
								        </tr>
								      </thead>
								      <tbody>
								      <?php $count = 0; ?>
								      @foreach($members as $member)
								        <tr>
								          <th scope="row">{{ ++$count }}</th>
								          <td>{{ e($member->name) }}</td>
								          <td>{{ e($member->age) }} </td>
								          <td>{{ e($member->segment) }}</td>
								          <td>{{ e($member->race_shirt_size) }}</td>
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
		</div>
	</div>
</div>
@stop