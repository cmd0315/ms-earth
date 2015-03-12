@include('layout.partials._header')

	<!-- *****************************************************************************************************************
	 HEADERWRAP
	 ***************************************************************************************************************** -->
	<div class="section" id="headerwrap">
	    <div class="container">
			<div class="row">
				@yield('content')
			</div><!-- /row -->
	    </div> <!-- /container -->
	</div><!-- /headerwrap -->

@include('layout.partials._footer')