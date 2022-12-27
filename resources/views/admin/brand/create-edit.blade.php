@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                @if(session()->has('msg'))
                                <div class="alert alert-success">
                                    <span>{{session()->get('msg')}}</span>
                                    <button data-bs-dismiss="alert" class="btn btn-close float-end"></button>
                                </div>
                                @endif

                                <div>@if (isset($brand)) Edit @else Add @endif Brand</div>
                                <a href="{{ url('admin/brands') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($brand))
                            
                            <form class="col-6" method="post" action="{{ url('admin/brands/'.$brand->id) }}">
                            @method('PUT')
                            @else
                            
                            <form class="col-6" method="post" action="{{ url('admin/brands/') }}">
                            @endif
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Brand Code</label>
                                        <input type="text" id="donationinput1" class="form-control @error('brandcode') is-invalid @enderror" placeholder="Brand Code" name="brandcode" value="{{ old('brandcode', $brand->brand_code ?? '') }}" >
                                        @error('brandcode')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Brand Name</label>
                                        <input type="text" id="donationinput2" class="form-control @error('brandname') is-invalid @enderror" placeholder="Brand Name" name="brandname" value="{{ old('brandname', $brand->name ?? '') }}">
                                        @error('brandname')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>    
                                </div>
                                <button type="submit" class="btn btn-primary">@if (isset($brand)) Update @else Submit @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection