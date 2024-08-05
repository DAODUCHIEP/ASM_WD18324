<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use PharIo\Manifest\Email;

class UserController extends Controller
{
    public function listPostUser(){
        $user = User::all();
      return  view('users.HomeUsers.listPostUser',compact('user'));
    }

    public function addUser(){
        return view('users.HomeUsers.addUser');
    }


    public function addPostUser(request $req){
        $data =[
          'name' => $req->nameUS,
          'email' => $req->emailUS,
          'password' => $req->passwordUS,
          'phone' => $req->phoneUS,
          'address' => $req->addressUS,
        ];

        User::create($data);
        return redirect()->route('users.listPostUser');
    }

    public function deleteUser($id){
        $deleteUser = User::find($id);
        $deleteUser->delete();
        return redirect()->route('users.listPostUser');
    }


    public function updateUser($idUser){
        $user = User::findOrFail($idUser);
        return view('users.HomeUsers.updateUser')->with([
            'user' => $user
        ]);
    }

    public function updatePatchUser(Request $req , $idUser){
        $user = User::findOrFail($idUser);
        $user->update([
            'name' => $req->nameUS,
            'email' => $req->emailUS,
            'password'=>$req->passwordUS,
            'phone' =>$req->phone
        ]);

        return redirect()->route('users.listPostUser');
    }
}