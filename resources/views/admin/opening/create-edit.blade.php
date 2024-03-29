@extends('admin.layout.app')
@section('content')
<div class="content-wrapper">
    <div class="content-body">
        <div class="row my-1">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center my-1">
                            <div>Opening Form</div>
                            <a href="{{route('openings.index')}}" class="btn btn-primary btn-sm" title="back">
                                <i class="la la-chevron-circle-left"></i>
                            </a>
                        </div>
                        <form class="form" action="{{route('openings.store')}}" method="POST">
                            @csrf
                            <div class="form-body">
                                <div class="d-flex justify-content-between align-items-center my-1">
                                    <div>Opening Item into Store</div>
                                    <button class="btn btn-primary btn-sm" id="AddItem" type="button" onclick="addNewItemDiv()">
                                        <i class="la la-plus">Add item</i>
                                    </button>
                                </div>
                                <div id="NewItemDiv">
                                </div>
                                <div class="form-group">
                                    <label>Remark</label>
                                    <input type="text"  class="form-control @error('remark') is-invalid @enderror" value="{{ old('remark', $openings->remark ?? '') }} "
                                        name="remark">
                                        @error('remark')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                </div>
                                <hr>
                            </div>
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
    var NewItemDivCode = "<div class='row' id='addItemDiv'>" +
                            "<div class='col-8'>"+
                                "<div class='form-group'>"+
                                    "<label>Item Name</label>"+
                                    "<select class='form-control @error('items') is-invalid @enderror'"+
                                        "aria-label='Default select example' name='items[]'>"+
                                        "<option disabled selected>Please select item</option>"+
                                        "@foreach ($items as $item)"+
                                            "<option value='{{ $item->id }}''"+
                                                "{{ old('items') == $item->name ? 'selected' : '' }}>"+
                                                "{{ $item->name }}"+
                                            "</option>"+
                                        "@endforeach"+
                                    "</select>"+
                                "</div>"+
                            "</div>"+
                            "<div class='col-3'>"+
                                "<div class='form-group'>"+
                                    "<label>Quantity</label>"+
                                    "<input type='text' class='form-control' placeholder='Quantity'"+
                                        "name='quantities[]'>"+
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
        $(thisButton).parent().parent().remove();
    }
</script>
@endsection
