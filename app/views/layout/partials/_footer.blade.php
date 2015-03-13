    <!-- Splash Message -->
    @if(Session::has('global'))
        <div class="alert alert-info flash-msg">
            <p class="emphasize"> {{ Session::get('global') }} </p>
        </div>
    @elseif(Session::has('global-error'))
        <div class="alert alert-danger flash-msg">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <p class="emphasize"> {{ Session::get('global-error') }} </p>
        </div>
    @elseif(Session::has('global-successful')) 
        <div class="alert alert-success flash-msg">
            <a href="#" class="close" data-dismiss="alert">&times;</a>
            <p class="emphasize"> {{ Session::get('global-successful') }} </p>
        </div>
    @endif

    <!-- *****************************************************************************************************************
        FOOTER
     ***************************************************************************************************************** -->
        <div id="footerwrap">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <h4>About</h4>
                        <div class="hline-w"></div>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Social Links</h4>
                        <div class="hline-w"></div>
                        <p>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </p>
                    </div>
                    <div class="col-lg-4">
                        <h4>Location</h4>
                        <div class="hline-w"></div>
                        <p>Pontefino</p>
                        <p>
                          Pastor Village, Gulod, Labac, Batangas City
                        </p>
                    </div>
                </div><! --/row -->
                <br>
                <div class="row">
                    <div class="col-lg-12">
                        <p>&copy; 2015 Miss Earth</p>
                    </div>
                </div><! --/row -->
            </div><! --/container -->
        </div><! --/footerwrap -->

        {{ HTML::script('js/jquery-1.10.2.min.js') }}
        {{ HTML::script('js/bootstrap.min.js') }}
        {{ HTML::script('js/retina-1.1.0.js') }}
        {{ HTML::script('js/jquery.hoverdir.js') }}
        {{ HTML::script('js/jquery.hoverex.min.js') }}
        {{ HTML::script('js/jquery.prettyPhoto.js') }}
        {{ HTML::script('js/jquery.isotope.min.js') }}
        {{ HTML::script('js/scripts.js') }}
        <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    </body>
</html>