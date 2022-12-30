@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Counter Tables</div>
                                <a href="{{ route('counters.create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form method="GET" action="{{ url('admin/counters') }}" class="form-inline my-2 my-lg-0 float-right">
                                <div class="input-group my-1">
                                    <input type="text" class="form-control" placeholder="Search" name="search">
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
                                            <th>#</th>
                                            <th>Name</th>
                                            <th>Created_by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($counters as $counter)
                                            <tr>
                                                <th scope="row">{{$counter->id}}</th>
                                                <td class="text-nowrap">{{$counter->name}}</td>
                                                <td>{{$counter->user->name}}</td>
                                                <td class="text-nowrap">
                                                    <form action="{{route('counters.destroy', $counter->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('counters.edit',$counter->id)}}" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                                                        <button class="btn btn-sm btn-danger"><i class="ft-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $counters->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
