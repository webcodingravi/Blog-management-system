@extends('layouts.app')
@section('content')
    <main id="main" class="main">
        <div class="pagetitle d-flex align-items-center justify-content-between">
            <h1>Edit Blog</h1>
            <a href="{{ route('blog.list') }}" class="btn btn-primary btn-sm"> <i class="bi bi-arrow-right-circle-fill"></i>
                Back</a>

        </div>
        <!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="pt-4 card">
                        <div class="card-body">
                            <form class="row g-3" action="{{ route('blog.update', $blog->id) }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="col-6">
                                    <label for="name" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title', $blog->title) }}" name="title"
                                        class="form-control @error('title') is-invalid  @enderror" id="title"
                                        placeholder="Please Enter Blog Title...">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6">
                                    <label for="slug" class="form-label">Slug</label>
                                    <input type="text" readonly value="{{ old('slug', $blog->slug) }}" name="slug"
                                        class="form-control @error('slug') is-invalid @enderror" id="slug"
                                        placeholder="Please Enter Your Blog Slug...">
                                    @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select name="category" id="category"
                                        class="form-select @error('category') is-invalid @enderror">
                                        @if ($categories->isNotEmpty())
                                            <option value="">Please Select...</option>
                                            @foreach ($categories as $category)
                                                <option {{ $category->id == $blog->category_id ? 'selected' : '' }}
                                                    value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('category')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" name="image" id="image" class="form-control"
                                        accept="image" />
                                    @error('image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($blog->image != '')
                                        <img src="{{ asset('/uploads/blog/' . $blog->image) }}" width="200"
                                            class="mt-2 img-fluid" />
                                    @endif
                                </div>


                                <div class="col-12">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea name="description" class="summernote">{{ $blog->description }}</textarea>

                                </div>

                                <div class="col-6">
                                    <label for="meta_keywords" class="form-label">Meta Description</label>
                                    <textarea type="text" name="meta_description" class="form-control" id="meta_description"
                                        placeholder="Please Enter Meta description...">{{ $blog->meta_description }}</textarea>

                                </div>

                                <div class="col-6">
                                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                                    <input type="text" value="{{ old('meta_keywords', $blog->meta_keywords) }}"
                                        name="meta_keywords" class="form-control" id="meta_keywords"
                                        placeholder="Please Enter Meta Keywords...">

                                </div>

                                <div class="col-6">
                                    <label for="status" class="form-label">Publish</label>
                                    <select class="form-select" name="is_publish" id="is_publish">
                                        <option {{ $blog->is_publish == 1 ? 'selected' : '' }} value="1">Yes
                                        </option>
                                        <option {{ $blog->is_publish == 0 ? 'selected' : '' }} value="0">No</option>
                                    </select>
                                </div>

                                <div class="col-6">
                                    <label for="status" class="form-label">Status</label>
                                    <select class="form-select" name="status" id="status">
                                        <option {{ $blog->status == 1 ? 'selected' : '' }} value="1">Active</option>
                                        <option {{ $blog->status == 0 ? 'selected' : '' }} value="0">Deactive
                                        </option>
                                    </select>
                                </div>
                                <div class="">
                                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $("#title").keyup(function() {
                element = $(this).val();
                $.ajax({
                    url: '{{ route('getSlug') }}',
                    type: 'get',
                    data: {
                        title: element
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response['status'] == true) {
                            $("#slug").val(response['slug']);
                        }
                    }
                });
            })

            $('.summernote').summernote({
                tabsize: 2,
                height: 200
            });
        });
    </script>
@endsection
