<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use App\Product;
use App\Category;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:Admin');
    }

    public function index() {
        return view('admin.AdminHome');
    }

    public function addCategoryPage() {
        return view('admin.AddCategory');
    }   

    public function insertCategory(Request $request) {
        
        $this->validate($request, 
            ['name' => 'required', 'string', 'unique:categories'],
            ['name.exists' => 'Category already exists!']
        );

        Category::create([
            'category_name' => $request->name,
        ]);

        return redirect('/list-category');
    }

    public function showCategory() {
        $categories = Category::paginate(3);
        $products = "";
        return view('admin.ListCategory', ['products' => $products,'categories' => $categories]);
    }

    public function showDetailCategory($id) {
        $categories = Category::paginate(3);
        $products = Product::where('category_id', $id)->get()->sortBy('product_name');

        return view('admin.ListCategory', ['products' => $products, 'categories' => $categories]);
    }

    public function showProduct() {
        $products = Product::paginate(10);
        return view('admin.ListProduct', ['products' => $products]);
    }

    public function deleteProduct(Request $request) {
        $this->validate($request,
            ['id' => 'required|exists:products,id'], 
        );
  
        $imageDelete = $request->product_photo;

        if(File::exists(public_path('upload/test.png'))) {
            File::delete(public_path($imageDelete));
        }

        Product::find($request->id)->delete();

        return redirect('/list-product');
    }

    public function insertProductPage() {
        $categories = Category::all();
        return view('admin.AddProduct', ['categories' => $categories]);
    }
    
    public function insertProduct(Request $request) {
        $this->validate($request, 
            [
                'name' => 'required', 'string', 'unique:products',
                'description' => 'required', 'string',
                'price' => 'required', 'min:100',
                'image' => 'required', 'mimes:jpeg,jpg,png', 'max:10000'
            ],
            [
                'name.exists' => 'Category already exists!',
                'name.required' => 'Must be filled!',
                'description.required' => 'Must be filled!',
                'price.required' => 'Must be filled!',
                'price.min' => 'Minimum IDR.100!',
                'price.min' => 'Minimum IDR.100!',
                'image.required' => 'Must insert image!',
                'image.mimes' => 'Extensions must be .jpeg/.jpg/.png',
                'image.max' => 'Maximum file is 10 MB!',
            ]
        );

        $saveImage = $request->file('image');

        $imageName = $request->image->getClientOriginalName();
        $url = "assets/".$imageName;

        $destination_path = public_path('/assets');
        $saveImage->move($destination_path, $imageName);

        Product::create([
            'product_name' => $request->name,
            'product_description' => $request->description,
            'category_id' => $request->category,
            'product_price' => $request->price,
            'product_photo' => $url,
        ]);

        return redirect('/list-product');
    }
}
