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
                                <a href="{{ url('admin/purchases') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form name="input" class="form" action="{{url('/admin/purchases')}}" method="post">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Purchase Date</label>
                                        <input type="date"
                                        name="purchase_date" class="form-control @error('purchase_date') is-invalid @enderror">
                                        @error('purchase_date')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="supplier_id" class="form-control @error('supplier_id') is-invalid @enderror">
                                            @error('supplier_id')
                                            <Span class="invalid-feedback">{{$message}}</Span>
                                            @enderror>
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
                                <p><b>Total Amount: </b></p>
                                <div class="form-group d-flex">
                                    <input type="text" id="total_amount" id="multiply_result" class="form-control" value="" readonly>
                                </div>
                                <button type="submit" class="btn btn-primary d-inline">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('js')
<script>
    $(document).ready(function(){
        $('#addbtn').click(function(){
            $('.parent_div').append('<div class="form-group d-flex"><select name="item_ids[]" class="form-control"><option value="">Please Choose items</option>@foreach ($items as $item)<option value="{{ $item->id }}">{{ $item->name }}</option>@endforeach</select><input type="number" class="form-control mx-2 quantity" name="qtys[]" placeholder="Quantity" id="quantity"><input type="text" placeholder="Price" name="purchase_price[]" id="price" onchange="calculateTotal(this)"><button id="delbtn" type="button" class="btn btn-danger d-inline mx-2 removeBtn">- Remove</button></div>');
        });
        $('.parent_div').on('click', '#delbtn', function(){
            $(this).parent().remove();
        });
    });

    var totalPrice = 0;
    function calculateTotal(thisTextBox){ 
        quantity = $(thisTextBox).parent().find('.quantity').val();
        price = $(thisTextBox).val();
        totalPrice += quantity * price;           
        document.input.total_amount.value = totalPrice;
    }
   
        
</script>
@endsection
