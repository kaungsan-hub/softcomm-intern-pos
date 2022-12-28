@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Set Price Create or Edit Form</div>
                                <a href="{{ url('admin/setprices') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>

                            @if (isset($setprices->id))
                            <form class="form" action="{{ url('admin/setprices/' . $setprices->id) }}" method="post">
                            @method('put')
                            @else 
                            <form class="form" action="{{ url('admin/setprices/') }}" method="post"> 
                            @endif
                            @csrf

                            <div class="form-body">
                                <div class="form-group">
                                    <label for="item_code">Item Code</label>
                                    <input type="text" id="item_code"
                                        class="form-control @error('item_code') is-invalid @enderror" placeholder="Item Code"
                                        name="item_code" value="{{ old('item_code', $setprices->item_code ?? '') }}" >

                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="r1">R 1</label>
                                    <input type="text" id="r1"
                                        class="form-control @error('r1') is-invalid @enderror" placeholder="R 1"
                                        name="r1" value="{{ old('r1', $setprices->r1 ?? '') }}" >
                                    @error('r1')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="r2">R 2</label>
                                    <input type="text" id="r2"
                                        class="form-control @error('r2') is-invalid @enderror" placeholder="R 1"
                                        name="r2" value="{{ old('r2', $setprices->r1 ?? '') }}" >
                                    @error('r2')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                               
                            </div>
                            
                            <button type="submit" class="btn btn-primary">

                                 {{ (isset($setprices->id)) ? "Update" : "Submit" }}
                                    
                            </button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
