@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-3">
                @include('admin.menu')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        {{ __('Section create') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.sections.update', $section->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $section->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Order</label>
                                <input type="text" class="form-control" name="order" value="{{ $section->order }}">
                            </div>
                            <div class="form-group">
                                <label for="">Path</label>
                                <select name="path_id" id="" class="form-control">
                                    @foreach($paths as $path)
                                        <option value="{{ $path->id }}" {{ $section->path_id == $path->id ? 'selected' : '' }}>{{ $path->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="float-end">
                                    <input type="submit" class="btn btn-sm btn-success" value="Create">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
