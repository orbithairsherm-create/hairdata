<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    // Login Page
    public function login()
    {
        return view('login');
    }

    // Check Login
    public function checkLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username == 'orbit' && $password == 'orbit@2233') {

            session(['login' => true]);

            return redirect('/customer-records');
        }

        return back()->with('error', 'Wrong Username or Password');
    }

    // Customer Records
    public function display(Request $request)
    {
        if (!$request->session()->has('login')) {
            return redirect('/');
        }

        $data = Customer::paginate(5);

        return view('display', ['data' => $data]);
    }

    // Logout
    public function logout(Request $request)
    {
        $request->session()->forget('login');

        return redirect('/');
    }
}