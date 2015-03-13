<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>{{ isset($pageTitle) ? $pageTitle : '' }} | Ms. Earth 2015 Fun Run Registration</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        {{ HTML::style('css/bootstrap.min.css') }}
        {{ HTML::style('css/style.css') }}
        {{ HTML::style('css/font-awesome.min.css') }}
    </head>


     <body>
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <!-- Add your site or application content here -->

        <!-- Fixed navbar -->
        <div class="navbar navbar-default navbar-fixed-top" role="navigation">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="{{ URL::route('home') }}">MS. EARTH 2015</a>
            </div>
            <div class="navbar-collapse collapse navbar-right">
              <ul class="nav navbar-nav">
                <li><a href="{{ URL::route('home') }}"><i class="fa fa-home fa-2x"></i></a></li>
                @if(Auth::user())
                <li><a href="{{ URL::route('sessions.signout') }}"><i class="fa fa-sign-out fa-2x"></i></a></li>
                @else
                <li><a href="{{ URL::route('sessions.create') }}">ADMIN</a></li>
                @endif
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>