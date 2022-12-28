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
                                <a href="" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form class="form" method="POST" action="">
                            @csrf
                                <div class="form-body">
                                    <div class="form-group">
                                        <div class="row mb-1">
                                            <div class="col-6">
                                                <label for="donationinput1" class="">Item</label>
                                                <select class="custom-select" name="role" aria-label="Default select example">
                                                    <option selected>User</option>
                                                    <option value="User">User</option>
                                                </select>
                                            </div>
                                            <div class="col-6">
                                                <label for="donationinput1" class="">Quantity</label>
                                                <input type="number" id="donationinput1" value="" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" name="name">
                                                <span class="invalid-feedback">
                                                    @error('name')
                                                        {{$message}}
                                                    @enderror
                                                </span>
                                            </div>
                                        </div>
                                        <form action="">
                                            <button type="submit" class="btn btn-secondary btn-sm float-right">Add</button>
                                        </form>
                                        <br>
                                        <label for="donationinput1" class="">Remark</label>
                                        <input type="text" id="donationinput1" value="" class="form-control @error('name') is-invalid @enderror" placeholder="Remark" name="name">
                                        <span class="invalid-feedback">
                                            @error('name')
                                                {{$message}}
                                            @enderror
                                        </span>
                                    </div>
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
