<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::group(['middleware' => 'api', 'prefix' => 'v1', 'as' => 'api.'], function () {

    Route::group(['prefix' => 'Category', 'as' => 'Category.', 'namespace' => 'Category'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/category', 'ListCategory@list')->name('category');
        });
        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('/{id}/category', 'UpdateCategory@updates')->name('update-category');
        });
        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('/{id}/category', 'DeleteCategory@delete')->name('delete-category');
        });
        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/category', 'CreateCategory@create')->name('create-category');
        });
    });

    Route::group(['prefix' => 'Type', 'as' => 'Type.', 'namespace' => 'Type'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/type', 'ListType@list')->name('type');
        });
        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('/{id}/type', 'UpdateType@updates')->name('update-type');
        });
        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('/{id}/type', 'DeleteType@delete')->name('delete-type');
        });
        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/type', 'CreateType@create')->name('create-type');
        });
    });

    Route::group(['prefix' => 'Packaging', 'as' => 'Packaging.', 'namespace' => 'Packaging'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/category', 'ListPackagingCategory@list')->name('packaging');
            Route::get('/all-type', 'ListPackagingType@all')->name('all-type');
            Route::get('/{category_id}/type', 'ListPackagingType@list')->name('type');
            Route::get('{id}/packaging-details', 'ListPackagingBasedOnCategory@list')->name('packaging-details');
            Route::get('{type_name}/packaging-no', 'ListPackagingBasedOnType@list')->name('packaging-no');
            Route::get('{id}/{type_name}/max-packaging_no', 'ListMaximumPackagingNo@execute')->name('max-packaging_no');
        });
        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('/{id}/type', 'UpdatePackaging@updates')->name('update-packaging');
            Route::post('/{packagingNo}/{status}/status', 'UpdatePackagingStatus@updates')->name('update-packaging-status');
        });
        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('/{id}/packaging', 'DeletePackaging@delete')->name('delete-packaging');
        });
        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/{quantity}/{packagingNo}/packaging', 'CreatePackaging@create')->name('create-packaging');
        });
    });

    Route::group(['prefix' => 'Shipment', 'as' => 'Shipment.', 'namespace' => 'Shipment'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('/all', 'ListShipment@list')->name('all');
            Route::get('/{id}/details', 'ListShipment@details')->name('details');
        });
        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('/{id}/shipment', 'UpdateShipment@updates')->name('update-shipment');
        });
        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('/{id}/shipment', 'DeleteShipment@delete')->name('delete-shipment');
        });
        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/shipment', 'CreateShipment@create')->name('create-shipment');
        });
    });

    Route::group(['prefix' => 'Movement', 'as' => 'Movement.', 'namespace' => 'Movement'], function () {
        Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
            Route::get('{id}/movement', 'ListMovement@list')->name('movement');
            Route::get('{packaging_no}/{status}/search', 'SearchMovementPackaging@search')->name('search');
        });
        Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
            Route::post('{status}/{option}/movement', 'UpdateMovement@updates')->name('update-movement');
        });
        Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
            Route::delete('/{id}/{status}/movement', 'DeleteMovement@delete')->name('delete-movement');
        });
        Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
            Route::post('/movement', 'CreateMovement@create')->name('create-movement');
        });
    });

    Route::group(['prefix' => 'Personnel', 'as' => 'Personnel.', 'namespace' => 'Personnel'], function () {

        Route::group(['prefix' => 'Company', 'as' => 'Company.', 'namespace' => 'Company'], function () {
            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
                Route::get('/all', 'ListCompany@list')->name('all');
                Route::get('/dropdown-list-company', 'ListCompany@dropdownList')->name('dropdown-list-company');
            });
            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
                Route::post('/company', 'CreateCompany@create')->name('create-company');
            });
            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
                Route::post('/{id}/company', 'UpdateCompany@update')->name('update-company');
            });
            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
                Route::delete('/{id}/company', 'DeleteCompany@delete')->name('delete-company');
            });
        });

        Route::group(['prefix' => 'User', 'as' => 'User.', 'namespace' => 'User'], function () {
            Route::group(['prefix' => 'Lists', 'as' => 'Lists.','namespace' => 'Lists'], function () {
                Route::get('/all', 'ListUser@list')->name('all');
            });
            Route::group(['prefix' => 'Creates', 'as' => 'Creates.','namespace' => 'Creates'], function () {
                Route::post('/user', 'CreateUser@create')->name('create-user');
            });
            Route::group(['prefix' => 'Updates', 'as' => 'Updates.','namespace' => 'Updates'], function () {
                Route::post('/{id}/user', 'UpdateUser@update')->name('update-user');
            });
            Route::group(['prefix' => 'Deletes', 'as' => 'Deletes.','namespace' => 'Deletes'], function () {
                Route::delete('/{id}/user', 'DeletesUser@delete')->name('delete-user');
            });
        });
    });

});



