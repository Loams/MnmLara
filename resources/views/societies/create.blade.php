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
					{!! Form::open(['route'=>'societies.store', 'class'=>'form-horizontal panel']) !!}
					<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Name</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="name" type="text" class="form-control" name="name" required>
							@if ($errors->has('name'))
							<span class="help-block"> <strong>{{ $errors->first('name') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('siret') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Siret</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="siret" type="text" class="form-control" name="siret" required>
							@if ($errors->has('siret'))
							<span class="help-block"> <strong>{{ $errors->first('siret') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">Address</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="address" type="text" class="form-control" name="address" required>
							@if ($errors->has('address'))
							<span class="help-block"> <strong>{{ $errors->first('address') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('cp') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">CP</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="cp" type="text" class="form-control" name="cp" required>
							@if ($errors->has('cp'))
							<span class="help-block"> <strong>{{ $errors->first('cp') }}</strong> </span>
							@endif
						</div>
					</div>
					<div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
						<label class="control-label col-md-3 col-sm-3 col-xs-12">City</label>
						<div class="col-md-9 col-sm-9 col-xs-12">
							<input id="city" type="text" class="form-control" name="city" required>
							@if ($errors->has('city'))
							<span class="help-block"> <strong>{{ $errors->first('city') }}</strong> </span>
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
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection