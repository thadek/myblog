<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/login', function(){
    return "login";
});


Route::get('/logout', function(){
    return "logout";
});