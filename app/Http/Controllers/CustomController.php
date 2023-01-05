<?php


namespace App\Http\Controllers;

use App\Http\Requests\custom;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Session;










class CustomController extends Controller
{
    //
    public function index()
    {
        return view('custom.login');
    }

    public function postLogin(custom $request)
    {
        
        $validateData = $request->validated();
        $credintials = $request->only('email', 'password');
        if (Auth::attempt($credintials))
        {   // $data = findorfail($id);
            
            return redirect()->intended('dashboard');
            //return redirect()->intended('custom/dashboard')->withSuccess('success','Logged in successfully');
        }
            return redirect("custom/login")->withSuccess('Invalid Credintials');

    }

   public function registration()
   {
    return view('custom/register');
   }

   public function postRegister(custom $request)
   {
    $validatedData = $request->validated();
    /**
     * $user =new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = $request->password;
     */

    $data = $request->all();
    $check = $this->create($data);

    return redirect("custom/login")->withSuccess('Great! You have Successfully loggedin');
    }

    public function create(array $data)
    
        {
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password'])
              ]);
        }
    

   public function dashboard()
   {    
       if(Auth::check()){
           return view('admin');
           
       }
 
       return redirect("custom/login")->withSuccess('Opps! You do not have access');
   }

   public function logout()
   {
    Session::flush();
    Auth::logout();

    return Redirect('custom/login');
   }
}
