@extends('layout.master')

@section('title')
    @parent
    :: Login
@stop

@section('customcssfiles')

@stop

@section('customcss')

@stop

@section('customjsfiles')

@stop

@section('customjs')

@stop

@section('content')
    <section id="main-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Login</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::open(array('route'=>'login', 'class'=>'form-horizontal')) !!}

                    <div class="form-group @if ($errors->has('email')) has-error @endif">
                        <label for="email">Email address</label>
                        <input name="email" value="{{ old('email') }}" type="email" class="form-control" id="email" placeholder="Enter email" required="">
                        @if ($errors->has('email'))
                            <small class="help-block">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="form-group @if ($errors->has('password')) has-error @endif">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control" id="password" placeholder="Password" required="">
                        @if ($errors->has('password'))
                            <small class="help-block">{{ $errors->first('password') }}</small>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-success">Login</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </section>
@stop