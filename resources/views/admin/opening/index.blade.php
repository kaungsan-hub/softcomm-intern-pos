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
                            <form method="GET" action="{{ url('/admin/openings') }}" class="form-inline my-2 my-lg-0 float-right">
                                <div class="input-group my-1">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary btn-sm" type="submit">
                                            <i class="la la-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                @if (session()->has('msg'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <span>{{session()->get('msg')}}</span>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <table class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Opening ID</th>
                                            <th>Remark</th>
                                            <th>User</th>
                                            <th>Opening_Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($openings as $opening)
                                        <tr>
                                            <td>{{$opening->id}}</td>
                                            <td>{{$opening->remark}}</td>
                                            <td>{{$opening->user->name}}</td>
                                            <td>{{$opening->created_at->format("j M Y")}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{$openings->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
