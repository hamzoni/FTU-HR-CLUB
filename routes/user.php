<?php

Route::get('/personality-test-sharing', ['uses' => 'User\Hrc\HomeController@facebookShare']);
Route::get('/personality-test/{result}', ['uses' => 'User\Hrc\HomeController@facebookShare', 'as' => 'hrc.facebookShare']);
Route::get('/job-selection-test/{type?}/{suggest?}', ['uses' => 'User\JobSelectionTestController@index', 'as' => 'jobSelectionTest']);
Route::post('/job-selection-test', ['uses' => 'User\JobSelectionTestController@saveTestResult', 'as' => 'saveTestResult']);
\Route::get('/chia-se-cau-chuyen', ['uses' => 'User\Hrc\LetterController@index', 'as' => 'home.letter', 'laroute' => true]);
\Route::get('/api/random-letter', [
    'uses' => 'User\Hrc\LetterController@getRandomLetter',
    'as' => 'api.letter.random',
    'laroute' => true
]);
\Route::post('/api/submit-letter', [
    'uses' => 'User\Hrc\LetterController@submitLetter',
    'as' => 'api.letter.submit',
    'laroute' => true
]);
\Route::post('/final-register', [
    'uses' => 'User\Hrc\FunctionalController@finalRegister',
    'as' => 'final_register',
    'laroute' => true
]);

\Route::post('/final-subscribe', [
    'uses' => 'User\Hrc\FunctionalController@finalSubscribe',
    'as' => 'submit-final-subscription',
    'laroute' => true
]);

\Route::group(['middleware' => ['user.values']], function () {
    \Route::get('/', ['uses' => 'User\Hrc\HomeController@finalIndex', 'as' => 'hrc.index', 'laroute' => true]);
    \Route::get('/home/personality-test', ['uses' => 'User\Hrc\HomeController@redirectPersonalityTest']);
    \Route::get('/comment-cv', ['uses' => 'User\Hrc\HomeController@redirectCommentCv']);
    \Route::get('/partners', ['uses' => 'User\Hrc\HomeController@partners']);
    \Route::get('/joins', ['uses' => 'User\Hrc\HomeController@joins']);
    \Route::get('/articles', ['uses' => 'User\Hrc\ArticleController@index']);
    \Route::get('/articles/detail/{slug}', ['uses' => 'User\Hrc\ArticleController@detail', 'as'=>'newsDetail']);
    \Route::get('/partners', ['uses' => 'User\Hrc\HomeController@partners', 'as' => 'partners']);
    \Route::get('/joins', ['uses' => 'User\Hrc\HomeController@joins', 'as' => 'joins']);
    \Route::get('/articles', ['uses' => 'User\Hrc\ArticleController@index', 'as' => 'articles']);
    \Route::get('/articles/detail/{slug}', ['uses' => 'User\Hrc\ArticleController@detail', 'as'=>'newsDetail']);
    \Route::group(['middleware' => ['user.guest']], function () {
        \Route::post('sign-in', ['uses' => 'User\AuthController@postSignIn', 'as' => 'auth.signInSubmit', 'laroute' => true]);
        \Route::post('sign-up', ['uses' => 'User\AuthController@postSignUp', 'as' => 'auth.signUpSubmit', 'laroute' => true]);

        \Route::get('sign-in/google', ['uses' => 'User\GoogleServiceAuthController@redirect', 'as' => 'auth.signIn.google', 'laroute' => true]);
        \Route::get('sign-in/google/callback', ['uses' => 'User\GoogleServiceAuthController@callback', 'as' => 'auth.signIn.google.callback']);

//        \Route::get('forgot-password', 'User\PasswordController@getForgotPassword');
//        \Route::post('forgot-password', 'User\PasswordController@postForgotPassword');
//
//        \Route::get('reset-password/{token}', 'User\PasswordController@getResetPassword');
//        \Route::post('reset-password', 'User\PasswordController@postResetPassword');





    });

    \Route::group(['middleware' => ['user.auth']], function () {
        \Route::get('/sign-out', ['uses' => 'User\AuthController@getSignOut', 'as' => 'auth.signOut']);
        \Route::get('/dashboard', ['uses' => 'User\Hrc\DashboardController@index', 'as' => 'dashboard.index', 'laroute' => true]);
        \Route::get('/dashboard/the-le', ['uses' => 'User\Hrc\DashboardController@rules', 'as' => 'dashboard.rules', 'laroute' => true]);
        \Route::get('/dashboard/thong-tin-ca-nhan', ['uses' => 'User\Hrc\DashboardController@personal', 'as' => 'dashboard.personal', 'laroute' => true]);
        \Route::get('/dashboard/thong-tin-ca-nhan/sua', ['uses' => 'User\Hrc\DashboardController@editPersonal', 'as' => 'dashboard.editPersonal', 'laroute' => true]);
        \Route::get('/dashboard/danh-gia-ca-nhan', ['uses' => 'User\Hrc\DashboardController@evaluation', 'as' => 'dashboard.evaluation', 'laroute' => true]);
        \Route::get('/dashboard/so-luoc-nganh-nghe', ['uses' => 'User\Hrc\DashboardController@introduceMajor', 'as' => 'dashboard.introduceMajor', 'laroute' => true]);
        \Route::get('/dashboard/test-online', ['uses' => 'User\Hrc\DashboardController@testOnline', 'as' => 'dashboard.testOnline', 'laroute' => true]);

        \Route::get('/test-tuyen-dung', ['uses' => 'User\Hrc\RecruitmentTestController@index', 'as' => 'home.recruitment_test', 'laroute' => true]);
        /**
         * API
         */
        \Route::post('/api/cap-nhat-thong-tin-ca-nhan', [
            'uses' => 'User\Hrc\FunctionalController@updatePersonalInformation',
            'as' => 'api.updatePersonalInformation',
            'laroute' => true
        ]);

        \Route::post('/api/personality-test', [
            'uses' => 'User\Hrc\FunctionalController@personalityTest',
            'as' => 'api.personalityTest',
            'laroute' => true
        ]);

        \Route::post('/api/test-online/start', [
            'uses' => 'User\Hrc\TestOnlineController@start',
            'as' => 'api.testOnline.start',
            'laroute' => true
        ]);

        \Route::post('/api/test-online/answer', [
            'uses' => 'User\Hrc\TestOnlineController@answer',
            'as' => 'api.testOnline.answer',
            'laroute' => true
        ]);

        \Route::post('/api/test-online/submit', [
            'uses' => 'User\Hrc\TestOnlineController@submit',
            'as' => 'api.testOnline.submit',
            'laroute' => true
        ]);

        \Route::post('/api/test-online/updateCity', [
            'uses' => 'User\Hrc\TestOnlineController@updateCity',
            'as' => 'api.testOnline.updateCity',
            'laroute' => true
        ]);

        \Route::post('/api/submit-recruitment-test', [
            'uses' => 'User\Hrc\RecruitmentTestController@submitTest',
            'as' => 'api.recruitment_test.submit',
            'laroute' => true
        ]);

        \Route::post('/api/make-recruitment-test', [
            'uses' => 'User\Hrc\RecruitmentTestController@makeTest',
            'as' => 'api.recruitment_test.make',
            'laroute' => true
        ]);


    });
});
