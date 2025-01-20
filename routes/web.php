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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserManagmentController;


use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route :: get('/welcome',[LoginController::class, "index"])->name('welcome1');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('welcome1');
    })->name('welcome1');
});



// Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
//     return view('dashboard');
// })->name('dashboard');




//dashbord

 Route :: get('/service',[DashbordController::class, "index"])->name('get.user.roles');


 //customer View HomePage
 //Route :: get('/home',[CustomerHomeController::class, "index"])->name('home');

 //setting
 //user Rols & Permission

 Route :: get('/setting',[SettingController::class, "index"])->name('setting');








 //Customer Vehicle Maintain Crude

 Route :: prefix('/home')->group(function(){

     Route :: get('/',[CustomerHomeController::class, "index"])->name('home1');
     Route :: get('/home2',[VehicleServiceController::class, "index"])->name('home2');
     Route :: get('/maintain',[CustomerHomeController::class, "maintain"])->name('maintain');
     Route :: post('/maintain/store',[CustomerHomeController::class, "store"])->name('maintain.store');
     Route :: get ('/maintain/time',[CustomerHomeController::class,"time"])->name('time');
     Route :: post('/maintain/save-time', [CustomerHomeController::class, 'saveTime'])->name('saveTime');


 });



 //spare parts ordering

Route :: prefix('/home/spare-parts')->group(function(){


    Route::get('/', [SparePartsController::class, 'index'])->name('home');
    Route::get('/spare-parts/{spareParts_id}', [SparePartsController::class, 'show'])->name('spareparts.buy'); // Detail page
    Route::post('/order/store', [SparePartsController::class, 'store'])->name('order.store');
    Route::get('/order/auth/login', [SparePartsController::class, 'login'])->name('order.login');
    Route::get('/order/auth/register', [AuthController::class, 'register'])->name('order.register');




});



 //service appointmnet details

 Route :: prefix('/service/dashboard')->group(function(){

     Route::get('/',[DashbordController::class, "index"])->name('dashboard');
     Route::get('/maintain-request',[DashbordController::class, "maintainrequest"])->name('maintain.request');
     Route::post('/maintain-request/{id}/status', [CustomerHomeController::class, 'updateStatus'])->name('tasks.updateStatus');

     //Route::get('/maintain-request/time',[DashbordController::class, "maintainrequest"])->name('maintain.request.time');

 });











//dashboard

Route :: prefix('/sp/dashboard')->group(function(){


    Route::get('/', [SparpartsDashbordController::class, 'login'])->name('dashbord.login');
    Route::post('/sp/dashboard/login', [SparpartsDashbordController::class, 'authenticate'])->name('login.authenticate');
   // Route::get('/registration', [SparpartsDashbordController::class, 'registration'])->name('dashbord.registration');
    Route::get('/maintain', [SparpartsDashbordController::class, 'index'])->name('dashbord.maintain');


});





// dashboard inventory
Route :: prefix('/sp/dashboard/inventrory')->group(function(){


    Route::get('/', [InventryController::class, 'index'])->name('inventory');
    Route::get('/form', [InventryController::class, 'inventroyForm'])->name('inventory.form');
    Route::get('/form/view', [InventryController::class, 'show'])->name('inventory.view');
    Route::get('/form/update/{id}', [InventryController::class, 'updateView'])->name('inventory.update.view');

    Route::get('/form/lowquantity', [InventryController::class, 'quantity'])->name('inventory.view.lowquantity');

    Route::post('/form', [InventryController::class, 'store'])->name('inventory.form.store');
    Route::post('/maintain-request/{id}/status', [InventryController::class, 'update'])->name('update');

    Route::put('/inventory/update/{id}', [InventryController::class, 'store'])->name('inventory.form.update');
    Route::post('/form', [InventryController::class, 'store'])->name('inventory.form.store'); // For creating
    Route::put('/form/update/{id}', [InventryController::class, 'store'])->name('inventory.form.update'); // For updating



});




Route :: prefix('/sp/dashboard/order')->group(function(){

    Route::get('/', [OrderController::class, 'index'])->name('order');
    Route::get('/view', [OrderController::class, 'showorder'])->name('orders.view');



});


Route :: prefix('/sp/dashboard/user')->group(function(){


    Route::get('/', [UserManagmentController::class, 'index'])->name('user');
    Route::get('/add', [UserManagmentController::class, 'addpage'])->name('user.add');



});

