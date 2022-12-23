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
                        {{ __('Sections index') }}
                        <span class="float-end">
                            <a href="{{ route('admin.sections.create') }}" class="btn btn-sm btn-success">new section</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Order</th>
                                <th>Name</th>
                                <th>Path</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($sections as $section)
                                    <tr>
                                        <td>{{ $section->id }}</td>
                                        <td>{{ $section->order }}</td>
                                        <td>{{ $section->name }}</td>
                                        <td>{{ $section->path->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.sections.edit', $section->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ route('admin.sections.destroy', $section->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
