@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Users Create or Edit Form</div>
                                <a href="{{ url('admin/users') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>
                            <form class="form" method="POST" action=" {{ isset($user)? url('admin/users/' . $user->id):url('admin/users') }}">
                                @csrf
                                @if(isset($user))
                                @method('PUT')
                                @endif
                                <div class="form-body">
                                    <div class="form-group">
                                        <label class="">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Name" name="name"
                                            value="{{ old('name', isset($user) ? $user->name : '') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label class="">Role</label>
                                        <select class="form-control @error('role') is-invalid @enderror"
                                            aria-label="Default select example" name="role">
                                            <option disabled selected>Please select role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role }}"
                                                    {{ old('role', isset($user) ? $user->role : '') == $role ? 'selected' : '' }}>
                                                    {{ $role }}</option>
                                            @endforeach
                                        </select>
                                        @error('role')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if (!isset($user))
                                        <div class="form-group">
                                            <label class="">Email</label>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                placeholder="Email" name="email"
                                                value="{{ old('email', isset($user) ? $user->email : '') }}">
                                            @error('email')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="">Password</label>
                                            <input type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                placeholder="Password" name="password">
                                            @error('password')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
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
