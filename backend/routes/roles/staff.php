<?php

    Route::group(['namespace' => 'Api\Staff', 'prefix' => 'staff'],function(){ 
        Route::get('list','StaffController@getStaffDetails');   
        Route::get('get_with_id/{staff_id}','StaffController@getStaffById');  
        Route::delete('delete/{id}','StaffController@deleteStaff');  
        Route::post('create-update','StaffController@createUpdateStaff');
    }); 