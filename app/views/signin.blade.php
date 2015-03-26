@extends('layout.master')

@section('content')
<div class="section home" id="headerwrap">
    <div class="container">
		<div class="row">
			<div class="col-lg-6 col-lg-offset-3">
				<br>
				<div class="panel panel-default">
					<div class="panel-body">
						{{ Form::open(['role' => 'form', 'route' => ['sessions.store']]) }}
							<div class="form-group">
								<label for="username">Username</label>
								<input type="text" class="form-control" name="username" id="username"{{ (Input::old('username')) ? ' value ="' . Input::old('username') . '"' : '' }}>
								@if($errors->has('username'))
									<p class="bg-danger">{{ $errors->first('username') }}</p>
								@endif
							</div>
							<div class="form-group">
								<label for="password">Password</label>
								<input type="password" class="form-control" name="password" id="password">
								@if($errors->has('password'))
									<p class="bg-danger">{{ $errors->first('password') }}</p>
								@endif
							</div>
							<button type="submit" class="btn btn-theme">Submit</button>
						{{ Form::close() }}
					</div><!-- .panel-body -->
				</div><!-- .panel -->
			</div>
		</div><!-- /row -->
    </div> <!-- /container -->
</div><!-- .section -->

@stop