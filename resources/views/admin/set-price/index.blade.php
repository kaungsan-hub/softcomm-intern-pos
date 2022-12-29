@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">

                                <div>Set Price Table</div>

                                <a href="{{ url('admin/setprices/create') }}" class="btn btn-primary btn-sm" title="add new">
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

                            @if(session()->has('msg'))
                            <div class="alert alert-success">
                                <span>{{session()->get('msg')}}</span>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            @endif

                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="text-center">                                            
                                            <th>#</th>
                                            <th>id</th>
                                            <th>Item Code</th>
                                            <th>R 1</th>
                                            <th>R 2</th>
                                            <th>Created By</th>
                                            <th>Created At</th>
                                            <th>Updated By</th>
                                            <th>Deleted At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($setprices as $setprice)
                                            <tr>
                                                <td>{{ $setprice->id }}</td>
                                                <td>{{ $setprice->id }}</td>
                                                <td>{{ $setprice->items->id }}</td> 
                                                <td>{{ $setprice->r1 }}</td>
                                                <td>{{ $setprice->r2 }}</td>
                                                <td>{{ $setprice->user->name }}</td>
                                                <td>{{ $setprice->created_at }}</td>
                                                <td>{{ $setprice->updated_at }}</td>
                                                <td>{{ $setprice->deleted_at }}</td>
                                                <td class="text-nowrap">
                                                 
                                                    <form action="{{ url('admin/setprices/' . $setprice->id) }}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <a href="{{ url('admin/setprices/' . $setprice->id . '/edit') }}" class="btn btn-info btn-sm"><i class="ft-edit"></i></a> 
                                                            
                                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete?')"><i class="ft-trash"></i></button> 
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
