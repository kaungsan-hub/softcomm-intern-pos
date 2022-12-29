@extends('admin.layout.app')

@section('content')


    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Purchase Form</div>
                                <a href="{{ url('admin/sample') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form class="form" action="{{url('/admin/purchases')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input type="date" class="form-control"
                                            name="purchase_date">
                                    </div>
                                    <div class="form-group">
                                        <select name="supplier_id" class="form-control">
                                                <option value="">Please Choose supplier</option>
                                            @foreach ($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    
                                    <div class="parent_div form-group">
                                        <button type="button" id="addbtn" class="btn btn-primary mb-2">+ Add New Items and Quantity</button>
                                    </div>
                                </div>
                                <p><b>Total Amount: </b><span>0 Ks</span></p>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
