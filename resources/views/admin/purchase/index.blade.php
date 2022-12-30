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
                                <a href="{{ url('admin/purchases/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="{{url('admin/purchases/')}}" method="GET">
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
                                            <th>Date</th>
                                            <th>Supplier</th>
                                            <th>Item</th>
                                            <th>Quantity</th>
                                            <th>Price</th>
                                            <th>Total Amount</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($purchases as $p)
                                        <tr>
                                            <td>{{$p->purchase_date}}</td>
                                            <td>{{$p->supplier->name}}</td>
                                            <td>
                                                @foreach ($p->purchaseDetails as $pd)
                                                    <p>{{ $pd->item->name }}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($p->purchaseDetails as $pd)
                                                    <p>{{ $pd->quantity }}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($p->purchaseDetails as $pd)
                                                    <p>{{ $pd->purchase_price }}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                @foreach ($p->purchaseDetails as $pd)
                                                    <p>{{ $pd->amount }}</p>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{url('admin/purchases/'.$p->id)}}" method="POST"> @csrf  @method('delete')
                                                    {{-- <a href="{{url('admin/items/'.$p->id.'/edit')}}" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a> --}}
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