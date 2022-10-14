<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Jobs\SendMailResetPasswordJob;
use App\Consts;

class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function __construct(User $User){
        $this->User = $User;
    }
    public function index()
    {
        if (Auth::user()) {
            return redirect('/admin/staff');
        }
        return view('auth.login');
    }
    public function logout() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }
    public function doLogin(Request $request)
    {
        if ($this->User->is_email($request->name)) {
            $credentials = [ 'email'=> $request['name'], 'password' => $request['password'] ];
            } else {
                $credentials = [ 'name'=> $request['name'], 'password' => $request['password'] ];
            }
        if (Auth::attempt($credentials)) {
            // if (!Auth::user()->is_active || Auth::user()->status === 'blocked')  {
            //     auth()->logout();
            //     return redirect()->back()->with('error', 'Invalid username/email or password, try again');
            // }

            Session::put('username', Auth::user());
            Session::put('role_id', Auth::user()->role_id);
            Session::put('user_id', Auth::user()->id);
            Session::put('staff_id', Auth::user()->staff_id);
        }

        return redirect()->back()->with('error','Invalid username/email or password, try again');
    }

    public function getResetPassword() {
        return view('auth.reset_password');
    }
    public function doResetPassword(Request $request) {
        $request->validate([
            'email' => 'required|email'
        ]);
        $user = DB::table('users')->select(['id', 'name', 'email'])->where(['email' => $request->email])->first();
        if (!empty($user)) {
            $code = uniqid();
            DB::table('users')->where('id', $user->id)->update(['is_active' => false, 'code' => $code]);
            $id = $user->id;
            $email = $user->email;
            $name = $user->name;
            $language = App::getlocale();
            $mail = new SendMailResetPasswordJob($email, $id, $name, $code, $language);
            dispatch($mail);
            return redirect()->back()->with('success','Please! Check email to change password!');
        } else {
            return redirect()->back()->with('error','This email incorrect');
        }
    }
    public function showReset($id, $code)	{
        $user = DB::table('users')->select(['id'])->where(['id' => $id, 'code' => $code])->first();
        if ($user) {
            return view('auth.reset',['id' => $id, 'code' => $code]);
        } else {
            return redirect('/reset-password')->with('error','Error!');
        }
    }
    public function doReset(Request $request)	{
        $update = DB::table('users')->where('id', $request->id)->update(['password'=>Hash::make($request->password),'is_active'=>true,'code'=>NULL]);
        if ($update) {
            return redirect('/login')->with('success','The password change successfully!');
        } else {
            return redirect()->back()->with('error','Error!');
        }
    }

    public function switcher_Language(Request $request, $lang) {
        Session::put('locale', $lang);
        return redirect::back();
    }
}
