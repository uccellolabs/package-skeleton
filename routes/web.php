<?php

Route::middleware('web', 'auth')
->namespace('Uccello\PackageSkeleton\Http\Controllers')
->name('package-skeleton.')
->group(function() {
    // Put your routes here
});