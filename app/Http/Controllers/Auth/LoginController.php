<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\teacher;
use App\Models\teacherprofile;
use App\Models\teacherpost;
use DB; 

          


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
        $this->middleware('guest:teacher')->except('logout');
        $this->middleware('guest:student')->except('logout');
    }

    public function showteacherLoginForm()
    {
        return view('auth.login', ['url' => 'teacher']);
    }

    public function teacherLogin(Request $request)
    {
        
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            
            $users = DB::table('teacher_profiles')->where('teacher_id',Auth::guard('teacher')->user()->id)->count();
                if($users<1)
            return redirect()->intended('/teacher/edit');
                else
            return redirect('/t/'.Auth::guard('teacher')->user()->id);   
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function showstudentLoginForm()
    {
        return view('auth.loginS', ['url' => 'student']);
    }

    public function studentLogin(Request $request)
    {  
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('student')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $users = DB::table('student_profiles')->where('student_id',Auth::guard('student')->user()->id)->count();
            if($users<1)
            return redirect()->intended('/student/edit');
                else
            return redirect('/s/'.Auth::guard('student')->user()->id);   
        }
        return back()->withInput($request->only('email', 'remember'));
    }
}
