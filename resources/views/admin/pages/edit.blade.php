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
                        {{ __('Page create') }}
                    </div>

                    <div class="card-body">
                        <form action="{{ route('admin.pages.update', $page->id) }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" id="name" class="form-control" name="name" value="{{ $page->name }}">
                            </div>
                            <div class="form-group">
                                <label for="">Slug</label>
                                <input type="text" id="slug" class="form-control" name="slug" value="{{ $page->slug }}">
                            </div>
                            <div class="form-group">
                                <label for="">Content</label>
                                <x-easy-mde name="content">{{ $page->content }}</x-easy-mde>
                            </div>
                            <div class="form-group">
                                <div class="float-end">
                                    <input type="submit" class="btn btn-sm btn-success" value="Edit">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js" integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        let title = document.getElementById('name');
        title.addEventListener("keyup", function (e){
            let value = $(this).val();

            let slug = value
                .toString()
                .normalize('NFD')
                .replace(/[\u0300-\u036f]/g, '')
                .toLowerCase()
                .trim()
                .replace(/\s+/g, '-')
                .replace(/[^\w-]+/g, '')
                .replace(/--+/g, '-')

            document.getElementById('slug').value = slug;
        });
    </script>
@endsection
