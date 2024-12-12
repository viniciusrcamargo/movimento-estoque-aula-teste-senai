<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\MovimentacaoEstoqueController;

Route::get('/', function () {
    return redirect('/item');
});

Route::resource('item', ItemController::class);
Route::resource('movimentacoes', MovimentacaoEstoqueController::class);
