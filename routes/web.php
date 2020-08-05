<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
})->name('/');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');




Route::group(['middleware' => 'auth','prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Pages'], function () {

    Route::get('company', 'AdminPageController@company')->name('company');
    Route::get('user', 'AdminPageController@user')->name('user');
    Route::get('packaging', 'AdminPageController@Packaging')->name('packaging');
    Route::get('category', 'AdminPageController@Category')->name('category');
    Route::get('type', 'AdminPageController@Type')->name('type');
    Route::get('shipment-in', 'AdminPageController@ShipmentIn')->name('shipment-in');
    Route::get('shipment-out', 'AdminPageController@ShipmentOut')->name('shipment-out');
   // Route::get('shipment-details/{ship}', 'AdminPageController@ShipmentDetails')->name('shipment-details');
    Route::get('shipment-out-details/{ship}', function ($shipId) {
        return view('pages.Admin.Shipment.Out.details',['shipId' => $shipId]);
    });

});