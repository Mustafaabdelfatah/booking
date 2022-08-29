<?php

use App\Http\Controllers\Admin\FindRoomController;
use App\Http\Controllers\Admin\SystemCalendarController;

Route::prefix('admin')->name('admin.')->group(function(){


    Route::get('login','AdminAuth@login')->name('login');
    Route::post('login','AdminAuth@dologin')->name('dologin');
    Route::get('register','AdminAuth@register')->name('register');
    Route::post('register','AdminAuth@doregister')->name('doregister');
        Route::group(['middleware' => 'admin:admin'],function(){
            //logout route
            Route::post('logout','AdminAuth@logout')->name('logout');
            Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('index');
            Route::resource('admins', AdminController::class);
            Route::resource('customers', CustomerController::class);
            Route::resource('slots', SlotController::class);
            Route::get('slot/time/{id}','TransactionController@attribute')->name('attribute');
            Route::post('slot/add-time/{id}','TransactionController@addDetails')->name('adddetails');
            Route::post('slot/edit-time/{id}','TransactionController@editDetails')->name('editdetails');
            Route::delete('/items/delete-attribute/{id}','TransactionController@deleteAttribute')->name('item.destroy');


        });
});




