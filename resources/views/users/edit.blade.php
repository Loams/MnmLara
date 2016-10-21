@extends('layouts.layout')

@section('content')

<div class="col-md-12 col-sm-12 col-xs-12">
	<div class="x_panel">
		<div class="x_title">
			<h2>Responsive example <small>Users</small></h2>
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<p class="text-muted font-13 m-b-30">
				Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
			</p>
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					{!! Form::open(['method'=>'PUT', 'route'=>['users.update',$users->id], 'class'=>'form-horizontal form-label-left input_mask']) !!}
					{{ csrf_field() }}
					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('firstname') ? ' has-error' : '' }}">
						<input type="text" class="form-control has-feedback-left" id="firstname" placeholder="First Name" name="firstname" value="{{ $users->firstname }}" required autofocus>
						<span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
						@if ($errors->has('firstname'))
						<span class="help-block"> <strong>{{ $errors->first('firstname') }}</strong> </span>
						@endif
					</div>

					<div class="col-md-6 col-sm-6 col-xs-12 form-group has-feedback {{ $errors->has('lastname') ? ' has-error' : '' }}">
						<input type="text" class="form-control" id="lastname" placeholder="Last Name" name="lastname" value="{{ $users->lastname }}" required autofocus>
						<span class="fa fa-user form-control-feedback right" aria-hidden="true"></span>
						@if ($errors->has('lastname'))
						<span class="help-block"> <strong>{{ $errors->first('lastname') }}</strong> </span>
						@endif
					</div>

					<div class="col-xs-12 form-group has-feedback {{ $errors->has('email') ? ' has-error' : '' }}">
						<input type="email" class="form-control has-feedback-left" id="email" placeholder="Email" name="email" value="{{ $users->email }}" required autofocus>
						<span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
						@if ($errors->has('email'))
						<span class="help-block"> <strong>{{ $errors->first('email') }}</strong> </span>
						@endif
					</div>

					<div class="form-group{{ $errors->has('oldpassword') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">old Password</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="oldpassword" type="password" class="form-control" name="oldpassword">
							@if ($errors->has('oldpassword'))
							<span class="help-block"> <strong>{{ $errors->first('oldpassword') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">New Password</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="newpassword" type="password" class="form-control" name="newpassword">
							@if ($errors->has('newpassword'))
							<span class="help-block"> <strong>{{ $errors->first('newpassword') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('newpassword_confirmation') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="newpassword_confirmation " type="password" class="form-control" name="newpassword_confirmation">
							@if ($errors->has('newpassword_confirmation'))
							<span class="help-block"> <strong>{{ $errors->first('newpassword_confirmation') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('law_id') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Roles</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<select id="law_id"  class="form-control" name="law_id" required autofocus>
								<option value="{{ $users->law_id }}">{{ $users->law->name }}</option>
								@foreach($laws as $law)
								@if($users->law->name != $law->name)
								<option  value="{{ $law->id }}">{{ $law->name }}</option>
								@endif
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
								<option value="{{ $users->society_id }}">{{ $users->society->name }}</option>  
								@foreach($societies as $society)
								@if($users->society->name != $society->name)
								<option  value="{{ $society->id }}">{{ $society->name }}</option>
								@endif
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
							<input type="text" class="form-control" id="photo" placeholder="Photo" name="photo" value="{{ $users->photo }}" required autofocus>
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
</div>
@endsection

