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
                                <a href="{{ url('admin/items/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                @if(session()->has('msg'))
                                    <div class="alert alert-light mt-3">
                                        <span>{{ session()->get('msg') }}</span>
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Item Code</th>
                                            <th>Name</th>
                                            <th>Brand</th>
                                            <th>Category</th>
                                            <th>Warranty</th>
                                            <th>IMEI</th>
                                            <th>Remark</th>
                                            <th>User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td>{{$item->item_code}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{$item->brand_id}}</td>
                                            <td>{{$item->category_id}}</td>
                                            <td>{{$item->warranty}}</td>
                                            <td>{{$item->imei_status}}</td>
                                            <td>{{$item->remark}}</td>
                                            <td>{{Auth()->user()->name}}</td>
                                            <td>
                                                <form action="{{url('admin/items/'.$item->id)}}" method="POST"> @csrf  @method('delete')
                                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Remove</button>
                                                    <a class="btn btn-outline-success btn-sm" href="{{url('admin/items/'.$item->id.'/edit')}}">Update </a>
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