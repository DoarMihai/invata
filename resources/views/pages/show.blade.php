@extends('layouts.guest')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ $page->name }}</div>
                    <div class="card-body">{{ $page->content }}</div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
