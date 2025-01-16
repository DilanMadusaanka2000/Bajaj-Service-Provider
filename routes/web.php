<?php
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\VehicleServiceController;
use App\Models\VehicleMaintain;
use App\Http\Controllers\SparePartsController;
use App\Http\Controllers\SparpartsDashbordController;
use App\Http\Controllers\InventryController;
use App\Http\Controllers\OrderController;

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard1');
//     })->name('dashboard1');
// });



//dashbord

 Route :: get('/service',[DashbordController::class, "index"])->name('get.user.roles');


 //customer View HomePage
 //Route :: get('/home',[CustomerHomeController::class, "index"])->name('home');






 //Customer Vehicle Maintain Crude

 Route :: prefix('/home')->group(function(){

     Route :: get('/',[CustomerHomeController::class, "index"])->name('home');
     Route :: get('/home2',[VehicleServiceController::class, "index"])->name('home2');
     Route :: get('/maintain',[CustomerHomeController::class, "maintain"])->name('maintain');
     Route :: post('/maintain/store',[CustomerHomeController::class, "store"])->name('maintain.store');
     Route :: get ('/maintain/time',[CustomerHomeController::class,"time"])->name('time');
     Route :: post('/maintain/save-time', [CustomerHomeController::class, 'saveTime'])->name('saveTime');


 });



 //spare parts ordering

// Route :: prefix('/home/spare-parts')->group(function(){

//     //Route :: get('/',[SparePartsController::class, "index"])->name('home');
//     Route::get('/', [SparePartsController::class, 'index'])->name('home');
//     Route::get('/shop', [SparePartsController::class, 'shop'])->name('shop');
//     Route::get('/cart', [SparePartsController::class, 'cart'])->name('cart');
//     Route::get('/orders', [SparePartsController::class, 'orders'])->name('orders');
//     Route::get('/category/{category}', [SparePartsController::class, 'category'])->name('category');


// });








// Route::get('/test-navbar', function () {
//     return view('SpareParts.Components.navbar');
// });








 //service appointmnet details

 Route :: prefix('/service/dashboard')->group(function(){

     Route::get('/',[DashbordController::class, "index"])->name('dashboard');
     Route::get('/maintain-request',[DashbordController::class, "maintainrequest"])->name('maintain.request');
     Route::post('/maintain-request/{id}/status', [CustomerHomeController::class, 'updateStatus'])->name('tasks.updateStatus');

     //Route::get('/maintain-request/time',[DashbordController::class, "maintainrequest"])->name('maintain.request.time');

 });

 //setting
 //user Rols & Permission

 Route :: get('/setting',[SettingController::class, "index"])->name('setting');



Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard1', function () {
    return view('dashboard1');
})->name('dashboard');




//dashboard

Route :: prefix('/sp/dashboard')->group(function(){

    Route::get('/', [SparpartsDashbordController::class, 'index'])->name('dashbord');


});



// dashboard inventory
Route :: prefix('/sp/dashboard/inventrory')->group(function(){


    Route::get('/', [InventryController::class, 'index'])->name('inventory');
    Route::get('/form', [InventryController::class, 'inventroyForm'])->name('inventory.form');
    Route::get('/form/view', [InventryController::class, 'show'])->name('inventory.view');
    Route::get('/form/update/{id}', [InventryController::class, 'updateView'])->name('inventory.update.view');


    Route::post('/form', [InventryController::class, 'store'])->name('inventory.form.store');
    Route::post('/maintain-request/{id}/status', [InventryController::class, 'update'])->name('update');




});




Route :: prefix('/sp/dashboard/order')->group(function(){

    Route::get('/', [OrderController::class, 'index'])->name('order');


});
