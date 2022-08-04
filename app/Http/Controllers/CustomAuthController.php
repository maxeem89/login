<?php

namespace App\Http\Controllers;

use App\Models\ipAddress;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Dotenv\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash as FacadesHash;
use Illuminate\Support\Facades\Session as FacadesSession;

class CustomAuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('throttle:3,20')->only('customLogin');
    }
    private $ipAddress;
    public function index()
    {
        return view('auth.login');
    }


    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $this->ipAddress = new ipAddress();
            $this->ipAddress->ip = $request->ip();
            $this->ipAddress->save();
          return view('auth.dashboard');
        }

        return redirect("login")->withSuccess('Login details are not valid');
    }



    public function registration()
    {
        return view('auth.registration');
    }


    public function customRegistration(Request $request)
    {


        $request->validate([
            'name' =>  'required|max:255|regex:/(^[a-zA-Z]+[a-zA-Z0-9\\-]*$)/u',
            'email' => 'required',
            'mobile' => 'required|unique:users',
            'password' => 'required|min:6',
            'gender' => 'required|string|in:male,female',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg',
        ]);
        $image = $request->file('image');
        $new_name = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"), $new_name);
        $data = $request->all();
        $this->create($data, $new_name);
        return redirect("auth.dashboard")->withSuccess('have signed-in');
    }

    public function create(array $data, $new_name)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'barithday' => $data['barithday'],
            'image' => $new_name,
            'password' => FacadesHash::make($data['password'])
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("login")->withSuccess('are not allowed to access');
    }


    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }

}
