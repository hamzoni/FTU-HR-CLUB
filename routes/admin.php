<?php

\Route::group(['prefix' => 'admin', 'middleware' => ['admin.values']], function () {

    \Route::group(['middleware' => ['admin.guest']], function () {
        \Route::get('signin', 'Admin\AuthController@getSignIn');
        \Route::post('signin', 'Admin\AuthController@postSignIn');
    });

    \Route::group(['middleware' => ['admin.auth']], function () {
        \Route::get('/', 'Admin\IndexController@index');

        \Route::get('/me', 'Admin\MeController@index');
        \Route::put('/me', 'Admin\MeController@update');
        \Route::get('/me/notifications', 'Admin\MeController@notifications');

        \Route::post('signout', 'Admin\AuthController@postSignOut');

        \Route::get('/users/export', 'Admin\UserController@export');
        \Route::get('/users/export/test-online', 'Admin\UserController@exportTests');
        \Route::resource('users', 'Admin\UserController');
        \Route::resource('admin-users', 'Admin\AdminUserController');
        \Route::resource('site-configurations', 'Admin\SiteConfigurationController');
        \Route::post('articles/preview', 'Admin\ArticleController@preview');
        \Route::get('articles/images', 'Admin\ArticleController@getImages');
        \Route::post('articles/images', 'Admin\ArticleController@postImage');
        \Route::delete('articles/images', 'Admin\ArticleController@deleteImage');

        \Route::resource('articles', 'Admin\ArticleController');
        \Route::delete('images/delete', 'Admin\ImageController@deleteByUrl');
        \Route::resource('images', 'Admin\ImageController');

        \Route::resource('user-notifications', 'Admin\UserNotificationController');
        \Route::resource('admin-user-notifications', 'Admin\AdminUserNotificationController');
        \Route::resource('images', 'Admin\ImageController');

        \Route::get('/files/export', 'Admin\FileController@export');
        \Route::resource('files', 'Admin\FileController');
        \Route::resource('user-informations', 'Admin\UserInformationController');
                \Route::resource('user-tests', 'Admin\UserTestController');
                \Route::resource('user-answers', 'Admin\UserAnswerController');
                /* NEW ADMIN RESOURCE ROUTE */

        \Route::get('/send-cv-mail', 'Admin\EmailController@index');
    });
});
