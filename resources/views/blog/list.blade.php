@extends('layouts.app')
@section('content')
    <main id="main" class="main">
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title">Blog list</h5>
                                <a href="{{ route('blog.create') }}" class="btn btn-primary"><i
                                        class="bi bi-plus-circle-fill"></i> Add Blog</a>
                            </div>


                            <table class="table table-striped table-bordered" id="blogTable">

                            </table>

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
            $("#blogTable").DataTable({
                ajax: {
                    url: "{{ route('fetchBlog') }}",
                    dataSrc: 'data'
                },

                language: {
                    searchPlaceholder: 'Search Record..',
                    search: '_INPUT_'

                },

                columns: [{
                        data: null,
                        title: 'S.No.',
                        render: function(data, type, row, meta) {
                            return meta.row + 1
                        }
                    },

                    {
                        data: 'image',
                        title: 'Image',
                        render: function(data, type, row) {
                            return `<img src="{{ asset('/uploads/blog/' . '${data}') }}"
                                    class="img-fluid" width="200" />`
                        }
                    },

                    {
                        data: 'title',
                        title: 'Title'
                    },
                    {
                        data: 'category_name',
                        title: 'Category'
                    },

                    {
                        data: 'is_publish',
                        title: 'Publish',
                        render: function(data, type, row) {
                            if (type == 'display' || type == 'filter') {
                                return data == 1 ?
                                    '<span class="badge bg-success">Yes</span>' :
                                    '<span class="badge bg-danger">No</span>'

                            }
                            return data;
                        }
                    },
                    {
                        data: 'created_at',
                        title: 'Created Date'

                    },

                    {
                        data: 'status',
                        title: 'Status',
                        render: function(data, type, row) {
                            if (type == 'display' || type == 'filter') {
                                return data == 1 ?
                                    '<span class="badge bg-success">Active</span>' :
                                    '<span class="badge bg-danger">Deactive</span>'
                            }
                            return data;
                        }
                    },

                    {
                        data: 'id',
                        title: 'Action',
                        render: function(data, type, row) {
                            const editUrl = route('blog.edit', data);
                            const deleteUrl = route('blog.delete', data);

                            return `
                              <a href="${editUrl}"><i class="ri-pencil-line text-success"></i></a>
                              <a onclick="return confirm('Are you sure you want delete record');" href="${deleteUrl}"><i class="ri-delete-bin-line text-danger"></i></a>`
                        }
                    }


                ],
                layout: {
                    topStart: {
                        buttons: ['pageLength',
                            {
                                extend: 'spacer'
                            },
                            'csvHtml5',
                            {
                                extend: 'spacer'
                            },
                            'pdfHtml5',
                            {
                                extend: 'spacer'
                            },
                            'print',
                            {
                                extend: 'spacer'
                            },
                            'copy'
                        ]
                    }
                }


            })

        });
    </script>
@endsection
