<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
  {

        $input= $request->all();
        $this->validate($request, [
            'email'=> 'required|email',
            'password'=> 'required',
            
        ]);

        if(auth()->attempt(array('email'=>$input['email'],'password'=> $input['password'])))
        {
            if(auth()->user()->option == 'coordinator' || auth()->user()->option == 'Coordinator' ){
                return redirect()->route('coordinator_home.home');}
            
            elseif(auth()->user()->option == 'lecturer' || auth()->user()->option == 'Lecturer' ){
                    return redirect()->route('lecturer_home.home');}

            elseif(auth()->user()->option == 'hod' || auth()->user()->option == 'HOD' ){
                    return redirect()->route('hod_home.home');}

            elseif(auth()->user()->option == 'commitee' || auth()->user()->option == 'Commitee' ){
                    return redirect()->route('commitee_home.home');}
            
            elseif(auth()->user()->option == 'dean' || auth()->user()->option == 'Dean' ){
                    return redirect()->route('dean_home.home');}

            else{ return redirect()->route('home');}
         }
                   
          else{
             return redirect()->route('login')
                -> whith('error',"email and password are wrong!");
            }      

         

    }
}