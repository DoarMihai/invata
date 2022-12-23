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
                        {{ __('Edit path') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.paths.update', $path->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" value="{{ $path->name }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="float-end">
                                    <input type="submit" class="btn btn-success" value="Edit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
