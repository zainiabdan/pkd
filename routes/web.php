<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/about', function () {
//     return view('about');
// });

use Utils\Twilio;
 
Route::get('/test', function () {
    $from = '+14155238886';
    $to   = '+6288258551053';
    $body = 'Hello!';
    $twilio = new Twilio;
    try {
        return $twilio->sendSMS($from, $body, $to);
    } catch (\Throwable $th) {
        dd($th);
    }
    
});

// Auth::routes();


Route::get('test', function () {
    event(new App\Events\NewOrder('Someone'));
    return "Event has been sent!";
});


// Route::get('/detail', 'PagesController@detail');

Route::group(['middleware' => ['auth']], function() {//untuk kondisi sudah login
    // Route::get('/user', 'PagesController@index')->name('user');
    Route::get('/permission-denied', 'PagesController@denied');
    
    // Route::get('test-broadcast-notification', 'NotifikasiController@send');


    Route::get('/profile', 'PagesController@profile');
    Route::get('/profile/edit', 'PagesController@profileEdit');
    

    Route::get('/user/transactions/destroy/{id}', 'PagesController@destroyTrs');
    Route::get('/user/detailtransactions/destroy/{id}', 'DetailTransactionController@destroy');

    Route::get('/transaksi', 'PagesController@transaksi');
    
    Route::get('/detail/{id}', 'PagesController@detail');
    Route::get('/add-vehicle/{trs}', 'PagesController@addVehicle');
   
    Route::get('/store-added-vehicle/{trs}/{vehicle}', 'DetailTransactionController@addVehicle');


    Route::post('/profile/update', 'UserController@updateProfile');
    
    Route::post('/transaction/store', 'TransactionController@store');
    
    Route::post('/user-transactions-destroy', 'PagesController@modalTrsDestroy');
    Route::post('/user-detailtransactions-destroy', 'PagesController@modalDtlTrsDestroy');

    Route::group(['middleware' => ['checkRole:driver']], function()
    {
        Route::get('/driver-task', 'DriverController@showTask');
        Route::get('/driver-accept-task/{trs}/{driver}', 'DriverController@acceptTask');
        Route::get('/driver-finish-task/{trs}/{driver}', 'DriverController@finishTask');
            // Route::get('/role/create', 'RoleUserController@create');
            // Route::get('/role/edit/{id}', 'RoleUserController@edit');
            // Route::get('/role/destroy/{id}', 'RoleUserController@destroy');

            // Route::post('/user/update', 'UserController@update');
    });


    Route::group([ 'middleware' => ['checkRole:admin,superadmin'] ], function() 
    {//untuk kondisi login admin
        
        Route::get('/instansi', 'InstansiController@index');
        Route::get('/instansi/create', 'InstansiController@create');
        Route::get('/instansi/edit/{id}', 'InstansiController@edit');
        Route::get('/instansi/destroy/{id}', 'InstansiController@destroy');
        
        Route::get('/vehicles', 'VehiclesController@index');
        Route::get('/vehicles/create', 'VehiclesController@create');
        Route::get('/vehicles/edit/{id}', 'VehiclesController@edit');
        Route::get('/vehicles/destroy/{id}', 'VehiclesController@destroy');

        Route::get('/types', 'TypesController@index');
        Route::get('/types/edit/{id_type}', 'TypesController@edit');
        Route::get('/types/destroy/{id_type}', 'TypesController@destroy');
        
        Route::get('/transactions', 'TransactionController@index');
        Route::get('/transactions/destroy/{id}', 'TransactionController@destroy');
        Route::get('/transactions/detail/{id}', 'TransactionController@detailTransaction');
        Route::get('/transactions/set-driver/{trs}/{driver}', 'TransactionController@setDriver');
        
        Route::get('/dashboard',  'DashboardController@index');
        
        Route::get('/user/show/{id}', 'UserController@show');
        
        Route::get('/driver', 'DriverController@index');
        Route::get('/driver/show/user/{id}', 'DriverController@showUser');
        Route::get('/driver/destroy/{id}', 'DriverController@destroy');        
        
        Route::post('/driver-modal-destroy', 'DriverController@modalDestroy');
        Route::post('/driver/store', 'DriverController@store');        
        
        
        Route::post('/dashboard',  'DashboardController@dashboardFilter');

        Route::post('/instansi-modal-destroy', 'InstansiController@modalDestroy');
        Route::post('/types-modal-destroy', 'TypesController@modalDestroy');
        
        Route::post('/vehicle-modal-destroy', 'VehiclesController@modalDestroy');
        
        Route::post('/transactions-modal-set-status', 'TransactionController@modalSet');
        Route::post('/transactions-modal-destroy', 'TransactionController@modalDestroy');
        Route::post('/transactions-modal-decline', 'TransactionController@modalDecline');
        Route::post('/transactions-select-driver', 'TransactionController@modalDriver');

        Route::post('/transactions/set', 'TransactionController@setStatus');
        
        Route::post('/transactions/set-driver/{trs}/{driver}', 'TransactionController@setDriver');
        
        Route::post('/instansi/store', 'InstansiController@store');
        Route::post('/instansi/update', 'InstansiController@update');

        Route::post('/types/store', 'TypesController@store');
        Route::post('/types/update', 'TypesController@update');
        
        Route::post('/vehicles/store', 'VehiclesController@store');
        Route::post('/vehicles/update', 'VehiclesController@update');
        

        
        Route::group(['middleware' => ['checkRole:superadmin']], function()
        {

            Route::get('/role', 'RoleUserController@index');
            Route::get('/role/create', 'RoleUserController@create');
            Route::get('/role/edit/{id}', 'RoleUserController@edit');
            Route::get('/role/destroy/{id}', 'RoleUserController@destroy');


            Route::get('/user', 'UserController@index');
            Route::get('/user/create', 'UserController@create');
            Route::get('/user/edit/{id}', 'UserController@edit');
            Route::get('/user/destroy/{id}', 'UserController@destroy');

            Route::post('/user/update', 'UserController@update');
        });
        
    });
});


Route::get('/', 'HomeController@index');
// Route::get('/login', 'PagesController@login')->name('login');
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', 'PagesController@welcome')->name('welcome');

Route::get('/postest', 'PagesController@post');

Route::get('/vehicle-schedule/{id}', 'ScheduleController@vehicle');

Route::get('/booking/{id}', 'BookingController@show');
Route::get('/about', 'PagesController@about');
Route::get('/contact', 'PagesController@contact');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');

