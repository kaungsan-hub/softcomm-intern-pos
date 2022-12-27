@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('msg'))
                            <div class="alert alert-success">
                                <span>{{session()->get('msg')}}</span>
                                <button data-bs-dismiss="alert" class="btn btn-close float-end"></button>
                            </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Brand Lists</div>
                                <a href="{{url('admin/brands/create')}}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Brand Code</th>
                                            <th>Brand Name</th>
                                            <th>Username</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($brands as $brand)
                                        <tr>
                                            <td>{{$brand->id}}</td>
                                            <td>{{$brand->brand_code}}</td>
                                            <td>{{$brand->name}}</td>
                                            <td>@mdo</td>
                                            <td>
                                                <form action="{{url('admin/brands/'.$brand->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('admin/brands/'.$brand->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="return comfirm('are you sure want to delete')">Delete</button>
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