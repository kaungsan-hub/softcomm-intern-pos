@extends('admin.layout.app')
@section('content')
    <div class="content-wrapper">
        <div class="content-body">
            <div class="row my-1">
                <div class="col-md-12">
                    <div class="card">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center my-1">
                                <div>Set Price Create or Edit Form</div>
                                <a href="{{ url('admin/setprices') }}" class="btn btn-primary btn-sm" title="back">
                                    <i class="la la-chevron-circle-left"></i>
                                </a>
                            </div>

                            @if (isset($setprice->id))
                                <form class="form" action="{{ url('admin/setprices/' . $setprice->id) }}" method="post">
                                    @method('put')
                                @else
                                    <form class="form" action="{{ url('admin/setprices/') }}" method="post">
                            @endif
                            @csrf

                            <div class="form-body">

                                <div class="form-group">
                                    <label for="item_id">Item Code</label>
                                    <select name="item_id" class="form-control @error('item_id') is-invalid @enderror">
                                        {{-- <option value="">Select Item Code</option> --}}

                                        <option selected disabled="disabled">Select Item Code</option>

                                        @foreach ($items as $item)

                                        @if (isset($setprice->id))

                                        <option value={{ $item->id }}
                                            {{ $setprice->item_id == $item->id ? 'selected' : '' }}>{{ $item->item_code }}
                                        </option>

                                        @else 
                                        
                                        <option value="{{ $item->id }}"> {{ old('item_code', $item->item_code ?? '' ) }} </option>                                    

                                        @endif                                            

                                        @endforeach 
                                    </select>
                                    @error('item_id')
                                        <span class="invalid-feedback"> {{ $message }} </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="r1">R 1</label>
                                    <input type="text" id="r1"
                                        class="form-control @error('r1') is-invalid @enderror" placeholder="R 1"
                                        name="r1" value="{{ old('r1', $setprice->r1 ?? '') }}">
                                    @error('r1')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="r2">R 2</label>
                                    <input type="text" id="r2"
                                        class="form-control @error('r2') is-invalid @enderror" placeholder="R 1"
                                        name="r2" value="{{ old('r2', $setprice->r1 ?? '') }}">
                                    @error('r2')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>

                            <button type="submit" class="btn btn-primary">
                                {{ isset($setprice->id) ? 'Update' : 'Submit' }}
                            </button>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
