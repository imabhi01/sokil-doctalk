<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use App\Models\ProductImage;

class ProductController extends Controller
{
    public function index(){
        $products = Product::latest()->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    public function create(){
        $categories = Category::pluck('title', 'id');
        return view('admin.product.create', compact('categories'));
    }

    public function store(Request $request){

        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'title' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $input = [];

        $input = $request->all();

        if($request->image){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
            $input['image'] = $fileName;
        }

        $input['slug'] = Str::slug($request->title);

        $product = Product::create($input);

        $category = Category::find($request->category_id);

        $product->categories()->attach([$category->id]);
        
        foreach ($request->file('images') as $imagefile) {
            $this->uploadImage($imagefile, $product);
        }

        return redirect('products')->with('success', 'Product stored successfully!');

    }

    public function edit($id){
        $product = Product::find($id);
        $categories = Category::pluck('title', 'id');
        $selectedCategories = $product->categories->pluck('id');
        return view('admin.product.edit', compact('product', 'categories', 'selectedCategories'));
    }

    public function update(Request $request, $id){

        $product = Product::find($id);
        
        $request->validate([
            'image' => 'sometimes',
            'title' => 'required|string',
            'desc' => 'required|string',
            'price' => 'required|numeric'
        ]);

        $input = [];

        if($request->image){
            $fileName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('uploads'), $fileName);
            $input['image'] = $fileName;
        }

        $input['slug'] = Str::slug($request->title);

        $product->update($input);
        
        $category = Category::find($request->category_id);

        $product->categories()->sync([$category->id]);

        if(isset($request->images)){
            if(count($request->file('images')) != null){
                foreach ($request->file('images') as $imagefile) {
                   $this->uploadImage($imagefile, $product);
                }
            }
        }
        
        return redirect('products')->with('success', 'Product updated successfully!');

    }

    public function uploadImage($imagefile, $product){
        $image = new ProductImage;
        $fileName = date("Y"). '-'.date("h-i-s"). '-' . $imagefile->getClientOriginalName();
        $imagefile->move(public_path('uploads/productImages/'), $fileName);
        $image->image = $fileName;
        $image->product_id = $product->id;
        $image->save();
    }

    public function delete($id){
        
        $product = Product::find($id);
        
        if(!$product){
            abort(404);
        }

        $product->delete();

        return redirect('products')->with('success', 'Product deleted successfully!');

    }

    public function deleteProductImage(Request $request, $id){

        $productImage = ProductImage::find($id);
        
        if(!$productImage){
            abort(404);
        }

        $productImage->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Image deleted successfully!'
        ]);

    }
}
