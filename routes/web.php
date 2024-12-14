<?php
use App\Http\Controllers\DashbordController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\CustomerHomeController;
use App\Http\Controllers\VehicleServiceController;
use App\Models\VehicleMaintain;

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


