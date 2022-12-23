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
                        {{ __('Paths index') }}
                        <span class="float-end">
                            <a href="{{ route('admin.pages.create') }}" class="btn btn-sm btn-success">new page</a>
                        </span>
                    </div>

                    <div class="card-body">
                        <table class="table table-stripped table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Options</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <td>{{ $page->id }}</td>
                                        <td>{{ $page->name }}</td>
                                        <td>
                                            <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-success">Edit</a>
                                            <a href="{{ route('admin.pages.destroy', $page->id) }}" class="btn btn-sm btn-danger">Delete</a>
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
