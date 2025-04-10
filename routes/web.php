<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get("/", [AuthController::class,"login"]);

Route::group(['middleware'=> ['auth']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.list');

    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');

    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');

    Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');

    Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');

    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');

    Route::delete('/tickets/{id}', [TicketController::class, 'destroy'])->name('tickets.destroy');

    Route::get('logout', [AuthController::class, 'logout']);

    Route::get('/home', function(){
        return redirect()->route('dashboard');
    });
    Route::get('/register', function(){
        return redirect()->route('dashboard');
    });
    Route::get('/login', function(){
        return redirect()->route('dashboard');
    });

});

Route::group(['middleware'=> ['guest']], function () {

    Route::get('/register', [AuthController::class, 'register'])->name('register');

    Route::post('/register', [AuthController::class, 'store']);

    Route::get('/login', [AuthController::class, 'login'])->name('login');

    Route::post('/login', [AuthController::class, 'authenticate']);

});
