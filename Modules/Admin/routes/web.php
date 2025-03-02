<?php

use Illuminate\Support\Facades\Route;
use Modules\Admin\Http\Controllers\AdminController;
use App\Livewire\MoneyConverter\MoneyConverter;
use App\Livewire\Todos\Todos;


Route::middleware(['web','auth'])->prefix('/admin')->name('admin.')->group(function(){
    Route::get('/', [AdminController::class,'index'])->name('index');
    Route::get('/component', [AdminController::class,'component'])->name('component');
    Route::get('/datatables', [AdminController::class,'datatables'])->name('datatables');
    Route::get('/money-converter', MoneyConverter::class);
    
});

Route::get('/todos', Todos::class);
