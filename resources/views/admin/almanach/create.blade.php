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
                        {{ __('Create almanach') }}
                    </div>

                    <div class="card-body">
                        <form action="" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Section</label>
                                <input type="text" name="section" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <x-easy-mde name="content"/>
                            </div>
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
