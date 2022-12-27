@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>Supplier Table</div>

                                <a href="{{ url('admin/suppliers/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>

                            </div>

                            {{-- <form action="">
                                <input type="text" name="search" id="search" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form> --}}

                            <div classs="form-group">
                                <input type="text" id="search" name="search" placeholder="Search"
                                    class="form-control my-1 col-4 float-right" />
                            </div>

                            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

                            <script type="text/javascript">
                                var route = "{{ url('admin/suppliers/autocomplete-search') }}";
                                $('#search').typeahead({
                                    source: function(query, process) {
                                        return $.get(route, {
                                            query: query
                                        }, function(data) {
                                            return process(data);
                                        });
                                    }
                                });
                            </script>

                            @if (session()->has('msg'))
                                <div class="alert alert-success" role="alert">
                                    <span>{{ session()->get('msg') }} messagehere</span>
                                    <button data-bs-dismiss="alert" class="btn btn-close float-right"> </button>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">
                                            {{-- created_at	updated_at --}}
                                            <th>#</th>
                                            <th>id</th>
                                            <th>Name</th>
                                            <th>Address</th>
                                            <th>Phone</th>
                                            <th>Contact Person</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            <th>Updated By</th>
                                            <th>Deleted At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $supplier->id }}</td>
                                                <td>{{ $supplier->id }}</td>
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->address }}</td>
                                                <td>{{ $supplier->phone }}</td>
                                                <td>{{ $supplier->contact_person }}</td>
                                                <td>{{ $supplier->created_by }}</td>
                                                <td>{{ $supplier->created_at }}</td>
                                                <td>{{ $supplier->updated_at }}</td>
                                                <td>{{ $supplier->deleted_at }}</td>
                                                <td>
                                                    <form action="{{ url('admin/suppliers/' . $supplier->id) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('delete')

                                                        <table>
                                                            <tr>
                                                                <td>
                                                                    <a href="{{ url('admin/suppliers/' . $supplier->id . '/edit') }}"
                                                                        class="btn btn-info btn-sm">Edit</a>
                                                                </td>
                                                                <td>
                                                                    <button class="btn btn-danger btn-sm"
                                                                        onclick="return confirm('Are you sure to delete?')">Delete</button>
                                                                </td>
                                                            </tr>
                                                        </table>

                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
