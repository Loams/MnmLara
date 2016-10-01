
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    @if (Auth::guest())
    <div class="row">
        <p class="col-xs-12 col-sm-12 greyblue text-center alerte">
            Vous devez etre connecté pour accéder à cette page
        </p>
    </div>
    @endif
    <!--
    {if isset($desactive) && $desactive eq true}
    <div class="row">
        <p class="col-xs-12 col-sm-12 greyblue text-center alerte">
            Votre compte a été désactiver veuillez contacter l'administrateur du site
        </p>
    </div>
    {/if}
    -->
    <div class="row">
        <p class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-5 col-md-4 col-md-offset-7 col-lg-3 col-lg-offset-6 greyblue text-center" id="welcome">
            Bienvenue
        </p>
    </div>
    <div class="row greyblue">
        <div class="col-sm-2 col-sm-offset-1 col-md-3 col-md-offset-1 col-lg-3 col-lg-offset-1">
            <div class="row">
                <h1 class="titre">MnM's Tickets</h1>
                
                    <img id="logo" src="/images/logo.png" alt="">
                
                
            </div>

        </div>

        <p class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-2 col-md-4 col-md-offset-3 col-lg-3 col-lg-offset-2 blabla text-center">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
        </p>

    </div>
    <div class="row">
        <form method="post" action="{{ url('/login') }}" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-5 col-md-4 col-md-offset-7 col-lg-3 col-lg-offset-6 greyblue" id="formulaire">
            {{ csrf_field() }}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
            	@if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="Email">

            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            	@if ($errors->has('password'))
	                <span class="help-block">
	                    <strong>{{ $errors->first('password') }}</strong>
	                </span>
	            @endif
            <input id="password" type="password" class="form-control" name="password" required>
            </div>
           	<div class="form-group">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember"> Remember Me
                        </label>
                    </div>
            </div>
          	<div class="form-group">
		       
		            <button type="submit" class="btn btn-default" id="submit">
		                Go
		            </button>
		
		            <a class="btn btn-link" href="{{ url('/password/reset') }}">
		                Forgot Your Password?
		            </a>
		      
		    </div>
		</form>
                <!--
        <div class="row">
            <p id="powered" class="col-xs-2 col-xs-offset-3 col-sm-2 col-sm-offset-5 col-md-12 col-md-offset-12 col-lg-2 col-lg-offset-1">
                Powered by TNLogs
            </p>
        </div>
                -->
        
        <div class="row">
            <div id="social" class="col-xs-8 col-xs-offset-2 col-sm-6 col-sm-offset-5 col-md-4 col-md-offset-7 col-lg-3 col-lg-offset-6">
                <ul class="row">
                    <li class="col-xs-4 col-sm-4 text-center"><a href="https://www.facebook.com"><i class="fa fa-facebook-square"></i></a></li>
                    <li class="col-xs-4 col-sm-4 text-center"><a href="https://www.twitter.com"><i class="fa fa-twitter-square"></i></a></li>
                    <li class="col-xs-4 col-sm-4 text-center"><a href="mailto:mnms.tickets@gmail.com"><i class="fa fa-envelope"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection