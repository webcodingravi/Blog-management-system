<?php
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('public');
});


Route::get('/category/list',[CategoryController::class,'index'])->name('category.list');
Route::get('/category-featch',[CategoryController::class,'dataFetch'])->name('dataFetch');
Route::get('/category/create',[CategoryController::class,'create'])->name('category.create');
Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');


Route::get('/blog/list',[BlogController::class,'index'])->name('blog.list');
Route::get('/blog/create',[BlogController::class,'create'])->name('blog.create');
Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
Route::put('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');


    // get Slug
    Route::get('/getSlug', function(Request $request) {
        $slug = '';
        if (!empty($request->title)) {
            $slug = Str::slug($request->title);
        }
        return response()->json([
            'status' => true,
            'slug' => $slug
        ]);
    })->name('getSlug');