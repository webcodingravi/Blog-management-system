<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
      public function index(Request $request)
    {
        return view('blog.list');
    }

    public function fetchBlog() {
             $blogs = Blog::select('blogs.*','categories.name as category_name')
             ->join('categories','categories.id','blogs.category_id')->get();
             return response()->json([
                'status' => true,
                'data' => $blogs
             ]);
    }


    public function create()
    {
        $data['categories'] = Category::where('status', 1)->orderBy('id', 'asc')->get();

        return view('blog.create', $data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'slug' => 'required|unique:blogs,slug',
            'category' => 'required',
            'image' => 'image'
        ]);



        $blog = new Blog;
        $blog->title = trim($request->title);
        $blog->slug = trim($request->slug);
        $blog->category_id = trim($request->category);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);
        $blog->save();

        if(!empty($request->image)) {
            $image = $request->image;
             $ext = $image->getClientOriginalExtension();
             $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/blog/'),$imageName);
            $blog->image = $imageName;
            $blog->save();

        }


        return redirect()->route('blog.list')->with('success', 'New Blog Created Successfully');

    }

    public function edit(string $id)
    {
        $data['header_title'] = 'Blog title';
        $blog = Blog::findOrFail($id);
        $data['blog'] = $blog;

        $data['categories'] = Category::where('status', 1)->orderBy('id', 'asc')->get();

        return view('blog.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required',
            'category' => 'required',
            'image' => 'image'
        ]);


        $blog->title = trim($request->title);
        $blog->slug = trim($request->slug);
        $blog->category_id = trim($request->category);
        $blog->description = trim($request->description);
        $blog->meta_description = trim($request->meta_description);
        $blog->meta_keywords = trim($request->meta_keywords);
        $blog->is_publish = trim($request->is_publish);
        $blog->status = trim($request->status);
        $blog->save();

        if(!empty($request->image)) {
            // old file Delete
            File::delete(public_path('/uploads/blog/'.$blog->image));

            $image = $request->image;
             $ext = $image->getClientOriginalExtension();
             $imageName = time().'.'.$ext;
            $image->move(public_path('uploads/blog'),$imageName);
            $blog->image = $imageName;
            $blog->save();

        }

        return redirect()->route('blog.list')->with('success', 'Blog Updated Successfully');
    }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();
            // old file deleted
            File::delete(public_path('/uploads/blog/'.$blog->image));
        return redirect()->route('blog.list')->with('success', 'Blog Deleted Successfully');

    }
}
