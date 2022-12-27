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
                            <form action="">
                                <input type="text" class="form-control my-1 col-4 float-right" placeholder="search">
                            </form>
                            <div class="table-responsive">
                                @if (session()->has('msg'))
                                    <div class="alert alert-info">
                                        <span>{{session()->get('msg')}}</span>
                                        {{-- <button data-bs-dismiss='alert' class="btn btn-close float-end"></button> --}}
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
                                                <td>{{$itemLocation->created_by}}</td>
                                                <td class="text-nowrap">
                                                    <form action="{{route('item-location.destroy', $itemLocation->id)}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('item-location.edit',$itemLocation->id)}}" class="btn btn-sm btn-warning">Edit</a>
                                                        <button class="btn btn-sm btn-danger">Delete</button>
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
