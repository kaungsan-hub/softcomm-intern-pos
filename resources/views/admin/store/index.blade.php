@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Store Index</div>
                                <a href="" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form method="GET" action="" class="form-inline my-2 my-lg-0 float-right">
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
                                            <th>ID</th>
                                            <th>Item Code</th>
                                            <th>Item Name</th>
                                            <th>In Quantity</th>
                                            <th>Out Quantity</th>
                                            <th>Balance</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stores as $store)
                                        <tr>
                                            <td>{{$store->id}}</td>
                                            <td>{{$store->item->item_code}}</td>
                                            <td>{{$store->item->name}}</td>
                                            <td>{{$store->in_qty}}</td>
                                            <td>{{$store->out_qty}}</td>
                                            <td>{{$store->balance}}</td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$stores->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
