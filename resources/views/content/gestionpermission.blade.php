@extends('layouts.layout')

@section('css')
        <!-- iCheck -->
<link href="{{ url('/') }}/vendors/iCheck/skins/flat/green.css" rel="stylesheet">
@endsection

@section('content')

        <div class="col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2><i class="fa fa-bars"></i> Vertical Tabs <small>Float left</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Settings 1</a>
                                </li>
                                <li><a href="#">Settings 2</a>
                                </li>
                            </ul>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">

                    <div class="col-xs-3">
                        <!-- required for floating -->
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs tabs-left">
                            @foreach($roles as $role)
                            <li @if($loop->first) class="active" @endif><a href="#{{ $role->id }}" data-toggle="tab">{{ $role->display_name }}</a>
                            </li>
                           @endforeach
                        </ul>
                    </div>

                    <div class="col-xs-9">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            @foreach($roles as $role)
                            <div class="tab-pane @if($loop->first)active @endif" id="{{ $role->id }}">
                                <p class="lead">{{ $role->display_name }}</p>
                                {!! Form::model($role, ['route'=>['role.updatepermission', $role->id], 'method'=>'put', 'class'=>'form-horizontal panel']) !!}
                                @foreach($permissions as $permission)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" class="flat"
                                                   @if($permission->hasRole($role->id) != null && !$permission->hasRole($role->id)->isEmpty()) checked="checked"
                                                   @endif name="{{ $permission->id }}"> {{ $permission->display_name }}
                                        </label>
                                    </div>
                                @endforeach
                                {!! Form::submit('Envoyer', ['class'=>'btn btn-primary pull-right']) !!}
                                {!! Form::close() !!}
                            </div>

                            @endforeach

                        </div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </div>
        </div>

        @endsection

        @section('script')

                <!-- iCheck -->
    <script src="{{ url('/') }}/vendors/iCheck/icheck.min.js"></script>
    <script>
        $('input').iCheck({
            checkboxClass: 'icheckbox_flat-green'
        });
    </script>
@endsection
