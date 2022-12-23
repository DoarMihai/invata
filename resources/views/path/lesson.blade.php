@extends('layouts.guest')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        @foreach($pathLessons as $pathLesson)
                            <li class="list-group-item">
                                <a href="">
                                    {{ $pathLesson->name }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">{{ $path->name.' / '.$lesson->name }}</div>
                        <div class="card-body">
                            {{ $lesson->content }}
                        </div>
                    </div>
                    <br>
                    <a href="" class="btn btn-sm btn-success">
                        Lectia precedenta
                    </a>
                    <a href="" class="btn btn-sm btn-success float-end">
                        Lectia urmatoare
                    </a>
                </div>
            </div>
        </div>
    </main>
@endsection

