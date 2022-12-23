@extends('layouts.guest')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Curs {{ $path->name }}</div>
                        <div class="card-body">
                            <span>
                                {{ $path->content }}
                            </span>
                            <hr>
                            <strong>Lectii curs:</strong>
                            <ul>
                                @foreach($lessons as $lesson)
                                    <li>
                                        <a href="{{ route('path.lesson', [$path->slug, $lesson->slug]) }}">
                                            {{ $lesson->name }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

