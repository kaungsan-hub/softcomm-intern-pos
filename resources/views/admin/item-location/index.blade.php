@extends('admin.layout.app')
@section('content')
  <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>Item-Location Tables</div>
                                <a href="{{ route('item-location.create') }}" class="btn btn-primary btn-sm" title="add new">
                                    <i class="la la-plus-circle"></i>
                                </a>
                            </div>
                            <form method="GET" action="{{ url('admin/item-location') }}" class="form-inline my-2 my-lg-0 float-right">
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
                                            <th>Description</th>
                                            <th>Created_by</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($itemsLocation as $itemLocation)
                                            <tr>
                                                <th scope="row">{{$itemLocation->id}}</th>
                                                <td class="text-nowrap">{{$itemLocation->name}}</td>
                                                <td>{{$itemLocation->description}}</td>
                                                <td>{{$itemLocation->user->name}}</td>
                                                <td class="text-nowrap">
                                                    <form action="{{route('item-location.destroy', $itemLocation->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('item-location.edit',$itemLocation->id)}}" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                                                        <button class="btn btn-sm btn-danger"><i class="ft-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="">
                                    {{ $itemsLocation->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  </div>
@endsection
