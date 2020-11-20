<?php

use Illuminate\Support\Facades\Route;

Route::get('/forms', function () {
    return view('forms.index');
});
