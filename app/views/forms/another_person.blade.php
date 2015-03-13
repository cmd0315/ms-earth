@extends('layout.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<br>

	<div class="panel panel-default">
		<div class="panel-body">
			<h4>His/Her Information</h4>
			<div class="hline"></div>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

			{{ Form::open(['role' => 'form', 'route' => ['another_person_registration.storeParticipantRegistration', e($contact_person->contact_person_id) ]]) }}
				<div class="row">
					<div class="col-lg-4">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input type="text" class="form-control" name="first_name" id="first_name"{{ (Input::old('first_name')) ? ' value ="' . Input::old('first_name') . '"' : '' }}>
							@if($errors->has('first_name'))
								<p class="bg-danger">{{ $errors->first('first_name') }}</p>
							@endif
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="middle_name">Middle Name</label>
							<input type="text" class="form-control" name="middle_name" id="middle_name"{{ (Input::old('middle_name')) ? ' value ="' . Input::old('middle_name') . '"' : '' }}>
							@if($errors->has('middle_name'))
								<p class="bg-danger">{{ $errors->first('middle_name') }}</p>
							@endif
						</div>
					</div>
					<div class="col-lg-4">
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input type="text" class="form-control" name="last_name" id="last_name"{{ (Input::old('last_name')) ? ' value ="' . Input::old('last_name') . '"' : '' }}>
							@if($errors->has('last_name'))
								<p class="bg-danger">{{ $errors->first('last_name') }}</p>
							@endif
						</div>
					</div>
				</div>
			  	<div class="row">
			  		<div class="col-lg-6">
						<div class="form-group">
							<label for="birthdate">Birth Date</label>
							<input type="date" class="form-control" name="birthdate" id="birthdate"{{ (Input::old('birthdate')) ? ' value ="' . Input::old('birthdate') . '"' : '' }}>
							@if($errors->has('birthdate'))
								<p class="bg-danger">{{ $errors->first('birthdate') }}</p>
							@endif
						</div>
			  		</div>
			  		<div class="col-lg-6">
						<div class="form-group">
							<label for="sex">Sex</label>
							<select class="form-control" name="sex" id="sex">
								<option value="0">Male</option>
								<option value="1">Female</option>
							</select>
							@if($errors->has('sex'))
								<p class="bg-danger">{{ $errors->first('sex') }}</p>
							@endif
						</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-lg-4">
						<div class="form-group">
							<label for="street">Street</label>
							<input type="text" class="form-control" name="street" id="street" value="{{ e($contact_person->street) }}">
							@if($errors->has('street'))
								<p class="bg-danger">{{ $errors->first('street') }}</p>
							@endif
						</div>
			  		</div>
			  		<div class="col-lg-4">
						<div class="form-group">
							<label for="city">City</label>
							<input type="text" class="form-control" name="city" id="city" value="{{ e($contact_person->city) }}">
							@if($errors->has('city'))
								<p class="bg-danger">{{ $errors->first('city') }}</p>
							@endif
						</div>
			  		</div>
			  		<div class="col-lg-4">
						<div class="form-group">
							<label for="province">Province</label>
							<input type="text" class="form-control" name="province" id="province" value="{{ e($contact_person->province) }}">
							@if($errors->has('province'))
								<p class="bg-danger">{{ $errors->first('province') }}</p>
							@endif
						</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-lg-6">
						<div class="form-group">
							<label for="email_address">Email Address</label>
							<input type="email_address" class="form-control" name="email_address" id="email_address" value="{{ e($contact_person->email_address) }}">
							@if($errors->has('email_address'))
								<p class="bg-danger">{{ $errors->first('email_address') }}</p>
							@endif
						</div>
			  		</div>
			  		<div class="col-lg-6">
						<div class="form-group">
							<label for="contact_number">Contact Number</label>
							<input type="text" class="form-control" name="contact_number" id="contact_number" value="{{ e($contact_person->contact_number) }}">
							@if($errors->has('contact_number'))
								<p class="bg-danger">{{ $errors->first('contact_number') }}</p>
							@endif
						</div>
			  		</div>
			  	</div>
			  	<div class="row">
			  		<div class="col-lg-12">
			  			<input type="hidden" name="registration_type" id="registration_type" value="1">
			  			<button type="submit" class="btn btn-theme">Submit</button>
			  		</div>
			  	</div>
			{{ Form::close() }}
		</div><!-- .panel-body -->
	</div><!-- .panel -->
</div>
@stop