<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('verified');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function about()
    {
        return view('about');
    }
    public function deleteAccount()
    {
        $id = Auth::id();
        $email = Auth::user()->email;
        $favorite=new Favorite();
        $favorite=Favorite::where('user_id',$id)->get();
        $favorite->delete();
        $post=DB::table('products')->where('email_address',$email)->get();
        $image=$post->image;
        $product=new Product();
        $product=DB::table('products')->where('email_address',$email)->get();
        $product->delete();
        unlink($image);
        return ('home');
    }

    public function change(Request $request)
    {
        $password=Auth::user()->password;
        $oldpass=$request->oldpass;
        if (Hash::check($oldpass,$password)){
            if($request->password!=$request->password_confirmation){
                return Redirect()->back()->with('ErrorMatching','New Password and Confirmed Password did not match');
            }
            else{
                $user=User::find(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            return Redirect()->route('login')->with('successMsg','successfully password change, Now Login again');
             }       
            
        }else{
            return Redirect()->back()->with('ErrorMsg','Old Password does not match');
        }
    }
}
