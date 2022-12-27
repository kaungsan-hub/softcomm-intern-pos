@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Supplier Create or Edit Form</div>
                                <a href="{{ url('admin/suppliers') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($supplier->id))
                            <form class="form" action="{{ url('admin/suppliers/' . $supplier->id) }}" method="post">
                            @method('put')                                
                            @else 
                            <form class="form" action="{{ url('admin/suppliers/') }}" method="post"> 
                            @endif


                            @csrf


                            {{-- @method('put') --}}

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" id="name"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Name"
                                        name="name" value="{{ old('name', $supplier->name ?? '') }}" >

                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Address</label>
                                    <input type="text" id="address"
                                        class="form-control @error('address') is-invalid @enderror" placeholder="Address"
                                        name="address" value="{{ old('address', $supplier->address ?? '') }}" >
                                    @error('address')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input type="text" id="phone"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="Phone"
                                        name="phone" value="{{ old('phone', $supplier->phone ?? '') }}" >
                                    @error('phone')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contact_person" class="">Contact Person</label>
                                    <input type="text" id="contact_person"
                                        class="form-control @error('contact_person') is-invalid @enderror"
                                        placeholder="contact_person" name="contact_person" value="{{ old('contact_person', $supplier->contact_person ?? '') }}"  >
                                    @error('contact_person')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            
                            <button type="submit" class="btn btn-primary">

                                 {{ (isset($supplier->id)) ? "Update" : "Submit" }}
                                    
                            </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
