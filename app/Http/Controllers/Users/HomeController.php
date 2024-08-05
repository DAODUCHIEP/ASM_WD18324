<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class HomeController extends Controller
{
    public function listUsers(Request $request)
    {
        $categories = Category::all();

        $query = Product::with('category');


        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }



                if ($request->has('search') && $request->search != '') {
                    $query->where('name', 'like', '%' . $request->search . '%');
                }

                $products = $query->paginate(8); 


        return view('users.HomeUsers.listUser', compact('products', 'categories'));
    }
}