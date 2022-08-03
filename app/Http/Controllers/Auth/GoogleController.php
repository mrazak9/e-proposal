<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Student;
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
     
            if($finduser){
     
                Auth::login($finduser);
    
                return redirect('/admin/home');
     
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                $newUser->assignRole('mahasiswa');
                
                Auth::login($newUser);
                $getId = Auth::User()->id;

                $students = Student::create([
                    'user_id' => $getId,
                    'nim' => '000000',
                    'prodi' => 'Update Prodi',
                    'kelas' => 'Update Kelas',
                    'organization_id' => 9,
                    'position' => 'update posisi'
                ]);

                return redirect('/admin/home');
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
