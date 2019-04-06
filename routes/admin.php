<?php

Route::get('/', 'PageController@adminDashboard')->name('dashboard');

Route::resource('users', 'Admin\UserController');
Route::resource('roles', 'Admin\RoleController');
Route::resource('socials', 'Admin\SocialController');

