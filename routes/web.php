<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

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


Route::group(['middleware' => [
    
    'auth','verified','check_role:isAdmin,isKetua,isSekum,isBendum,isOrganisasi,isBider,isRPK,isMedkom,isSBO,isHikmah,isKWU,isSospem,isKader,isAlumni,internal',
    
    ]], function () {

        Route::get('/', 'DashboardController@index');
        Route::get('report-activities-table', 'ActivityController@downloadPDF')->name('report.activities');
        Route::get('activities/{id}/set-finish', 'ActivityController@setFinish')->name('activities.finish');
        // masuk ke kalender di controller activities
        Route::get('activities/calendar', 'ActivityController@calendar')->name('activities.calendar');
        Route::get('activities/gallery/{id}', 'ActivityController@gallery')->name('activities.gallery');
});

Auth::routes(['verify' => true]);


// KUMPULAN RESOURCE

// resource activity
Route::resource('activities', 'ActivityController', [
    'middleware' => [
        'check_role:isKetua,isAdmin,isBider,isRPK,isHikmah,isMedkom', 'auth', 'verified'
    ]
]);

// resource gallery
Route::resource('galleries', 'GalleryController', [
    'middleware' => [
        'check_role:isKetua,isAdmin,isBider,isRPK,isHikmah,isMedkom', 'auth', 'verified'
    ]
]);

// resource user
Route::resource('users', 'UserController', [
    'middleware' => [
        'check_role:isKetua,isAdmin', 'auth', 'verified'
    ]
])->except(['create', 'store']);

// resource kader
Route::resource('kader', 'KaderController', [
    'middleware' => [
        'check_role:isKetua,isBider', 'auth', 'verified'
    ]
]);