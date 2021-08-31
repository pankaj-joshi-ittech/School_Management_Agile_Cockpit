<?php

    Route::group(['namespace' => 'Api\Student', 'prefix' => 'student'],function(){ 
        Route::get('get','StudentController@getStudentDetails');   
        Route::get('get_with_id/{id}','StudentController@getStudentById');  
        Route::delete('delete/{id}','StudentController@deleteStudent');  
        Route::post('create-update','StudentController@createUpdateStudent');
    }); 