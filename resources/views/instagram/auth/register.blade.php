@extends('layout.master')

@section('title')
    @parent
    :: Registration
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
                    <h2>Registration</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">

                    {!! Form::open(array('route'=>'register', 'class'=>'form-horizontal')) !!}

                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name">Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" id="name" placeholder="Enter name" required="">
                            @if ($errors->has('name'))
                                <small class="help-block">{{ $errors->first('name') }}</small>
                            @endif
                        </div>
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
                        <div class="form-group @if ($errors->has('password_confirmation')) has-error @endif">
                            <label for="password_confirmation">Confirm Password</label>
                            <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password" required="">
                            @if ($errors->has('password_confirmation'))
                                <small class="help-block">{{ $errors->first('password_confirmation') }}</small>
                            @endif
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </section>
@stop