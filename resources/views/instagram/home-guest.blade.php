@extends('layout.master')

@section('title')
    @parent
    :: Home Page
@stop

@section('customcssfiles')

@stop

@section('customcss')
.fa-instagram{font-size:10em}
.skills a{color:#2c3e50}
@stop

@section('customjsfiles')

@stop

@section('customjs')

@stop

@section('content')
    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <i class="fa fa-instagram fa-5"></i>
                    <div class="intro-text">
                        <span class="name">Welcome to Instagram!</span>
                        <hr class="star-light">
                        <span class="skills"><a href="{{ route('register') }}">Register</a> an account to get started!</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
@stop