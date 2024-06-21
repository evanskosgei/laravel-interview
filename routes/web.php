<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', [ApiController::class, 'test']);
Route::post('/send', [ApiController::class, 'prompt']);