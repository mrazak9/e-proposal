<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\UserLog;
use Socialite;
use Auth;
use Exception;
use App\User;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();
            // only allow people with @company.com to login
            if (explode("@", $user->email)[1] !== 'fellow.lpkia.ac.id') {
                return redirect()->to('/');
            }
            if ($finduser) {

                Auth::login($finduser);

                //Get User Log
                $ip = request()->ip();
                $userAgent = request()->header('User-Agent');
                $userAgent = substr($userAgent, strpos($userAgent, '(') + 1, strpos($userAgent, ')') - strpos($userAgent, '(') - 1);
        
                $userLog = UserLog::create([
                    'user_id'   =>  Auth::User()->id,
                    'ip'        =>  $ip,
                    'os'        =>  $userAgent,
                    'created_at'    => now()
                ]);
                //End User Log
                
                return redirect('/admin/home');
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                $newUser->assignRole('GUEST');
                $newUser->givePermissionTo('NO_ACCESS');

                Auth::login($newUser);
                $getId = Auth::User()->id;

                $students = Student::create([
                    'user_id' => $getId,
                    'nim' => '000000',
                    'prodi' => 'Update Prodi',
                    'kelas' => 'Update Kelas',
                    'position' => 'update posisi'
                ]);

                return redirect('/admin/home');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
