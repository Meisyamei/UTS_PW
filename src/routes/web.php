<?php

// Route::redirect('/','login');
Route::get('/', 'Frontend@home')->name('frontend');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // data
    Route::delete('datas/destroy', 'DataController@massDestroy')->name('datas.massDestroy');
    Route::post('datas/media', 'DataController@storeMedia')->name('datas.storeMedia');
    Route::post('datas/ckmedia', 'DataController@storeCKEditorImages')->name('datas.storeCKEditorImages');
    Route::resource('datas', 'DataController');

    // Mhs
    Route::delete('mhss/destroy', 'MhsController@massDestroy')->name('mhss.massDestroy');
    Route::post('mhss/media', 'MhsController@storeMedia')->name('mhss.storeMedia');
    Route::post('mhss/ckmedia', 'MhsController@storeCKEditorImages')->name('mhss.storeCKEditorImages');
    Route::resource('mhss', 'MhsController');

    // Dosen
    Route::delete('dosens/destroy', 'DosenController@massDestroy')->name('dosens.massDestroy');
    Route::post('dosens/media', 'DosenController@storeMedia')->name('dosens.storeMedia');
    Route::post('dosens/ckmedia', 'DosenController@storeCKEditorImages')->name('dosens.storeCKEditorImages');
    Route::resource('dosens', 'DosenController');
    
});
Route::group(['prefix' => 'data', 'as' => 'data\.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('data', 'ChangePasswordController@updateData')->name('password.updateData');
        Route::post('data/destroy', 'ChangePasswordController@destroy')->name('password.destroyData');
    }
});
