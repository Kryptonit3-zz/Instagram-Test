@extends('layout.master')

@section('title')
    @parent
    :: Home Page
@stop

@section('customcssfiles')
{!! HTML::style('vendors/magnific-popup/magnific-popup.css') !!}
@stop

@section('customcss')
#username-search small{display:none}
#username-error{
    background: #f4645f;
    color: #fff;
    padding: 8px 14px;
    margin-top: 10px;
    display: none;
}
#photos{margin-top:50px;display:none}
#photos .row .col-md-4{margin-bottom:20px}
@stop

@section('customjsfiles')
{!! HTML::script('vendors/magnific-popup/jquery.magnific-popup.min.js') !!}
@stop

@section('customjs')
$('#username-search').on('submit', function(e){
    e.preventDefault();
	$username = $(this).find('input').val();
    $button = $(this).find('button');
    $buttonText = $button.text();
    $button.attr('disabled','disabled');
    $button.text('Processing...');
    $error = $('#username-error');
	$.get('/search', {username: $username })
		.done(function (data) {
            $error.hide();
            $('#photos .row').empty();
			for(var i = 0; i < data.length; i++) {
				var img = data[i];
				var item = '<div class="col-xs-6 col-md-4"><a class="gallery-item" href="' + img.images.standard_resolution.url + '"><img src="' + img.images.thumbnail.url + '" alt="" /></a></div>';
				$('#photos .row').append(item);
			}
            $('#photos').show();
		})
		.error(function (data) {
            $('#photos').hide();
            $.each(data.responseJSON, function(key, value) {
                $error.show().find('small').text(key+': '+value);
                return false; // show one error only
            });
		})
        .always(function() {
            $button.removeAttr('disabled');
            $button.text($buttonText);
        });
});
$('.gallery').each(function() {
    $(this).magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: {
            enabled:true
        }
    });
});
@stop

@section('content')
    <section id="main-content">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2>Welcome, {{ auth()->user()->name }}</h2>
                    <hr class="star-primary">
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <form id="username-search">
                        <div class="input-group">
                            <input type="text" required="" class="form-control" placeholder="Enter an Instagram username...">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit">Search</button>
                            </span>
                        </div><!-- /input-group -->
                    </form>
                    <p id="username-error"><small></small></p>

                    <div id="photos">
                        <div class="row gallery">

                        </div>
                    </div>


                </div>
            </div>
        </div>

    </section>
@stop