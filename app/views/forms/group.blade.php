@extends('layout.master')

@section('content')
<div class="col-lg-8 col-lg-offset-2">
	<h1>{{ isset($pageTitle) ? $pageTitle : '' }}</h1>
	<br>

	<div class="panel panel-default">
		<div class="panel-body">
			<h4>Their Information</h4>
			<div class="hline"></div>
			<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>

			{{ Form::open(['role' => 'form', 'route' => ['group_registration.storeParticipantsRegistration']]) }}
				<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
					<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingOne">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
									Member #1
								</a>
							</h4>
						</div>
						<div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
							<div class="panel-body">
						      	<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="first_name_1">First Name</label>
											<input type="text" class="form-control" name="first_name_1" id="first_name_1"{{ (Input::old('first_name_1')) ? ' value ="' . Input::old('first_name_1') . '"' : '' }}>
											@if($errors->has('first_name_1'))
												<p class="bg-danger">{{ $errors->first('first_name_1') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="middle_name_1">Middle Name</label>
											<input type="text" class="form-control" name="middle_name_1" id="middle_name_1"{{ (Input::old('middle_name_1')) ? ' value ="' . Input::old('middle_name_1') . '"' : '' }}>
											@if($errors->has('middle_name_1'))
												<p class="bg-danger">{{ $errors->first('middle_name_1') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="last_name_1">Last Name</label>
											<input type="text" class="form-control" name="last_name_1" id="last_name_1"{{ (Input::old('last_name_1')) ? ' value ="' . Input::old('last_name_1') . '"' : '' }}>
											@if($errors->has('last_name_1'))
												<p class="bg-danger">{{ $errors->first('last_name_1') }}</p>
											@endif
										</div>
									</div>
								</div><!--.row -->
							  	<div class="row">
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="birthdate_1">Birth Date</label>
											<input type="date" class="form-control" name="birthdate_1" id="birthdate_1"{{ (Input::old('birthdate_1')) ? ' value ="' . Input::old('birthdate_1') . '"' : '' }}>
											@if($errors->has('birthdate_1'))
												<p class="bg-danger">{{ $errors->first('birthdate_1') }}</p>
											@endif
										</div>
							  		</div>
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="sex_1">Sex</label>
											<select class="form-control" name="sex_1" id="sex_1">
												<option value="0">Male</option>
												<option value="1">Female</option>
											</select>
											@if($errors->has('sex_1'))
												<p class="bg-danger">{{ $errors->first('sex_1') }}</p>
											@endif
										</div>
							  		</div>
							  	</div><!--.row -->
				      		</div><!-- .panel-body -->
				    	</div><!-- .panel-collapse -->
				  	</div><!-- .panel -->
				  	<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingTwo">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
									Member #2
								</a>
							</h4>
						</div>
						<div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
							<div class="panel-body">
						      	<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="first_name_2">First Name</label>
											<input type="text" class="form-control" name="first_name_2" id="first_name_2"{{ (Input::old('first_name_2')) ? ' value ="' . Input::old('first_name_2') . '"' : '' }}>
											@if($errors->has('first_name_2'))
												<p class="bg-danger">{{ $errors->first('first_name_2') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="middle_name_2">Middle Name</label>
											<input type="text" class="form-control" name="middle_name_2" id="middle_name_2"{{ (Input::old('middle_name_2')) ? ' value ="' . Input::old('middle_name_2') . '"' : '' }}>
											@if($errors->has('middle_name_2'))
												<p class="bg-danger">{{ $errors->first('middle_name_2') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="last_name_2">Last Name</label>
											<input type="text" class="form-control" name="last_name_2" id="last_name_2"{{ (Input::old('last_name_2')) ? ' value ="' . Input::old('last_name_2') . '"' : '' }}>
											@if($errors->has('last_name_2'))
												<p class="bg-danger">{{ $errors->first('last_name_2') }}</p>
											@endif
										</div>
									</div>
								</div><!--.row -->
							  	<div class="row">
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="birthdate_2">Birth Date</label>
											<input type="date" class="form-control" name="birthdate_2" id="birthdate_2"{{ (Input::old('birthdate_2')) ? ' value ="' . Input::old('birthdate_2') . '"' : '' }}>
											@if($errors->has('birthdate_2'))
												<p class="bg-danger">{{ $errors->first('birthdate_2') }}</p>
											@endif
										</div>
							  		</div>
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="sex_2">Sex</label>
											<select class="form-control" name="sex_2" id="sex_2">
												<option value="0">Male</option>
												<option value="1">Female</option>
											</select>
											@if($errors->has('sex_2'))
												<p class="bg-danger">{{ $errors->first('sex_2') }}</p>
											@endif
										</div>
							  		</div>
							  	</div><!--.row -->
				      		</div><!-- .panel-body -->
				    	</div><!-- .panel-collapse -->
				  	</div><!-- .panel -->
				  	<div class="panel panel-default">
						<div class="panel-heading" role="tab" id="headingThree">
							<h4 class="panel-title">
								<div class="row">
									<div class="col-lg-10">
										<a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="true" aria-controls="collapseThree">
											Member #3
										</a>
									</div>
									<div class="col-lg-2">
										<button class="btn btn-primary btn-xs pull-right" id="add-more" type="submit">Add More</button>
									</div>
								</div>
							</h4>
						</div>
						<div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
							<div class="panel-body">
						      	<div class="row">
									<div class="col-lg-4">
										<div class="form-group">
											<label for="first_name_3">First Name</label>
											<input type="text" class="form-control" name="first_name_3" id="first_name_3"{{ (Input::old('first_name_3')) ? ' value ="' . Input::old('first_name_3') . '"' : '' }}>
											@if($errors->has('first_name_3'))
												<p class="bg-danger">{{ $errors->first('first_name_3') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="middle_name_3">Middle Name</label>
											<input type="text" class="form-control" name="middle_name_3" id="middle_name_3"{{ (Input::old('middle_name_3')) ? ' value ="' . Input::old('middle_name_3') . '"' : '' }}>
											@if($errors->has('middle_name_3'))
												<p class="bg-danger">{{ $errors->first('middle_name_3') }}</p>
											@endif
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label for="last_name_3">Last Name</label>
											<input type="text" class="form-control" name="last_name_3" id="last_name_3"{{ (Input::old('last_name_3')) ? ' value ="' . Input::old('last_name_3') . '"' : '' }}>
											@if($errors->has('last_name_3'))
												<p class="bg-danger">{{ $errors->first('last_name_3') }}</p>
											@endif
										</div>
									</div>
								</div><!--.row -->
							  	<div class="row">
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="birthdate_3">Birth Date</label>
											<input type="date" class="form-control" name="birthdate_3" id="birthdate_3"{{ (Input::old('birthdate_3')) ? ' value ="' . Input::old('birthdate_3') . '"' : '' }}>
											@if($errors->has('birthdate_3'))
												<p class="bg-danger">{{ $errors->first('birthdate_3') }}</p>
											@endif
										</div>
							  		</div>
							  		<div class="col-lg-6">
										<div class="form-group">
											<label for="sex_3">Sex</label>
											<select class="form-control" name="sex_3" id="sex_3">
												<option value="0">Male</option>
												<option value="1">Female</option>
											</select>
											@if($errors->has('sex_3'))
												<p class="bg-danger">{{ $errors->first('sex_3') }}</p>
											@endif
										</div>
							  		</div>
							  	</div><!--.row -->
				      		</div><!-- .panel-body -->
				    	</div><!-- .panel-collapse -->
				  	</div><!-- .panel -->
				</div><!-- .panel-group -->
			  	<div class="row">
			  		<div class="col-lg-12">
			  			<input type="hidden" name="registration_type" id="registration_type" value="0">
			  			<button type="submit" class="btn btn-theme">Register</button>
			  		</div>
			  	</div><!--.row -->
			{{ Form::close() }}
		</div><!-- .panel-body -->
	</div><!-- .panel -->
</div>
@stop