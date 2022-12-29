@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Sale Form</div>
                                <a href="{{ url('admin/sample') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form class="form" method="POST" action="{{ url('admin/sales') }}">
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label>Customer ID</label>
                                        <input type="text" class="form-control @error('customer_id') is-invalid @enderror" placeholder="Customer ID"
                                            name="customer_id" value="{{ old('customer_id') }}">
                                        @error('customer_id') 
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <hr>
                                    <div class="d-flex justify-content-between align-items-center my-1">
                                        <div>Add items for sale</div>
                                        <button class="btn btn-primary btn-sm" id="AddItem" type="button" onclick="addNewItemDiv()">
                                            <i class="la la-plus"> Add item</i>
                                        </button>
                                    </div>
                                    <div id="NewItemDiv">
                                    </div>
                                </div>
                                <p><b>Total Amount: </b><span id="totalAmount">0 Ks</span></p> 
                                <input type='text' value='' name='totalAmount' class='totalAmountTextBox' hidden>
                                <button type="submit" class="btn btn-primary">Submit</button>
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
    var totalAmount = 0;
    var previousQuantity = 0;
    var previousSelectedItemPrice = 0;
    var NewItemDivCode = "<div class='row' id='addItemDiv'>" +
                            "<div class='col-8'>"+
                                "<div class='form-group'>"+
                                    "<label>Item</label>"+
                                    "<select class='form-control itemSelect'"+
                                        "name='item_ids[]' onclick='getPreviousSelectedItemPrice(this)' onchange='onSelectItem(this);'>" +
                                        "<option disabled selected>Please select item</option>"+
                                        "@foreach ($items as $item)"+
                                        "@dd($item)" +
                                            "<option value='{{ $item->id }}' data-price={{ $item->setprice->r1 }}>"+
                                                "{{ $item->name }}"+
                                            "</option>"+
                                        "@endforeach"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-3' id='quantityDiv'>"+
                                "<div class='form-group'>"+
                                    "<label>Quantity</label>"+
                                    "<input type='text' class='form-control quantityInput' placeholder='Quantity'"+
                                        "name='quantities[]' onchange='calculatePrice(this)' onfocus='getPreviousQuantity(this)' disabled>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-1'>" +
                                    "<label>Remove</label>" +
                                    "<button class='btn btn-danger btn-sm' onclick='removeNewItemDiv(this)' type='button' class='removeBtn'>" +
                                        "<i class='la la-times'></i>" +
                                    "</button>" +
                            "</div>" +
                        "</div>";

    
    function addNewItemDiv() {
        $('#NewItemDiv').append(NewItemDivCode);
    }

    function removeNewItemDiv(thisButton) {
        // calculate the total value to be subtracted
        var itemPrice = $(thisButton).parent().parent().find(':selected').data('price');
        var quantity = $(thisButton).parent().parent().find('.quantityInput').val();

        // subtract from total amount
        totalAmount -= itemPrice * quantity;

        // if not a number, replace zero
        if (isNaN(totalAmount)) {
            totalAmount = 0;
        }

        // update total amount UI
        $('#totalAmount').html(totalAmount + " KS");
        $('.totalAmountTextBox').val(totalAmount);

        // remove item div
        $(thisButton).parent().parent().remove();
    }

    function onSelectItem(thisSelect) {
        // enable the quantity textbox
        $(thisSelect).parent().parent().parent().find('.quantityInput').prop('disabled', false);

        // get the newly selected item price and quantity
        var itemPrice = $(thisSelect).find(':selected').data('price');
        var quantity = $(thisSelect).parent().parent().parent().find('.quantityInput').val();

        // subtract previously selected price amount from total amount
        totalAmount -= previousSelectedItemPrice * quantity; 

        // add the newly selected price amount
        totalAmount += itemPrice * quantity; 

        // update total amount UI
        $('#totalAmount').html(totalAmount + " KS");
        $('.totalAmountTextBox').val(totalAmount);
    }

    function calculatePrice(thisTextBox) {
        // get the newly selected item price and quantity
        var itemPrice = $(thisTextBox).parent().parent().parent().find('.itemSelect').find(':selected').data('price');
        var quantity = $(thisTextBox).val();

         // subtract previously selected price amount from total amount
        totalAmount -= itemPrice * previousQuantity; 

        // add the newly selected price amount
        totalAmount += itemPrice * quantity; 

        // update total amount UI
        $('#totalAmount').html(totalAmount + " KS");
        $('.totalAmountTextBox').val(totalAmount);
    }

    function getPreviousQuantity(thisTextBox) {
        // get and save previous quantity when user focus on input box
        previousQuantity = $(thisTextBox).val();
    }

    function getPreviousSelectedItemPrice(thisSelect) {
        // get and save previous item price when user click on dropdown
        if (!($(thisSelect).find(':selected').data('price') === undefined)) {
            previousSelectedItemPrice = $(thisSelect).find(':selected').data('price');
        }
    }
</script>
@endsection
