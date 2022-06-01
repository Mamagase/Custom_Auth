<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserAuthController extends Controller
{
    //Login 
    function login()
    {
        return view('auth.login');
    }

    //Register
    function register()
    {
        return view('auth.register');
    }

    //Create an Account 
    function create(Request $request)
    {
        //Validate Requests 
        $request->validate([
            'name'=>'required',
            'phone'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:5|max:12',
            'confirmPassword' => 'required|min:5|max:12|same:password'
        ]);

        //If form validated successfully, add new user
        // $user = new User; //creating an object of User model to store user data
        // $user->name = $request->name;
        // $user->phone = $request->phone;
        // $user->email = $request->email;
        // $user->password = Hash::make($request->password);
        // $query = $user->save();

        //Query Builder
        $query = DB::table('users')->insert([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => now(),
            'updated_at' => now()
        ]);       

        //Check if user added successfully, then send a message 
        if ($query) 
        {
            return back()->with('success', 'You have been successfully Registered!');
        }
        else
        {
            return back()->with('fail', 'Something went wrong.');
        }
    }

    //Check 
    function check(Request $request)
    {
        //Validate Requests
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5|max:12'
        ]);

        //If form validated successfully, then process login
        // $user = User::where('email','=', $request->email)->first(); //check user's email exists
        $user = DB::table('users')->where('email',$request->email)->first(); //Query Builder

        if ($user) 
        {
            //Check user's password match 
            if (Hash::check($request->password, $user->password)) 
            {
                $request->session()->put('LoggedUser', $user->id); //creating user's session
                return redirect('profile'); //redirect user to profile
            }
            else
            {
                return back()->with('fail', 'Invalid password.');
            }
        }
        else
        {
            return back()->with('fail', 'No account found for this email.');
        }
    }

    //Profile
    function profile()
    {
        if (session()->has('LoggedUser')) 
        {
            // $user = User::where('id', '=', session('LoggedUser'))->first();
            $user = DB::table('users')->where('id', session('LoggedUser'))->first(); //Query Builder
            $data = [
                'LoggedUserInfo' => $user
            ];
        }
        return view('admin.profile', $data); 
    }

    //Logout
    function logout()
    {
        if (session()->has('LoggedUser')) 
        {
            session()->pull('LoggedUser');
            return redirect('login');
        }
    }
}
