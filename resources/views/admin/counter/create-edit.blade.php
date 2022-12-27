@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Counter @if (isset($counter)) Edit @else Create @endif Form</div>
                                <a href="{{ url('admin/counters') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($counter))
                                <form action="{{route('counters.update',$counter->id)}}" method="POST">
                                    @method('PUT')
                            @else
                            <form class="form" method="POST" action="{{route('counters.store')}}">
                            @endif
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Counter Name</label>
                                        <input type="text" id="donationinput1" value="{{old('name',$counter->name ?? '')}}" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name">
                                        <span class="invalid-feedback">
                                            @error('name')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">@if (isset($counter)) Update @else Submit @endif</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
