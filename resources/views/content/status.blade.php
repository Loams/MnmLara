@extends('layouts.layout')

@section('css')
<!-- Datatables -->
    <link href="{{ url('/') }}/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
    <link href="{{ url('/') }}/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
@endsection

@section('content')

	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
			<div class="x_title">
				<h2>Responsive example <small>Users</small></h2>
				<ul class="nav navbar-right panel_toolbox">
					<li>
						<a href="{{ url('/status/create') }}"><i class="fa fa-plus"></i></a>
					</li>
					<li>
						<a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
					</li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
						<ul class="dropdown-menu" role="menu">
							<li>
								<a href="#">Settings 1</a>
							</li>
							<li>
								<a href="#">Settings 2</a>
							</li>
						</ul>
					</li>
					<li>
						<a class="close-link"><i class="fa fa-close"></i></a>
					</li>
				</ul>
				<div class="clearfix"></div>
			</div>
			<div class="x_content">
				{!! link_to_route('status.create','Ajouter un status', [], ['class'=>'btn btn-info pull-right']) !!}
				<p class="text-muted font-13 m-b-30">
					Responsive is an extension for DataTables that resolves that problem by optimising the table's layout for different screen sizes through the dynamic insertion and removal of columns from the table.
				</p>
				<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Id</th>
							<th>Name</th>
							<th>Level</th>
							<th>Actif</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						
						@foreach($statuses as $status)
					
						<tr>
							<td>{!! link_to_route('status.show', $status->id , [$status->id]) !!}</td>
							<td>{!! link_to_route('status.show', $status->name , [$status->id]) !!}</td>
							<td>{!! link_to_route('status.show', $status->status_level , [$status->id]) !!}</td>
							<td width=50px class="text-center">@if($status->status_level == 1)<i class="fa fa-check"></i>@else<i class="fa fa-close"></i>@endif</td>
							<td width=400px>
								<div class="row">
									<div class="col-xs-12 col-md-4 text-center">
										<a href="#" class="btn btn-small btn-default">
											<i class="fa fa-ban"></i>
											Désactiver
										</a>
									</div>
									<div class="col-xs-12 col-md-4 text-center">
										{!! link_to_route('status.edit', 'Modifier', [$status->id], ['class'=>'btn btn-small btn-default']) !!}
									</div>
									<div class="col-xs-12 col-md-4 text-center">
                                        	{!! Form::open(['method'=>'DELETE', 'route'=>['status.destroy',$status->id]]) !!}
												{!! Form::submit('Supprimer',['class'=>'btn btn-small btn-default', 'onclick'=>'return confirm(\'Vraiment supprimer cet utilisateur?\')']) !!}
											{!! Form::close() !!}
									</div>
								</div>
							</td>
						</tr>
					
						@endforeach
					</tbody>
				</table>

			</div>
		</div>
	</div>
</div>
</div>
@endsection

@section('script')
<!-- FastClick -->
<script src="{{ url('/') }}/vendors/fastclick/lib/fastclick.js"></script>
<!-- NProgress -->
<script src="{{ url('/') }}/vendors/nprogress/nprogress.js"></script>
<!-- Datatables -->

<script src="{{ url('/') }}/vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="{{ url('/') }}/vendors/datatables.net-scroller/js/datatables.scroller.min.js"></script>
<script src="{{ url('/') }}/vendors/jszip/dist/jszip.min.js"></script>
<script src="{{ url('/') }}/vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="{{ url('/') }}/vendors/pdfmake/build/vfs_fonts.js"></script>

<!-- Datatables -->
<script>
$(document).ready(function() {
var handleDataTableButtons = function() {
if ($("#datatable-buttons").length) {
$("#datatable-buttons").DataTable({
dom: "Bfrtip",
buttons: [
{
extend: "copy",
className: "btn-sm"
},
{
extend: "csv",
className: "btn-sm"
},
{
extend: "excel",
className: "btn-sm"
},
{
extend: "pdfHtml5",
className: "btn-sm"
},
{
extend: "print",
className: "btn-sm"
},
],
responsive: true
});
}
};

TableManageButtons = function() {
"use strict";
return {
init: function() {
handleDataTableButtons();
}
};
}();

$('#datatable').dataTable();

$('#datatable-keytable').DataTable({
keys: true
});

$('#datatable-responsive').DataTable();

$('#datatable-scroller').DataTable({
ajax: "js/datatables/json/scroller-demo.json",
deferRender: true,
scrollY: 380,
scrollCollapse: true,
scroller: true
});

$('#datatable-fixed-header').DataTable({
fixedHeader: true
});

var $datatable = $('#datatable-checkbox');

$datatable.dataTable({
'order': [[ 1, 'asc' ]],
'columnDefs': [
{ orderable: false, targets: [0] }
]
});
$datatable.on('draw.dt', function() {
$('input').iCheck({
checkboxClass: 'icheckbox_flat-green'
});
});

TableManageButtons.init();
});
</script>
<!-- /Datatables -->
@endsection
