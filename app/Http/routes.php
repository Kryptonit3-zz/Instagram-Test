<?php

get('/', ['as' => 'home', 'uses' => 'WelcomeController@index']);

// authenticated users only
group(['middleware' => 'auth'], function(){

    get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);

    get('search', ['as' => 'search', 'uses' => 'SearchController@getUsername']);

});

// guests only
group(['middleware' => 'guest'], function(){

    get('register', ['as' => 'register', 'uses' => 'AuthController@getRegister']);
    post('register', ['uses' => 'AuthController@postRegister']);

    get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
    post('login', ['uses' => 'AuthController@postLogin']);

});

get('test-success', function(){
   session()->flash('success', 'Testing success message!');
    return redirect()->route('home');
});

get('test-error', function(){
    session()->flash('error', 'Testing error message!');
    return redirect()->route('home');
});

