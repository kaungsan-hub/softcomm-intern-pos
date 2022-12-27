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
                            </div>
                            @endif
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Category Lists</div>
                                <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form method="GET" action="{{ url('admin/categories') }}" class="form-inline my-2 my-lg-0 float-right">
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
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td>{{$category->description}}</td>
                                            <td>{{$category->user->name}}</td>
                                            <td>
                                                <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-warning btn-sm"><i class="ft-edit"></i></a>
                                                    <button class="btn btn-danger btn-sm" onclick="return comfirm('are you sure want to delete')"><i class="ft-trash"></i></button>
                                                </form>
                                            </td>
                                            
                                        </tr> 
                                        @endforeach
                                        @else 
                                        <div>
                                            <h2>No posts found</h2>
                                        </div>
                                    @endif

                                        
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