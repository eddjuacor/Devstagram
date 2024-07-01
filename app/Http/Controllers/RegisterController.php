<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //
    
    public function index() 
    {
        return view('auth.register');
    }


        //restricciones en el formulario
    public function store(Request $request)
    {
        $request->request->add(['usernamer' => Str::slug($request->username)]);


       $this->validate($request,[
            'name'=>'required|max:30',
            'username'=>'required|unique:users|min:3|max:20',
            'email'=> 'required|unique:users|email|max:20',
            'password'=>'required|confirmed|min:6'
       ]);

       // agregar un registro
       User::create([
            'name'=>$request->name,
            'username'=> $request->usernamer, 
            'email'=>$request->email,
            'password' => Hash::make( $request->password )
       ]);

       //autenticar usuario

       //auth()->attempt([
        //'email' => $request->email,
       // 'password' => $request->password
      // ]);

       //otra forma de autenticar

       auth()->attempt($request->only('email','password'));

       //Redireccionar
       return redirect()->route('posts.index', auth()->user()->username);
       
    }
}