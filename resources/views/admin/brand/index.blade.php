@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @if(session()->has('msg'))
                            <div class="alert alert-success"  role="alert">
                                <span>{{session()->get('msg')}}</span>
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                            </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Brand Lists</div>
                                <a href="{{url('admin/brands/create')}}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form method="GET" action="{{ url('admin/brands') }}" class="form-inline my-2 my-lg-0 float-right">
                                <div class="input-group my-1">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="la la-search"></i>
                                        </button>
                                    </div>
                                </div>
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
                                            <td>{{$brand->user->name}}</td>
                                            <td>
                                                <form action="{{url('admin/brands/'.$brand->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('admin/brands/'.$brand->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="ft-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm" onclick="return comfirm('are you sure want to delete')"><i class="ft-trash"></i></button>
                                                </form>
                                            </td>
                                            
                                        </tr> 
                                        @endforeach  
                                    </tbody>
                                </table>
                                {{$brands->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection