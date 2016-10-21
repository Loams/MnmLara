@extends('layouts.layout')

@section('content')
<div class="row">
	<div class="col-md-6 col-xs-12 col-md-offset-3">
		<div class="x_panel">
			<div class="x_title">
				<h2>Form Design <small>different form elements</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
					</li>
					<li>
						<a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				<br />
				<form class="form-horizontal form-label-left input_mask" role="form" method="POST" action="{{ url('/register') }}">
					{{ csrf_field() }}
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('firstname') ? ' has-error' : '' }}">
						<input type="text" class="form-control has-feedback-left" id="firstname" placeholder="First Name" name="firstname" value="{{ old('firstname') }}" required autofocus>
						<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
						@if ($errors->has('firstname'))
						<span class="help-block"> <strong>{{ $errors->first('firstname') }}</strong> </span>
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('lastname') ? ' has-error' : '' }}">
						<input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" value="{{ old('firstname') }}" required autofocus>
						<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						@if ($errors->has('lastname'))
						<span class="help-block"> <strong>{{ $errors->first('lastname') }}</strong> </span>
						@endif
					</div>

					<div class="col-xs-12 form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
						<input type="email" class="form-control has-feedback-left" id="email" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
						<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
						@if ($errors->has('email'))
						<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
						@endif
					</div>

					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="password" type="password" class="form-control" name="password" required>
							@if ($errors->has('password'))
							<span class="help-block"> <strong>{{ $errors->first('password') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="password_confirmation " type="password" class="form-control" name="password_confirmation" required>
							@if ($errors->has('password_confirmation'))
							<span class="help-block"> <strong>{{ $errors->first('password_confirmation') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('law_id') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Roles</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<select id="law_id"  class="form-control" name="law_id" required autofocus>
								<option>Choose option</option>
								@foreach($laws as $law)
								<option  value="{{ $law->id }}">{{ $law->name }}</option>
								@endforeach
							</select>
							@if ($errors->has('law_id'))
							<span class="help-block"> <strong>{{ $errors->first('law_id') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('society_id') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Society</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<select id="society_id"  class="form-control" name="society_id" required autofocus>
								<option>Choose option</option>
								@foreach($societies as $society)
								<option  value="{{ $society->id }}">{{ $society->name }}</option>
								@endforeach
							</select>
							@if ($errors->has('society_id'))
							<span class="help-block"> <strong>{{ $errors->first('society_id') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('photo') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Photo</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input type="text" class="form-control" id="photo" placeholder="Photo" name="photo" value="{{ old('photo') }}" required autofocus>
							@if ($errors->has('photo'))
							<span class="help-block"> <strong>{{ $errors->first('photo') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="ln_solid"></div>
					<div class="form-group">
						<div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
							<a href="javascript:history.back()" class="btn btn-primary">Cancel</a>
							<button type="submit" class="btn btn-success">
								Register
							</button>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
