@extends('layout.master')

@section('content')
<div class="section home" id="results">
    <div class="container">
		<div class="row">
			<div class="col-lg-12" id="participant-list">
				<h1>List of Participants</h1>
				<div class="hline"></div>
				<br>
				
				<div class="row">
					<div class="col-lg-2">
						<ul class="list-group">
							<li class="list-group-item"><a href="{{ URL::route('dashboard') }}">All</a></li>
							<li class="list-group-item"><a href="{{ URL::route('admin.showJuniors') }}">Juniors (39 - below)</a></li>
							<li class="list-group-item"><a href="{{ URL::route('admin.showSeniors') }}">Seniors (40 - above)</a></li>
							<li class="list-group-item"><a href="{{ URL::route('admin.showContactPersons') }}">Contact Persons</a></li>
						</ul>
						<button type="button" id="{{ URL::route('admin.export') }}" class="btn btn-sm export">Export Participants</button>
					</div>
					<div class="col-lg-10">
						<div class="panel panel-default">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-9">
										<h3 class="panel-title">{{ isset($pageTitle) ? $pageTitle : '' }}</h3>
									</div>
									<div class="col-md-3">
										<div class="progress-div pull-right" style="display:none;">
											<i class="fa fa-lg fa-cog fa-spin"></i> Exporting the data ...
										</div>
									</div>
								</div>
							</div>
							<div class="panel-body">
								@if($participants)
								<div class="row">
									<div class="col-lg-2">
										<h4>Total: <span class="text-success">{{ sizeof($participants) }}</span></h4>
									</div>
									<div class="col-lg-2">
										<h4>Male: <span class="text-info">{{ $maleCount }}</span></h4>
									</div>
									<div class="col-lg-2">
										<h4>Female: <span class="text-danger">{{ $femaleCount }}</span></h4>
									</div>
								</div>
								<div class="row">
									<div class="col-lg-12">
										<table id="participants-table" class="table table-condensed table-hover">
									      <thead>
									        <tr>
									          <th>#</th>
									          <th>Name</th>
									          <th>Age</th>
									          <th>Gender</th>
									          <th>Address</th>
									          <th>Email Address</th>
									          <th>Contact Number</th>
									          <th>Date Registered</th>
									          @if(isset($contactPerson))
									          <th>Members</th>
									          @endif
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
									          <td>{{ e($participant->registration->date_registered) }}</td>
									          @if(isset($contactPerson))
									          <td><a href="{{URL::route('contact_person.show', e($participant->registration_id))}}" alt="List of Members"><i class="fa fa-users"></i> Members</a></td>
									          @endif
									        </tr>
									        @endforeach
									      </tbody>
									    </table>
									</div>
								</div>
							    @else
							    	<h4>No results found</h4>
							    @endif
							</div><!-- .panel-body -->
						</div><!-- .panel -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop