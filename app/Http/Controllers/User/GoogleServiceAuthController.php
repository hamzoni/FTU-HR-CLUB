<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ServiceAuthController;
use App\Services\UserServiceInterface;
use App\Services\UserServiceAuthenticationServiceInterface;
use Laravel\Socialite\Contracts\Factory as Socialite;

class GoogleServiceAuthController extends ServiceAuthController
{
    protected $driver = 'google';

    protected $redirectAction = 'User\Hrc\DashboardController@index';

    protected $errorRedirectAction = 'User\Hrc\HomeController@index';

    public function __construct(
        UserServiceInterface $authenticatableService,
        UserServiceAuthenticationServiceInterface $serviceAuthenticationService,
        Socialite $socialite
    ) {
        $this->authenticatableService = $authenticatableService;
        $this->serviceAuthenticationService = $serviceAuthenticationService;
        $this->socialite = $socialite;
    }
}
