@extends('layout.master')

@section('content')
<!-- *****************************************************************************************************************
 HEADERWRAP
 ***************************************************************************************************************** -->
<div class="section home" id="headerwrap">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2" id="home">
				<img src="{{asset('images/header.png')}}" title="Miss Earth 2015 Fun Run Header" alt="Miss Earth 2015 Fun Run Header">
				<div class="description">
					<p class="first">A 3K run alongside the candidates of Miss Philippines Earth 2015 to aid the Calumpang River Rehabilitation</p>
					<h4>APRIL 25, 2015 | Assembly time: 5:00AM | SM City Batangas Parking Grounds</h4>
					<p>Registration fee: Php500 inclusive of race kit with shirt</p>
					<a href="#" class="btn btn-theme-info">Register now!</a>
				</div>
			</div>
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- .section -->
<div class="section" id="sign-up">
    <div class="container">
		<div class="row">
			<div class="col-lg-8 col-lg-offset-2">
				<h2>Sign up</h2>
				<span class="decor"></span>
				<div class="description">
					<p>Vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. </p>
				</div>
				<div class="form">
					{{ Form::open(['role' => 'form', 'route' => ['home.store']]) }}
					<div class="participant" id="originalParticipant">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control" name="first_name" id="first_name"{{ (Input::old('first_name')) ? ' value ="' . Input::old('first_name') . '"' : '' }} placeholder="First Name">
									@if($errors->has('first_name'))
										<p class="bg-danger">{{ $errors->first('first_name') }}</p>
									@endif
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control" name="last_name" id="last_name"{{ (Input::old('last_name')) ? ' value ="' . Input::old('last_name') . '"' : '' }} placeholder="Last Name">
									@if($errors->has('last_name'))
										<p class="bg-danger">{{ $errors->first('last_name') }}</p>
									@endif
								</div>
							</div>
						</div>
					  	<div class="row">
					  		<div class="col-lg-12">
								<div class="form-group">
									<input type="text" class="form-control" name="complete_address_1" id="complete_address_1"{{ (Input::old('complete_address_1')) ? ' value ="' . Input::old('complete_address_1') . '"' : '' }} placeholder="Complete Address">
									@if($errors->has('complete_address_1'))
										<p class="bg-danger">{{ $errors->first('complete_address_1') }}</p>
									@endif
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-lg-12">
								<div class="form-group">
									<input type="text" class="form-control" name="complete_address_2" id="complete_address_2"{{ (Input::old('complete_address_2')) ? ' value ="' . Input::old('complete_address_2') . '"' : '' }}>
									@if($errors->has('complete_address_2'))
										<p class="bg-danger">{{ $errors->first('complete_address_2') }}</p>
									@endif
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control special-date" id="birthdate" name="birthdate"{{ (Input::old('birthdate')) ? ' value ="' . Input::old('birthdate') . '"' : '' }} placeholder="Birthdate">
									
									@if($errors->has('birthdate'))
										<p class="bg-danger">{{ $errors->first('birthdate') }}</p>
									@endif
								</div>
					  		</div>
					  		<div class="col-lg-6">
								<div class="form-group">
									{{ Form::select('gender', ['' => 'Gender'] + $genders, Input::old('gender'), ['class' => 'form-control', 'id' => 'gender']) }}
									@if($errors->has('gender'))
										<p class="bg-danger">{{ $errors->first('gender') }}</p>
									@endif
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-lg-6">
								<div class="form-group">
									<input type="email_address" class="form-control" name="email_address" id="email_address"{{ (Input::old('email_address')) ? ' value ="' . Input::old('email_address') . '"' : '' }} placeholder="Email Address">
									@if($errors->has('email_address'))
										<p class="bg-danger">{{ $errors->first('email_address') }}</p>
									@endif
								</div>
					  		</div>
					  		<div class="col-lg-6">
								<div class="form-group">
									<input type="text" class="form-control" name="contact_number" id="contact_number"{{ (Input::old('contact_number')) ? ' value ="' . Input::old('contact_number') . '"' : '' }} placeholder="Contact Number">
									@if($errors->has('contact_number'))
										<p class="bg-danger">{{ $errors->first('contact_number') }}</p>
									@endif
								</div>
					  		</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-lg-6">
								<div class="form-group">
									{{ Form::select('race_shirt_size', ['' => 'Shirt Size'] + $race_shirt_sizes, Input::old('race_shirt_size'), ['class' => 'form-control', 'id' => 'race_shirt_size']) }}
									@if($errors->has('race_shirt_size'))
										<p class="bg-danger">{{ $errors->first('race_shirt_size') }}</p>
									@endif
								</div>
					  		</div>
					  	</div>
					</div><!-- #originalParticipant -->
					@for($i=2; $i<=$max_replicate; $i++)
						<div class="participant others" style="display:none;" id="others-{{$i}}">
							<label for="remove-field-{{$i}}" id="addmore-label" class="pull-right">
								<button type="button" id="remove-field-{{$i}}" class="btn btn-theme-addmore" onclick="removeField()"><i class="fa fa-minus"></i></button> Remove
							</label>
							<h4>Member {{$i}}</h4>
							<div class="row">
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control" name="more_first_name[]" placeholder="First Name">
										@if($errors->has('more_first_name'))
											<p class="bg-danger">{{ $errors->first('more_first_name') }}</p>
										@endif
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control" name="more_last_name[]" placeholder="Last Name">
										@if($errors->has('more_last_name'))
											<p class="bg-danger">{{ $errors->first('more_last_name') }}</p>
										@endif
									</div>
								</div>
							</div>
						  	<div class="row">
						  		<div class="col-lg-6">
									<div class="form-group">
										<input type="text" class="form-control special-date" name="more_birthdate[]" placeholder="Birthdate">
										@if($errors->has('more_birthdate'))
											<p class="bg-danger">{{ $errors->first('more_birthdate') }}</p>
										@endif
									</div>
						  		</div>
						  		<div class="col-lg-6">
									<div class="form-group">
										{{ Form::select('more_gender[]', ['' => 'Gender'] + $genders, Input::old('more_gender'), ['class' => 'form-control']) }}
										@if($errors->has('more_gender'))
											<p class="bg-danger">{{ $errors->first('more_gender') }}</p>
										@endif
									</div>
						  		</div>
						  	</div>
						  	<div class="row">
						  		<div class="col-lg-6">
									<div class="form-group">
										{{ Form::select('more_race_shirt_size[]', ['' => 'Shirt Size'] + $race_shirt_sizes, Input::old('more_race_shirt_size'), ['class' => 'form-control']) }}
										@if($errors->has('more_race_shirt_size'))
											<p class="bg-danger">{{ $errors->first('more_race_shirt_size') }}</p>
										@endif
									</div>
						  		</div>
						  	</div>
						</div><!-- .participant others-->
					@endfor
					<div>
					  	<div class="row">
					  		<div class="col-lg-6">
								<div class="form-group">
									<label for="addmore" id="addmore-label">
										<button type="button" id="addmore" class="btn btn-theme-addmore" onclick="addFields()"><i class="fa fa-plus fa-lg"></i></button> Add more
									</label>
								</div>
					  		</div>
					  		<div class="col-lg-6">
								<div class="checkbox ull">
									<label for="terms" id="terms-label">
										<input type="checkbox" name="terms" id="terms"{{ (Input::old('terms')) ? ' checked' : '' }}> <a data-toggle="modal" data-target="#termsModal">I have read and understand the Terms and Conditions</a>
									</label>
									@if($errors->has('terms'))
										<p class="bg-danger">{{ $errors->first('terms') }}</p>
									@endif
								</div>
		  					</div>
					  	</div>
					  	<div class="row">
					  		<div class="col-lg-12">
								<div class="form-group">
						  			<input type="hidden" name="registration_type" id="registration_type" value="0">
						  			<button type="submit" class="btn btn-theme pull-right">Submit</button>
						  		</div>
					  		</div>
					  	</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- .section -->
@stop