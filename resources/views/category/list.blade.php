@extends('layouts.app')


@section('content')
    <main id="main" class="main">
        <div class="pagetitle d-flex justify-content-between">
            <h1>Categories</h1>
            <a href="{{ route('category.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Add
                Category</a>

        </div>
        <!-- End Page Title -->
        <section class="section">
            <div class="row">
                @include('alertMessage.alertMessage')
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <table class="table table-striped table-bordered" id="categoryTable">


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

            $('#categoryTable').DataTable({
                ajax: {
                    url: "{{ route('dataFetch') }}",
                    dataSrc: 'data'

                },

                language: {
                    searchPlaceholder: 'Search records...',
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
                        data: 'name',
                        title: 'Name'
                    },
                    {
                        data: 'slug',
                        title: 'Slug'
                    },
                    {
                        data: 'created_at',
                        title: 'Date',


                    },

                    {
                        data: 'status',

                        title: 'Status',
                        render: function(data, type, row) {
                            if (type === 'display' || type === 'filter') {
                                return data == 1 ?
                                    '<span class="badge bg-success">Active</span>'

                                    :

                                    '<span class = "badge bg-danger" > Deactive < /span>';
                            }

                            return data;
                        }

                    },
                    {

                        data: 'id',
                        title: 'Action',

                        render: function(data, type, row) {
                            const editUrl = route('category.edit', data);
                            const deleteUrl = route('category.delete', data);
                            return `
                              <a href="${editUrl}"><i class="ri-pencil-line text-success"></i></a>
                              <a onclick="return confirm('Are you sure you want delete record');" href="${deleteUrl}"><i class="ri-delete-bin-line text-danger"></i></a>

                            `
                        }
                    },

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


            });

        })
    </script>
@endsection
