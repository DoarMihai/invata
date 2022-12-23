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
                        {{ __('Lessons index') }}
                        <span class="float-end">
                            <a href="{{ route('admin.lessons.create') }}" class="btn btn-sm btn-success">new lesson</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Path</th>
                                <th>Section</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($lessons as $lesson)
                                    <tr>
                                        <td>{{ $lesson->id }}</td>
                                        <td>{{ $lesson->name }}</td>
                                        <td>{{ $lesson->path->name }}</td>
                                        <td>{{ $lesson->section->name }}</td>
                                        <td>
                                            <a href="" class="btn btn-sm btn-success">Edit</a>
                                            <a href="" class="btn btn-sm btn-danger">Delete</a>
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
@endsection
