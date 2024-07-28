<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function login(){
        return view('login');
    }

    public function postLogin(Request $req){
        $dataUserLogin = [
            'email' => $req->email,
            'password' => $req->password
        ];
    if(Auth::attempt($dataUserLogin)){
        //dang nhap thanh cong
        if(Auth::user()->role == '2'){
            return redirect()->route('admin.product.listProduct')->with([
                'message' => 'dang nhap thanh cong'
            ]);
        }else{
            echo "User";
        }
    }else{
        //dang nhap that bai
        return redirect()->route('login')->with([
            'message' => 'Email hoac password k dung'
        ]);
    }
        
    }


    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with([
            'message' => 'dang xuat thanh cong'
        ]);
    }


    public function register(){
        return view('register');
    }

    public function postRegister(Request $req){
        $check = User::where('email',$req->email)->exists();

        if($check){
            return redirect()->route('register')->with([
                'message' => 'email da ton tai'
            ]);
        }else{
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'password' => hash::make($req->password),
                'address' => $req->address,
                'phone' => $req->phone
                
            ];
            $newUser = User::create($data);

            return redirect()->route('login')->with([
                'message' => 'dang ky thanh cong'
            ]);
        }
    }
}