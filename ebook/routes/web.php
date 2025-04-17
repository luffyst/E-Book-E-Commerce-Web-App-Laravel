<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\HomeController;
use App\Models\Order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',function(){
    return view('user.userhome');
});

Route::get('/userhome', [HomeController::class,'userhome']) ->name('userhome');
Route::prefix('admin')->middleware(['auth','isadmin'])->group(function(){
Route::get('/adminhome', [HomeController::class, 'index'])->name('adminhome');
Route::get('/create-Book', [BookController::class, 'create'])->name('create');
Route::post('/store-Book', [BookController::class, 'store'])->name('store');
Route::get('/show-Book', [BookController::class, 'index'])->name('show');
Route::get('/delete-Book/{id}', [BookController::class, 'destroy'])->name('destroy');
Route::get('/edit-Book/{id}', [BookController::class, 'edit'])->name('edit');
Route::post('/update-Book/{id}', [BookController::class, 'update'])->name('update');
Route::get('/createcat-Category', [CategoryController::class, 'create'])->name('createcat');
Route::post('/storecat-Category', [CategoryController::class, 'storecat'])->name('store.cat');
Route::get('/showcat-Category', [CategoryController::class, 'index'])->name('showcat');
Route::get('/delete-Category/{id}', [CategoryController::class, 'destroy'])->name('destroycat');
Route::get('/edit-Category/{id}', [CategoryController::class, 'edit'])->name('edit.cat');
Route::post('/update-Category/{id}', [CategoryController::class, 'update'])->name('cat.update');
Route::get('/active-Category/{id}', [CategoryController::class, 'active'])->name('cat.active');
Route::get('/deactive-Category/{id}', [CategoryController::class, 'deactive'])->name('cat.deactive');
Route::post('/store-Order', [OrderController::class, 'storeorder'])->name('storeorder');
Route::get('/show-Order', [OrderController::class,'showorderdetalis'])->name('showorder');
Route::get('/active-order/{id}', [OrderController::class, 'active'])->name('order.active');
Route::get('/deactive-order/{id}', [OrderController::class, 'deactive'])->name('order.deactive');

});
Route::get('/update-quantity/{id}', [BookController::class, 'updateqty'])->name('update.quantity');
Route::get('/download-Order', [OrderController::class, 'show'])->name('download');
Route::get('/checkout', [OrderController::class, 'create'])->name('checkout');
Route::get('/order', [OrderController::class, 'index'])->name('order');
Route::get('/bookdetail-Book/{id}', [BookController::class, 'show'])->name('bookdetail');
Route::get('/books-Book', [BookController::class, 'allshow'])->name('books');
Route::post('/cart/{id}', [BookController::class, 'cart'])->name('cart');
Route::get('/show-cart', [BookController::class, 'showcart'])->name('show.cart');
Route::get('/remove-cart/{id}', [BookController::class, 'removecart'])->name('cart.remove');
Route::get('/about', function () {
    return view('user.about');
})->name('about');
Route::get('/contact', function () {
    return view('user.contact');
})->name('contact');

Route::get('/home', function () {
    return view('user.userhome');
})->name('userhome');

Auth::routes();


