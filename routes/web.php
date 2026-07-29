<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/api/tickets');
Route::apiResource('api/tickets', TicketController::class)->only(['index', 'store', 'show', 'update']);
