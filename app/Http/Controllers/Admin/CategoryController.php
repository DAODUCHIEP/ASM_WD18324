<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function listCategory(){
    $Category = Category::all();
    return view('admin.category.listCategory',compact('Category'));
    }

    public function addCategory(){
        return view('admin.category.addCategory');
    }

    public function addPostCategory(request $req ){
        $req->validate([
            'nameCT' => 'required',

        ],[
            'nameCT.required' => 'Tên sản phẩm không được để trống',
        ]);
        $data =[
            'name' => $req->nameCT
        ];

        Category::create($data);
        return redirect()->route('admin.category.listCategory');
    }



    public function deleteCategory($id){
        $deletteCategory = Category::find($id);
        $deletteCategory->delete();
        return redirect()->route('admin.category.listCategory')->with('Bạn xóa thành công');
    }

    public function updateCategory($idCategory){
        $category = Category::findOrFail($idCategory);
        return view('admin.category.updateCategory')->with([
            'category' => $category
        ]);
    }


        public function updatePatchCategory(request $req, $idCategory){
            $category = Category::findOrFail($idCategory);

            $category->update([
                'name' => $req->nameCT
            ]);


            return redirect()->route('admin.category.listCategory')->with('ban sua thanh cong');
        }
}
