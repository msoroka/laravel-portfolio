<?php

Route::get('test', function () {
    return 'It works';
})->middleware('verified');
