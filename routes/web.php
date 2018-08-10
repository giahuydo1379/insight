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

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/', ['uses' => 'DashboardController@getIndex', 'as' => 'dashboard.index']);
    Route::get('dashboard', ['uses' => 'DashboardController@getIndex', 'as' => 'dashboard.index']);
    Route::get('logout', ['uses' => 'Auth\LoginController@logout', 'as' => 'logout']);

    Route::prefix('users')->group(function () {
        Route::get('show-all', ['middleware' => ['permission:user.show-all'], 'uses' => 'UserController@getShowAll', 'as' => 'user.get-show-all']);
        Route::get('ajax-data', ['middleware' => ['permission:user.show-all'], 'uses' => 'UserController@getAjaxData', 'as' => 'user.get-ajax-data']);
        Route::get('edit/{id}', ['middleware' => ['permission:user.edit'], 'uses' => 'UserController@getEdit', 'as' => 'user.get-edit']);
        Route::post('edit/{id}', ['middleware' => ['permission:user.edit'], 'uses' => 'UserController@postEdit', 'as' => 'user.post-edit']);
        Route::get('add', ['middleware' => ['permission:user.add'], 'uses' => 'UserController@getAdd', 'as' => 'user.get-add']);
        Route::post('add', ['middleware' => ['permission:user.add'], 'uses' => 'UserController@postAdd', 'as' => 'user.post-add']);
        Route::post('move-trash', ['middleware' => ['permission:user.trash'], 'uses' => 'UserController@postMoveTrash', 'as' => 'user.post-move-trash']);
        Route::post('put-back', ['middleware' => ['permission:user.trash'], 'uses' => 'UserController@postPutBack', 'as' => 'user.post-put-back']);
        Route::get('show-trash', ['middleware' => ['permission:user.trash'], 'uses' => 'UserController@getShowTrash', 'as' => 'user.get-show-trash']);
        Route::get('ajax-data-trash', ['middleware' => ['permission:user.trash'], 'uses' => 'UserController@getAjaxDataTrash', 'as' => 'user.get-ajax-data-trash']);
        Route::post('remove-trash', ['middleware' => ['permission:user.remove'], 'uses' => 'UserController@postRemoveTrash', 'as' => 'user.post-remove-trash']);
        Route::get('edit_myself/{id}', ['middleware' => ['OwnerMiddleware'], 'uses' => 'UserController@getEdit2', 'as' => 'user.get-edit']);
    });

    Route::group(['prefix' => 'authorized', 'middleware' => ['role:super']], function () {
        Route::get('show-role-user', ['uses' => 'AuthorizedController@getShowRoleUser', 'as' => 'authorized.get-show-role-user']);
        Route::get('ajax-role-user', ['uses' => 'AuthorizedController@getAjaxDataRoleUser', 'as' => 'authorized.get-ajax-data-role-user']);
        Route::get('edit-role-user/{id}', ['uses' => 'AuthorizedController@getEditRoleUser', 'as' => 'authorized.get-edit-role-user']);
        Route::post('edit-role-user/{id}', ['uses' => 'AuthorizedController@postEditRoleUser', 'as' => 'authorized.post-edit-role-admin']);

        Route::get('show-role', ['uses' => 'AuthorizedController@getShowRole', 'as' => 'authorized.get-show-role']);
        Route::get('ajax-data-role', ['uses' => 'AuthorizedController@getAjaxDataRole', 'as' => 'authorized.get-ajax-data-role']);

        Route::get('edit-permission/{id}', ['uses' => 'AuthorizedController@getEditPermission', 'as' => 'authorized.permission-admin']);
        Route::post('edit-permission/{id}', ['uses' => 'AuthorizedController@postEditPermission', 'as' => 'authorized.post-edit-permission']);

        Route::get('add', ['middleware' => ['permission:user.add'], 'uses' => 'AuthorizedController@getAdd', 'as' => 'authorized.get-add']);
        Route::post('add', ['middleware' => ['permission:user.add'], 'uses' => 'AuthorizedController@postAdd', 'as' => 'authorized.post-add']);

        Route::get('add-permission', ['middleware' => ['permission:user.add'], 'uses' => 'AuthorizedController@getAddPermission', 'as' => 'authorized.get-add-permission']);
        Route::post('add-permission', ['middleware' => ['permission:user.add'], 'uses' => 'AuthorizedController@postAddPermission', 'as' => 'authorized.post-add-permission']);

        Route::post('move-trash', ['uses' => 'AuthorizedController@postMoveTrash', 'as' => 'authorized.post-move-trash']);
        Route::get('show-trash-role', ['middleware' => ['permission:user.trash'], 'uses' => 'AuthorizedController@getShowTrashRole', 'as' => 'authorized.get-show-trash-role']);
        Route::get('ajax-data-trash', ['middleware' => ['permission:user.trash'], 'uses' => 'AuthorizedController@getAjaxDataTrash', 'as' => 'authorized.get-ajax-data-trash']);

        Route::get('put-back/{id}', ['middleware' => ['permission:user.trash'], 'uses' => 'AuthorizedController@postPutBack', 'as' => 'authorized.post-put-back']);
        Route::get('remove-trash/{id}', ['middleware' => ['permission:user.remove'], 'uses' => 'AuthorizedController@postRemoveTrash', 'as' => 'authorized.post-remove-trash']);

        Route::get('show-permission', ['uses' => 'AuthorizedController@getShowPermission', 'as' => 'authorized.get-show-permission']);
        Route::get('ajax-data-permission', ['uses' => 'AuthorizedController@getAjaxDataPermission', 'as' => 'authorized.get-ajax-data-permission']);
        Route::get('update-permission/{id}', ['uses' => 'AuthorizedController@getUpdatePermission', 'as' => 'authorized.getUpdatePermission']);
        Route::post('post-update-permission/{id}', ['uses' => 'AuthorizedController@postUpdatePermission', 'as' => 'authorized.postUpdatePermission']);

    });

    /*----------------------------------------------  FDRIVE  ----------------------------------------------------*/
    Route::prefix('fdrive')->group(function () {
        Route::prefix('server')->group(function () {
            Route::get('add', ['uses' => 'Fdrive\ServerController@getAdd', 'as' => 'server.getAdd']);
            Route::post('add', ['uses' => 'Fdrive\ServerController@postAdd', 'as' => 'server.postAdd']);
            Route::get('show-all', ['middleware' => ['permission:user.show-all'], 'uses' => 'Fdrive\ServerController@getShowAll', 'as' => 'fdrive.get-show-all']);
            Route::get('detail/{id}', ['middleware' => ['permission:user.show-all'], 'uses' => 'Fdrive\ServerController@getShowDetail', 'as' => 'fdrive.detail']);
            Route::get('ajax-data', ['middleware' => ['permission:user.show-all'], 'uses' => 'Fdrive\ServerController@getAjaxData', 'as' => 'fdrive.get-ajax-data']);
            Route::get('action', ['middleware' => ['permission:user.show-all'], 'uses' => 'Fdrive\ServerController@ActionServer', 'as' => 'fdrive.action']);
        });
    });

    Route::prefix('customer')->group(function () {
        Route::get('show-all', ['middleware' => ['permission:user.show-all'], 'uses' => 'CustomerController@getShowAll', 'as' => 'customer.get-show-all']);
        Route::get('ajax-data', ['middleware' => ['permission:user.show-all'], 'uses' => 'CustomerController@getAjaxData', 'as' => 'customer.get-ajax-data']);
    });
});
