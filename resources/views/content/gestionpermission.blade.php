@extends('layouts.layout')

@section('css')
        <!-- iCheck -->
<link href="{{ url('/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endsection

@section('content')
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Responsive example
                    <small>Users</small>
                </h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p class="text-muted font-13 m-b-30">
                    Responsive is an extension for DataTables that resolves that problem by optimising the table's
                    layout for different screen sizes through the dynamic insertion and removal of columns from the
                    table.
                </p>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        {!! Form::model($permissions, ['route'=>['gestionpermission.update'], 'method'=>'put', 'class'=>'form-horizontal panel']) !!}
                        @foreach($roles as $role)

                            <div class="form-group">
                                <label class="col-md-3 col-sm-3 col-xs-12 control-label">{{ $role->display_name }}
                                    <br>
                                    <small class="text-navy">{{ $role->description }}</small>
                                </label>
                                <div class="col-md-9 col-sm-9 col-xs-12">
                                    @foreach($permissions as $permission)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" class="flat"
                                                       @if($permission->hasRole($role->id) != null && !$permission->hasRole($role->id)->isEmpty()) checked="checked"
                                                       @endif name="{{ $role->name }}_{{ $permission->name }}"> {{ $permission->display_name }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>


        {!! Form::submit('Envoyer', ['class'=>'btn btn-primary pull-right']) !!}
        {!! Form::close() !!}
    </div>
    @endsection

    @section('script')

            <!-- iCheck -->
    <script src="{{ url('/') }}/vendors/iCheck/icheck.min.js"></script>

@endsection
