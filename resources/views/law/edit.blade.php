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
					{!! Form::model($laws, ['route'=>['laws.update', $laws->id], 'method'=>'put', 'class'=>'form-horizontal panel']) !!}
					<div class="form-group {!! $errors->has('name') ? 'has-error' : '' !!}">
						{!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nom']) !!}
						{!! $errors->first('name', '<small class="help-block">:message</small>') !!}
					</div>
					<div class="form-group {!! $errors->has('law_level') ? 'has-error' : '' !!}">
						{!! Form::text('law_level', null, ['class'=>'form-control', 'placeholder'=>'Niveau']) !!}
						{!! $errors->first('law_level', '<small class="help-block">:message</small>') !!}
					</div>
					{!! Form::submit('Envoyer', ['class'=>'btn btn-primary pull-right']) !!}
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection