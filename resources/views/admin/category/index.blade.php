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
                                <div>Category Lists</div>
                                <a href="{{url('admin/categories/create')}}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="" method="get">
                                @csrf
                                <input type="text" name="searchdata" class="form-control my-1 col-4 float-right" placeholder="search">
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
                                            <td>@mdo</td>
                                            <td>
                                                <form action="{{url('admin/categories/'.$category->id)}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <a href="{{url('admin/categories/'.$category->id.'/edit')}}" class="btn btn-primary btn-sm">Edit</a>
                                                    <button class="btn btn-danger btn-sm" onclick="return comfirm('are you sure want to delete')">Delete</button>
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