<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }  
      
    public function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
   
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('home')
                        ->withSuccess('Signed in');
        }
  
        return redirect("login")->withSuccess('Login details are not valid');
    }

    public function register()
    {
        return view('auth/register');
    }
      
    public function registerRequest(Request $request)
    {  
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'school_year' => 'required|integer',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->createUser($data);
         
        return redirect("/login");
    }

    public function createUser(array $data)
    {
      return User::create([
        'first_name' => $data['first_name'],
        'last_name' => $data['last_name'],
        'email' => $data['email'],
        'school_year' => $data['school_year'],
        'password' => Hash::make($data['password']),
      ]);
    }
    
    public function logOut() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
}
?>