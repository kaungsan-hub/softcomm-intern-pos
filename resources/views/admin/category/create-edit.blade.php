@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                

                                <div>@if (isset($category)) Edit @else Add @endif Category</div>
                                <a href="{{url('admin/categories')}}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            @if (isset($category))
                            <form class="col-6" method="post" action="{{ url('admin/categories/'.$category->id) }}">
                            @method('PUT')
                            @else
                            <form class="col-6" method="post" action="{{ url('admin/categories') }}">
                        @endif
                                @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">Name</label>
                                        <input type="text" id="donationinput1" class="form-control @error('name') is-invalid @enderror" placeholder="Category Name" name="name" value="{{ old('name', $category->name ?? '') }}" >
                                        @error('name')
                                        <span class="invalid-feedback">{{$message}}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Description</label>
                                        <input type="text" id="donationinput2" class="form-control @error('description') is-invalid @enderror" placeholder="Description" name="description" value="{{ old('description', $category->description ?? '') }}">
                                        @error('description')
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