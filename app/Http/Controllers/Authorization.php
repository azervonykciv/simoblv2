<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\akun;
use Auth;
use Mail;
use Input;
use Session;

class Authorization extends Controller
{
    public function getLogin() {
        return View('/auth/login');
    }

    public function register()
    {
        return view('/auth/register');
    }

    public function doRegister(RegistrationRequest $request)
    {
        $input = $request->all();
        $plain = $request->input('password');
        $input['plain'] = $plain;
        $password = bcrypt($request->input('password'));
        $input['password'] = $password;
        $input['activa'] = "YES";
        $level = ($request->input('role'));
        $register = akun::create($input);
        redirect('/');
        
    }
    
    public function login(LoginRequest $request)
    {
        
        $credentials = $request->only('name', 'password');

        $credentials = [
            'name' => $request->input('name'),
            'password' => $request->input('password')
        ];

        if(Auth::attempt($credentials)){
            
            /*
            Jika username dan password match, lakukan logika if berikut ini.
            kalau user belum mengaktifkan accountnya, maka logout, dan tampilka message untuk mengaktifkannya
            */
            if (Auth::user()->role == "Admin") {

                if(Auth::user()->activa == "YA")
                {
                    Session::flash('success','Berhasil Login');
                    return redirect('Admin');
                }
                else
                {
                    Session::flash('error','Maaf ID anda tidak aktif, Mohon hubungi Administrator');
                    return redirect()->back();
                }
                

            }
            elseif(Auth::user()->role == "Staff")
            {
                if(Auth::user()->activa == "YA")
                {
                    Session::flash('success','Berhasil Login');
                    return redirect('Staff');
                }
                else
                {
                    Session::flash('error','Maaf ID anda tidak aktif, Mohon hubungi Administrator');
                    return redirect()->back();
                }
                
            }
            elseif(Auth::user()->role == "Client")
            {
                if(Auth::user()->activa == "YA")
                {
                    Session::flash('success','Berhasil Login');
                    return redirect('Client');
                }
                else
                {
                    Session::flash('error','Maaf ID anda tidak aktif, Mohon hubungi Administrator');
                    return redirect()->back();
                }
               
            }
        }
        else
        {
            Session::flash('error','Maaf Username atau password anda salah');
            return redirect()->back();
        }
    }

    public function updateUser($id,Request $request)
    {

        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'activa' => $request->input('activa')
        ];
        $up = akun::find($id);
        $up->update($data);
        return redirect('Admin/user/show');
    }

    public function logout()
    {
        
        Auth::logout();
        return redirect('/');

    }
}


