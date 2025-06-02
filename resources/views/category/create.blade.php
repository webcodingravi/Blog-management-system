@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle d-flex align-items-center justify-content-between">
        <h1>Create Category</h1>
        <a href="{{route('category.list')}}" class="btn btn-primary btn-sm"> <i class="bi bi-arrow-right-circle-fill"></i> Back</a>

      </div>
    <!-- End Page Title -->

    <section class="section">
        <div class="row">

          <div class="col-lg-12">
            <div class="pt-4 card">
              <div class="card-body">
                <form class="row g-3" action="{{route('category.store')}}" method="post">
                    @csrf
                  <div class="col-6">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" value="{{old('name')}}" name="name" class="form-control @error('name') is-invalid  @enderror" id="name" placeholder="Please Enter Category Name...">
                    @error('name')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>
                  <div class="col-6">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" readonly value="{{old('slug')}}" name="slug" class="form-control @error('slug') is-invalid @enderror" id="slug" placeholder="Please Enter Your Category Slug...">
                    @error('slug')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>



                  <div class="col-6">
                    <label for="meta_title" class="form-label">Meta Title</label>
                    <input type="text" value="{{old('meta_title')}}" name="meta_title" class="form-control @error('meta_title') is-invalid @enderror" id="meta_title" placeholder="Please Enter Meta Title...">
                    @error('meta_title')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="meta_description" class="form-label">Meta Description</label>
                    <textarea value="{{old('meta_description')}}" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" placeholder="Please Enter Meta Description..."></textarea>
                    @error('meta_description')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="meta_keywords" class="form-label">Meta Keywords</label>
                    <input type="text" value="{{old('meta_keywords')}}" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="meta_keywords" placeholder="Please Enter Meta Keywords...">
                    @error('meta_keywords')
                        <span class="invalid-feedback">{{$message}}</span>
                    @enderror
                  </div>

                  <div class="col-6">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-select" name="status" id="status">
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
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
     $("#name").keyup(function() {
        element = $(this).val();
        $.ajax({
             url : '{{route("getSlug")}}',
              type : 'get',
              data : {title : element},
              dataType: 'json',
              success : function(response) {
               if(response['status'] == true) {
                 $("#slug").val(response['slug']);
               }
              }
        });
     })
    });
</script>

@endsection
