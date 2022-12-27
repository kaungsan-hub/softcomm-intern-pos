@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Sample Create or Edit Form</div>
                                <a href="{{ url('admin/sample') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form class="form">
                                <div class="form-body">
                                    <div class="form-group">
                                        <label for="donationinput1" class="">First Name</label>
                                        <input type="text" id="donationinput1" class="form-control" placeholder="First Name" name="fname">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput2" class="">Last Name</label>
                                        <input type="text" id="donationinput2" class="form-control" placeholder="Last Name" name="lanme">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput3" class="">E-mail</label>
                                        <input type="email" id="donationinput3" class="form-control" placeholder="E-mail" name="email">
                                    </div>
    
                                    <div class="form-group">
                                        <label for="donationinput4" class="">Contact Number</label>
                                        <input type="text" id="donationinput4" class="form-control" placeholder="Phone" name="phone">
                                    </div>
                                    <div class="form-group">
                                        <label for="donationinput7" class="">Message</label>
                                        <textarea id="donationinput7" rows="5" class="form-control square" name="message" placeholder="message"></textarea>
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