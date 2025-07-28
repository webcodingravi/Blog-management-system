<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request) {
      return view('category.list');
    }


    public function dataFetch() {
          $categories = Category::get();
          return response()->json([
             'status' => true,
             'data' => $categories
          ]);
    }

    public function create() {

        return view('category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
        ]);


       $category = new Category();
       $category->name = trim($request->name);
       $category->slug = trim($request->slug);
       $category->description = trim($request->description);
       $category->meta_title = trim($request->meta_title);
       $category->meta_keywords = trim($request->meta_keywords);
       $category->status = trim($request->status);
       $category->save();

       return redirect()->route('category.list')->with('success','New Category Created Successfully.');
    }
    public function edit(string $id) {
        $category = Category::findOrFail($id);
        $data['category'] = $category;
        return view('category.edit',$data);
    }

    public function update(Request $request, string $id) {
        $category = Category::findOrFail($id);
                $request->validate([
                    'name' => 'required',
                ]);


       $category->name = trim($request->name);
       $category->slug = trim($request->slug);
       $category->meta_title = trim($request->meta_title);
       $category->meta_description = trim($request->meta_title);
       $category->meta_keywords = trim($request->meta_keywords);
       $category->status = trim($request->status);
       $category->save();

       return redirect()->route('category.list')->with('success','Category Updated Successfully.');

    }

    public function destroy(string $id) {
         $category = Category::findOrFail($id);
         $category->delete();
         return redirect()->route('category.list')->with('success','Category Deleted Successfully.');

    }
}
