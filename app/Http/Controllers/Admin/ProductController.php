<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function listProduct()
    {
        $listProduct = Product::with('category')->paginate(7);
        return view('admin.product.listProduct')->with([
            'listProduct' => $listProduct
        ]);
    }

    public function showAddProductForm()
    {
        // Fetch all categories
        $categories = Category::all();

        // Pass categories to the view
        return view('admin.product.addProduct', compact('categories'));
    }

    public function addProduct(){
        return view('admin/product/addProduct');
    }

    public function addPostProduct(Request $req){
        $req->validate([
            'nameSP' => 'required',
            'descriptionSP' => 'required',
            'priceSP' => 'required|numeric',
        ],[
            'nameSP.required' => 'Tên sản phẩm không được để trống',
            'descriptionSP.required' => 'Mô tả sản phẩm không được để trống',
            'priceSP.required' => 'Giá sản phẩm không được để trống',
            'priceSP.numeric' => 'Giá sản phẩm phải là chữ số',
        ]);
        $linkImage = '';
        if($req->hasFile('imageSP')){
            $image = $req->file('imageSP');
            $newName = time() . ' . '. $image->getClientOriginalExtension();
            $linkStorage = 'imageProduct/';
            $image->move(public_path($linkStorage), $newName);

            $linkImage = $linkStorage . $newName;
        }
       $data=[
        'name' => $req->nameSP,
        'image' => $linkImage,
        'category_id' => $req->category_id,
        'price' => $req->priceSP,
        'description' => $req->descriptionSP
       ];

       Product::create($data);

        return redirect()->route('admin.product.listProduct');

    }

    public function deleteProduct($id){
        $deleteProduct = Product::find($id);
        $deleteProduct->delete();
        return redirect()->route('admin.product.listProduct')->with('success', 'Xóa thành công');
    }

    public function detailProduct($idProduct){
        $product = Product::where('id', $idProduct)->first();
        return view('admin.product.detailProduct')->with([
            'product' => $product
        ]);
    }


    public function updateProduct($idProduct)
    {
        $product = Product::findOrFail($idProduct);
        $categories = Category::all(); // Fetch all categories

        return view('admin.product.updateProduct')->with([
            'product' => $product,
            'categories' => $categories // Pass categories to the view
        ]);
    }

    public function updatePatchProduct(Request $req, $idProduct)
    {
        $product = Product::findOrFail($idProduct);

        $linkImage = $product->image;
        if ($req->hasFile('imageSP')) {
            $image = $req->file('imageSP');
            $newName = time() . '.' . $image->getClientOriginalExtension();
            $linkStorage = 'imageProduct/';
            $image->move(public_path($linkStorage), $newName);

            if (File::exists(public_path($product->image))) {
                File::delete(public_path($product->image));
            }

            $linkImage = $linkStorage . $newName;
        }

        $product->update([
            'name' => $req->nameSP,
            'image' => $linkImage,
            'category_id' => $req->category_id,
            'price' => $req->priceSP,
            'description' => $req->descriptionSP
        ]);

        return redirect()->route('admin.product.listProduct')->with('success', 'Product updated successfully');
    }

}
