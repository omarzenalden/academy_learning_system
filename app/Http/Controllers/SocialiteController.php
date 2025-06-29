<?php

namespace App\Http\Controllers;

use App\ResponseTrait;
use App\Services\SocialiteService;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    use ResponseTrait;
    public $socialiteService;
    public function __construct(SocialiteService $socialiteService)
    {
        $this->socialiteService = $socialiteService;
    }

    public function redirectToGoogle(Request $request)
    {
        //store the user type from the session to reach it in the callback method
        session(['user_type' => $request->get('user_type')]);
        //redirect the user to google login interface
        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {
        $data = $this->socialiteService->handleGoogleCallback();
        return $this->Success($data['data'],$data['message']);
    }
}
