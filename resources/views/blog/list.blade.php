@extends('layouts.app')
@section('content')
<main id="main" class="main">
    <div class="pagetitle">
        <h1>Blog List (Total : {{$blogs->total()}})</h1>
      </div>
    <!-- End Page Title -->
    <section class="section">
        <div class="row">
            @include('alertMessage.alertMessage')
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="d-flex align-items-center justify-content-between">
                <h5 class="card-title">Blog list</h5>
                <a href="{{route('blog.create')}}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Add Blog</a>
            </div>
         {{-- searching section --}}
            <div class="search">
            <form class="row g-3" action="" method="get">
              <div class="col-4">
                <label for="" class="form-label">Category</label>
                <input type="text" value="{{Request::get('category')}}" name="category" class="form-control" id="category" placeholder="Please Enter Category...">
              </div>

              <div class="col-4">
                <label for="" class="form-label">Publish</label>
                <select name="is_publish" id="is_publish" class="form-select">
                   <option value="">Please Select..</option>
                   <option {{(Request::get('is_publish') ==  1) ? 'selected' : ''}} value="1">Yes</option>
                   <option {{(Request::get('is_publish') ==  100) ? 'selected' : ''}} value="100">No</option>
                </select>
              </div>

              <div class="col-4">
                <label for="" class="form-label">Status</label>
                <select name="status" id="status" class="form-select">
                    <option value="">Please Select..</option>
                    <option {{(Request::get('status') == 1) ? 'selected' : ''}} value="1">Active</option>
                    <option {{(Request::get('status') == 100) ? 'selected' : ''}} value="100">Deactive</option>
                 </select>
              </div>


              <div class="col-4">
                <label for="" class="form-label">Start Date</label>
                 <input type="date" class="form-control" value="{{Request::get('start_date')}}" name="start_date" id="start_date">
              </div>


              <div class="col-4">
                <label for="" class="form-label">End Date</label>
                 <input type="date" class="form-control" value="{{Request::get('end_date')}}" name="end_date" id="end_date">
              </div>



              <div class="mb-4">
                <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                <a href="{{route('blog.list')}}" class="btn btn-danger btn-sm">Reset</a>
              </div>
            </form>
        </div>
        {{-- end searching section --}}

                <table class="table table-striped table-bordered">
                  <thead class="table-dark">
                    <tr>
                      <th scope="col" width="100">Image</th>
                      <th scope="col">Title</th>
                      <th scope="col">Category</th>
                      <th scope="col">Publish</th>
                      <th scope="col">Status</th>
                      <th scope="col">Created Date</th>
                      <th scope="col">Action</th>
                    </tr>
                  </thead>
                  @if ($blogs->isNotEmpty())
                    @foreach ($blogs as $blog)
                  <tbody>
                    <tr>
                    <td>
                        @if ($blog->image != '')
                         <img src="{{asset('/uploads/blog/'.$blog->image)}}" class="img-fluid" width="200"/>
                        @endif
                    </td>

                      <td>{{$blog->title}}</td>
                      <td>{{$blog->category_name}}</td>
                      <td>
                        @if (!empty($blog->is_publish == '1'))
                        <span class="badge bg-success">Yes</span>
                        @else
                        <span class="badge bg-danger">No</span>
                        @endif</td>
                      <td>
                        @if (!empty($blog->status == '1'))
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-danger">Deactive</span>
                        @endif
                    </td>

                    <td>
                        {{\Carbon\Carbon::Parse($blog->created_at)->format('d M Y')}}
                    </td>
                     <td>
                        <a href="{{route('blog.edit',$blog->id)}}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                        <a onclick="return confirm('Are you sure you want delete record');" href="{{route('blog.delete',$blog->id)}}" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i> Delete</a>
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

                    {{$blogs->links('pagination::bootstrap-5')}}


              </div>

            </div>

          </div>
        </div>


      </section>
  </main>
@endsection

