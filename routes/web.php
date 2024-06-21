<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

Route::get('/', [ApiController::class, 'test']);
Route::post('/send', [ApiController::class, 'prompt'])->name('send')->middleware(['web', 'verify.gemini.api.key']);
