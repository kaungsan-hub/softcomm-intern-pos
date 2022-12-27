@extends('admin.layout.loginLayout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-lg-8 mx-auto">
                @if (Session::has('msg'))
                    <div class="alert alert-danger mx-5 mt-5" role="alert">
                        {{ Session::get('msg') }}
                    </div>
                @endif
                <div class="card m-5">
                    <h5 class="card-header text-center"><b>Admin Login</b></h5>
                    <hr>
                    <div class="card-body">
                        <form action="{{ url('/login') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label class="">Email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Email" name="email" value="{{ old('email') }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="">Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Password" name="password">
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
