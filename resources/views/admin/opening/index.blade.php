@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Opening Tables</div>
                                <a href="{{ route('openings.create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                @if(session()->has('msg'))
                                    <div class="alert alert-light mt-3">
                                        <span>{{ session()->get('msg') }}</span>
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Opening ID</th>
                                            <th>Remark</th>
                                            <th>User</th>
                                            <th>Opening_Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($openings as $opening)
                                        <tr>
                                            <td>{{$opening->id}}</td>
                                            <td>{{$opening->remark}}</td>
                                            <td>{{$opening->user->name}}</td>
                                            <td>{{$opening->created_at->format("j M Y")}}</td>
                                            <td>
                                                <form action="" method="POST"> @csrf  @method('delete')
                                                    <button class="btn btn-outline-danger btn-sm" onclick="return confirm('Are you sure?')">Remove</button>
                                                    <a class="btn btn-outline-success btn-sm" href="">Update </a>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
