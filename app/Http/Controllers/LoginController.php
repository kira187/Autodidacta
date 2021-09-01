<?php

namespace App\Http\Controllers;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use App\Models\SocialProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function redirectToProvider($driver)
    {
        $drivers = ['facebook', 'google'];
        if (in_array($driver, $drivers)) {
            return Socialite::driver($driver)->redirect();
        } else {
            return redirect()->route('login');
        }
    }
        
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleProviderCallback(Request $request, $driver)
    {
        if ($request->error) {
            return redirect()->route('login');
        }

        $userSocialite = Socialite::driver($driver)->user();        

        $socialProfile = SocialProfile::where('social_id', $userSocialite->getId())
            ->where('social_name', $driver)
            ->first();
        
        if (!$socialProfile) {
            $user = User::where('email', $userSocialite->getEmail())->first();

            if (!$user) {
                $user = User::create([
                    'name' => $userSocialite->getName(),
                    'email' => $userSocialite->getEmail(),
                ]);
            }
            $socialProfile = SocialProfile::create([
                'user_id' => $user->id,
                'social_id' => $userSocialite->getId(),
                'social_name' => $driver,
                'social_avatar' => $userSocialite->getAvatar()
            ]);
        }

        Auth::login($socialProfile->user);
        return redirect()->route('home');
    }
}
