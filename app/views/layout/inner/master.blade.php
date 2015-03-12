@include('layout.partials._header')

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div class="section">
	    <div class="container">
			<div class="row">
				@yield('content')
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->
	@include('flash::message')
@include('layout.partials._footer')