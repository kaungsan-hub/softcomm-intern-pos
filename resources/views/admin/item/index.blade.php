@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Items Table</div>
                                <a href="{{ url('admin/items/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="{{url('admin/items/')}}" method="GET">
                                <input type="text" name="search" class="form-control my-1 col-4 float-right" placeholder="search">
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
                                            <th>Reorder</th>
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
                                            <td>{{$item->brands->name}}</td>
                                            <td>{{$item->categories->name}}</td>
                                            <td>{{$item->warranty}}</td>
                                            <td>{{$item->imei_status}}</td>
                                            <td>{{$item->reorder_qty}}</td>
                                            <td>{{$item->remark}}</td>
                                            <td>{{$item->users->name}}</td>
                                            <td>
                                                <form action="{{url('admin/items/'.$item->id)}}" method="POST"> @csrf  @method('delete')
                                                    <a href="{{url('admin/items/'.$item->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                                                    <button class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')"><i class="ft-trash"></i></button>
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