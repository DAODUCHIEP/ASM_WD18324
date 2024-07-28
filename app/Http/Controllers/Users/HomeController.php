<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function listUsers(){
        $products = Product::all();
        return view('users.HomeUsers.listUser',compact('products'));
    }
}