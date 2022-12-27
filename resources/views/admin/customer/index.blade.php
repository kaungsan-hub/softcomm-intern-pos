@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Sample Tables</div>
                                <a href="{{ url('admin/customers/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            @if(session() -> has('msg'))
                            <div class=" alert alert-success">
                                <span>{{ session()->get('msg')}}</span>
                            </div>
                            @endif 
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <th class="text-nowrap">Contact Person</th>
                                            <th>Phone</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Region</th>
                                            <th>City</th>
                                            <th>Remark</th>
                                            <th class="text-nowrap">Created By</th>
                                            <th class="text-nowrap">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($customers as $c)
                                        <tr>
                                            <td class="text-nowrap">{{$c->id}}</td>
                                            <td class="text-nowrap">{{$c->name}}</td>
                                            <td class="text-nowrap">{{$c->contact_person}}</td>
                                            <td class="text-nowrap">{{$c->phone}}</td>
                                            <td class="text-nowrap">{{$c->address}}</td>
                                            <td class="text-nowrap">{{$c->email}}</td>
                                            <td class="text-nowrap">{{$c->region}}</td>
                                            <td class="text-nowrap">{{$c->city}}</td>
                                            <td class="text-nowrap">{{$c->remark}}</td>
                                            <td class="text-nowrap">{{$c->created_by}}</td>
                                            <td class="text-nowrap">
                                                <form action="{{url('admin/customers/' .$c->id) }}" method="post"> 
                                                    @method('delete')
                                                    @csrf
                                                
                                                <a href="{{ url('admin/customers/' .$c->id. '/edit')}}" class="btn btn-primary ">Edit</a>
                                                <button class="btn btn-danger" onclick="return confirm('are you sure to delete?')">Delete</button>
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