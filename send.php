<?php

use App\Http\Controllers\studenController;
use Illuminate\Support\Facades\Route;

Route::post('getData',[studenController::class,'getData'])->name('getData');
