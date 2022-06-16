<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
        ]);

        $input = [];

        $input = $request->all();

        $input['slug'] = Str::slug($input['title']);
        $input['is_header_menu'] = ($request['is_header_menu'] == 'on') ? 1 : 0;

        Category::create($input);

        return redirect('categories')->with('success', 'Category stored successfully!');

    }

    public function edit($id){
        $category = Category::find($id);
        return view('admin.category.edit', compact('category'));
    }

    public function update(Request $request, $id){

        $category = Category::find($id);
        
        $request->validate([
            'title' => 'required|string'
        ]);

        $input = [];

        $input = $request->all();

        if($request['title']){
            $input['slug'] = Str::slug($request['title']);
        }
        
        $input['is_header_menu'] = ($request['is_header_menu'] == 'on') ? 1 : 0;
        
        $category->update($input);

        return redirect('categories')->with('success', 'Category updated successfully!');

    }

    public function delete($id){
        
        $category = Category::find($id);
        
        if(!$category){
            abort(404);
        }

        $category->delete();

        return redirect('categories')->with('success', 'Category deleted successfully!');

    }
}
