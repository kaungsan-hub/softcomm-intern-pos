@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Item-Location @if (isset($itemLocation)) Edit @else Create @endif Form</div>
                                <a href="{{ url('admin/item-location') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($itemLocation))
                                <form action="{{route('item-location.update',$itemLocation->id)}}" method="POST">
                                    @method('PUT')
                            @else
                            <form class="form" method="POST" action="{{route('item-location.store')}}">
                            @endif
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Name</label>
                                        <input type="text" id="donationinput1" value="{{old('name',$itemLocation->name ?? '')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name">
                                        <span class="invalid-feedback">
                                            @error('name')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput7" class="">Desccription</label>
                                        <textarea id="donationinput7" rows="5" class="form-control square @error('description') is-invalid @enderror" name="description" placeholder="Enter Description">{{old('description',$itemLocation->description ?? '')}}</textarea>
                                        <span class="invalid-feedback">
                                            @error('description')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">@if (isset($itemLocation)) Update @else Submit @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
