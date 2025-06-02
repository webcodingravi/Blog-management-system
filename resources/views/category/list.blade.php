@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle d-flex justify-content-between">
        <h1>Category List</h1>
        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="get" action="{{route('category.list')}}">
              <input type="text" class="form-control" value="{{Request::get('query')}}"  name="query" placeholder="Search" title="Enter search keyword" style="border-radius: 0;">
              <button type="submit" class="btn btn-primary" title="Search" style="border-radius: 0;">
                <i class="ri-search-line"></i></button>
            </form>
          </div>
      </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            @include('alertMessage.alertMessage')
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">Category list <a href="{{route('category.list')}}" class="btn btn-primary btn-sm" style="border-radius: 0;"><i class="bx bx-loader-circle"></i> Reset</a>
                </h5>
                <a href="{{route('category.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Add Category</a>
            </div>
                <table class="table table-striped table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col">Name</th>
                      <th scope="col">Slug</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @if ($categories->isNotEmpty())
                    @foreach ($categories as $category)
                  <tbody>
                    <tr>
                      <td>{{$category->name}}</td>
                      <td>{{$category->slug}}</td>
                      <td>
                        @if (!empty($category->status == '1'))
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Deactive</span>
                        @endif
                    </td>

                    <td>
                        {{\Carbon\Carbon::Parse($category->created_at)->format('d M Y')}}
                    </td>
                     <td>
                        <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a onclick="return confirm('Are you sure you want delete record');" href="{{route('category.delete',$category->id)}}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
                     </td>
                    </tr>
                  </tbody>
                  @endforeach
                  @else
                  <tr>
                    <td colspan="9">No Record Found.</td>
                 </tr>
                      @endif

                </table>

                    {{$categories->links('pagination::bootstrap-5')}}

              </div>

            </div>

          </div>
        </div>


      </section>
  </main>
@endsection



