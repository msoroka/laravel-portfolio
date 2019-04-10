<?php

Route::get('/', 'PageController@adminDashboard')->name('dashboard');

Route::resource('users', 'Admin\UserController')->except([
    'show',
]);
Route::resource('roles', 'Admin\RoleController')->except([
    'show',
]);
Route::resource('socials', 'Admin\SocialController')->except([
    'show',
]);
Route::resource('projects', 'Admin\ProjectController')->except([
    'show',
]);
Route::resource('experiences', 'Admin\ExperienceController')->except([
    'show',
]);

