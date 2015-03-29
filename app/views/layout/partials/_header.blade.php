<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ isset($pageTitle) ? $pageTitle : '' }} | Run for Earth with Miss Philippines Earth</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/datepicker.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
        {{ HTML::style('css/jquery.dataTables.css') }}
    </head>


     <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="logo" href="{{ URL::route('home') }}"><img src="{{asset('images/pontefino-logo.png')}}" title="Pontefino Logo" alt="Pontefino Logo"></a>
            </div>
            <div class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                @if($currentUser)
                <li><h4>Welcome, Admin!<h4></li>
                <li><a href="{{ URL::route('dashboard') }}">Home</a></li>
                <li><a href="{{URL::route('sessions.signout')}}">Logout</a></li>
                @else
                <li><a href="{{URL::route('home') . '#headerwrap'}}">Home</a></li>
                <li><a href="{{URL::route('home') . '#headerwrap'}}">Run Information</a></li>
                <li><a href="{{URL::route('home') . '#sign-up'}}">Registration</a></li>
                <li><a href="{{URL::route('home') . '#contact-us'}}">Contact Us</a></li>
                @endif
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div><!-- .navbar -->