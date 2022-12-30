@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Create & Edit Form</div>
                                <a href="{{ url('admin/items') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>

                        @if(!empty($items))
                            <form class="form" action="{{ url('admin/items/'.$items->id) }}" method="POST">
                                @csrf 
                                @method('PUT')         
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Item Code</label>
                                        <input type="text" value="{{old('item_code') ?? $items->item_code}}" id="donationinput1" class="form-control @error('item_code') is-invalid @enderror" placeholder="Item code" name="item_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Name</label>
                                        <input type="text" value="{{old('name') ?? $items->name}}" id="donationinput2" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="">Please Choose Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Please Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="item_location_id" class="form-control @error('item_location_id') is-invalid @enderror">
                                                <option value="">Please Choose Item Location</option>
                                            @foreach ($itemlocation as $il)
                                                <option value="{{ $il->id }}">{{ $il->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="warranty" value="1" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">Warranty</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="imei_status" value="1" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">IMEI Status</label>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Reorder Quantity</label>
                                        <input type="number" id="donationinput2" value="{{old('reorder_qty') ?? $items->reorder_qty}}" class="form-control @error('reorder_qty') is-invalid @enderror" placeholder="Reorder Quantity" name="reorder_qty">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput7" class="">Remark</label>
                                        <textarea id="donationinput7" rows="4" class="form-control square @error('remark') is-invalid @enderror" name="remark" placeholder="Remark">{{old('remark') ?? $items->remark}}</textarea>
                                    </div>    
                                </div>
                                <button type="submit" class="btn btn-primary">Update</button>
                            </form>
                        @else
                            <form class="form" action="{{ url('admin/items/') }}" method="POST">
                                @csrf          
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Item Code</label>
                                        <input type="text" id="donationinput1" class="form-control @error('item_code') is-invalid @enderror" placeholder="Item code" name="item_code">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Name</label>
                                        <input type="text" id="donationinput2" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <select name="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                                                <option value="" class="">Please Choose Brand</option>
                                            @foreach ($brands as $brand)
                                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                <option value="">Please Choose Category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="item_location_id" class="form-control @error('item_location_id') is-invalid @enderror">
                                                <option value="">Please Choose Item Location</option>
                                            @foreach ($itemlocation as $il)
                                                <option value="{{ $il->id }}">{{ $il->name }}</option>
                                            @endforeach             
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="warranty" value="1" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">Warranty</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="imei_status" value="1" id="flexCheckChecked" checked>
                                            <label class="form-check-label" for="flexCheckChecked">IMEI Status</label>
                                        </div> 
                                    </div>
                                    <div class="form-group">
                                        <label for="order" class="">Reorder Quantity</label>
                                        <input type="number" id="order" class="form-control @error('reorder_qty') is-invalid @enderror" name="reorder_qty">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput7" class="">Remark</label>
                                        <textarea id="donationinput7" rows="4" class="form-control square @error('remark') is-invalid @enderror" name="remark" placeholder="Remark"></textarea>
                                    </div>    
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection