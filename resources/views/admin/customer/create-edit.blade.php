@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Sample @if(isset($customers)) 
                                    Edit
                                    @else 
                                    Create
                                    @endif Form</div>
                                <a href="{{ url('admin/customers') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($customers))

                            <form class="" method="post" action="{{url('admin/customers/'.$customers->id)}}">

                            @method('PUT')

                            @else

                            <form class="" method="post" action="{{url('admin/customers')}}">

                            @endif
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Name</label>
                                        <input type="text" name="name" value="{{ old('name', $customers->name ?? '') }}" class="form-control @error('name') is-invalid @enderror">
                                        @error('name')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Contact Person</label>
                                        <input type="text" name="contact_person" value="{{ old('contact_person', $customers->contact_person ?? '') }}" class="form-control  @error('contact_person') is-invalid @enderror">
                                        @error('contact_person')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>       

                                    <div class="form-group">
                                        <label for="donationinput1" class="">Phone</label>
                                        <input type="text" name="phone" value="{{ old('phone', $customers->phone ?? '') }}" class="form-control  @error('phone') is-invalid @enderror">
                                        @error('phone')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>       

                                    <div class="form-group">
                                        <label for="donationinput1" class="">Address</label>
                                        <input type="text" name="address" value="{{ old('address', $customers->address ?? '') }}" class="form-control  @error('address') is-invalid @enderror">
                                        @error('address')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>       

                                    <div class="form-group">
                                        <label for="donationinput1" class="">Email</label>
                                        <input type="text" name="email" value="{{ old('email', $customers->email ?? '') }}" class="form-control  @error('email') is-invalid @enderror">
                                        @error('email')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="donationinput1" class="">Region</label>
                                        <input type="text" name="region" value="{{ old('region', $customers->region ?? '') }}" class="form-control  @error('region') is-invalid @enderror">
                                        @error('region')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>     

                                    <div class="form-group">
                                        <label for="donationinput1" class="">City</label>
                                        <input type="text" name="city" value="{{ old('city', $customers->city ?? '') }}" class="form-control  @error('city') is-invalid @enderror">
                                        @error('city')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>     

                                    <div class="form-group">
                                        <label for="donationinput1" class="">Remark</label>
                                        <input type="text" name="remark" value="{{ old('Remark', $customers->remark ?? '') }}" class="form-control  @error('remark') is-invalid @enderror">
                                        @error('remark')
                                        <Span class="invalid-feedback">{{$message}}</Span>
                                        @enderror
                                    </div>     

                                </div>
                                <button type="submit" class="btn btn-primary">
                                    @if(isset($customers)) 
                                    Edit
                                    @else 
                                    Submit
                                    @endif
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection