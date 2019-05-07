<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Session;

class TeacherLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:teacher')->except('logout');
    }
    /**
     * Feature: Show the Client Login Form.
     * @param: Null
     * @return \Illuminate\Http\Response
     * Route : client
     * Last Developed By: Abdul Latif | 03-Jan-2018
     */
    public function showLoginForm()
    {
        return view('auth.teacher_login');
    }
    /**
     * Feature: Check Client login.
     * @param: Null
     * @return \Illuminate\Http\Response
     * Route : client/login
     * Last Developed By: Abdul Latif | 03-Jan-2018
     */
    public function postLogin(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required',
            'password' => 'required|min:6'
        ]);

        // Attempt to log the user in
        if (Auth::guard('teacher')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            // if successful, then redirect to their intended location
            if(Auth::guard('teacher')->user()->status!=1){
                Session::flash('error','Your account is inactive');
                Auth::guard('teacher')->logout();
                return redirect()->back()->withInput($request->only('email', 'remember'));
            }
            return redirect('teacher/dashboard');
        } else {
            Session::flash('error','These credentials do not match our records.');
        }

        // dd($errors);

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout() {
//        Auth::guard('student')->logout();
        auth('teacher')->logout();
//        $this->guard()->logout();
        return redirect()->route('teacher-login');
    }

}
