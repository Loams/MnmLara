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
				<div class="col-md-11 col-md-offset-1">
					ID : {{ $status->id }}
				</div>
				<div class="col-md-11 col-md-offset-1">
					Name : {{ $status->name }}
				</div>
				<div class="col-md-11 col-md-offset-1">
					Niveau : {{ $status->status_level }}
				</div>
			</div>
			<div class="ln_solid"></div>
			<div class="pull-right">
				<a href="javascript:history.back()" class="btn btn-primary">Retour</a>
			</div>
		</div>
	</div>
</div>
@endsection
