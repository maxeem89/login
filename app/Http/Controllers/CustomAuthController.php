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
    protected $user;
    protected $newImageName;
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
            $this->user = User::where('email', $request->email)->first();
            if ($this->user->status == 1) {
                $this->ipAddress = new ipAddress();
                $this->ipAddress->ip = $request->ip();
                $this->ipAddress->save();
                User::where('id', $this->user->id)->update(['login_attempt' => 0]);
                $user= $this->user;
                return view('auth.dashboard', get_defined_vars());
            }

            return redirect()->back()->with('message', 'Account not activate, please try again later or contact support.');
        }
        $this->user = User::where('email', $request->email)->first();
            if($this->user){
                if($this->user->login_attempt < 3){
                $this->counter();
                }
                else{
                    $this->updateStatus($this->user->id);
                }
            }
        return redirect("login")->withErrors('Login details are not valid');
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
         if($image){
        $this->newImageName = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path("images"), $this->newImageName);
         }
        $data = $request->all();
        $this->create($data);
        return view("auth.dashboard");
    }

    public function create(array $data)
    {
        return User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'mobile' => $data['mobile'],
            'gender' => $data['gender'],
            'barithday' => $data['barithday'],
            'image' => $this->newImageName ?? 'defult.png',
            'password' => FacadesHash::make($data['password']),
            'login_attempt' => 0
        ]);
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect("login")->withErrors('are not allowed to access');
    }


    public function signOut()
    {
        FacadesSession::flush();
        Auth::logout();

        return Redirect('login');
    }

    private function updateStatus($user_id)
    {
        $update_user = User::whereId($user_id)->update([
            'status' => 0
        ]);
    }

    private function counter(){
             $login_attempt = $this->user->login_attempt;
             $login_attempt++;
            User::where('id',$this->user->id)->update(['login_attempt' => $login_attempt]);
    }
}
