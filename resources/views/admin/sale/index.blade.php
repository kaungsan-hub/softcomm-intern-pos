@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Sales Table</div>
                                <a href="{{ url('admin/sales/create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                @if (Session::has('msg'))
                                    <div class="alert {{ Session::get('msg-class') }}" role="alert">
                                        {{ Session::get('msg') }}
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Sale Date</th>
                                            <th>Customer</th>
                                            <th>Items</th>
                                            <th>Total Amount</th>
                                            <th>Created By</th>
                                            <th>Updated By</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                            <tr>
                                                <th scope="row">{{ $sale->id }}</th>
                                                <td>{{ $sale->sale_date }}</td>
                                                <td>{{ $sale->customer->name }}</td>
                                                <td>
                                                    <ul>
                                                        @foreach ($sale->saleDetails as $saleDetail)
                                                            <li> {{ $saleDetail->item->name }} </li>
                                                        @endforeach
                                                    </ul>
                                                </td>
                                                <td>{{ $sale->total_amount }}</td>
                                                <td>{{ $sale->creator->name }}</td>
                                                <td>{{ isset($sale->updater->name) ? $sale->updater->name : 'None' }}</td>
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
