@extends('layouts.guest')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Dashboard</div>
                        <div class="card-body">
                            @if(session()->has('success'))
                                <div class="alert alert-success">
                                    {{ session()->get('success') }}
                                </div>
                            @endif
                            <h3>Cursuri disponibile</h3>
                            <hr>
                            <em>Lista tuturor cursurilor oferite pe aceasta paltforma</em>
                            <div>
                                <table class="table table-bordered table-stripped">
                                    <thead>
                                        <tr>
                                            <th>Curs</th>
                                            <th>Descriere</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($paths as $path)
                                            <tr>
                                                <td>{{ $path->name }}</td>
                                                <td>{{ $path->content }}</td>
                                                <td>
                                                    @if(isset($enrolled[$path->id]))
                                                        <em>Esti deja inscris la acest curs!</em>
                                                    @else
                                                        <a href="{{ route('path.enroll', $path->slug) }}" class="btn btn-sm btn-success">
                                                            Inscrie-te!
                                                        </a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </div>
                            <h3>Cursurile tale</h3>
                            <hr>
                            <em>Esti inscris la urmatoarele cursuri:</em>
                            <div>
                                <table class="table table-bordered table-stripped">
                                    <thead>
                                    <tr>
                                        <th>Curs</th>
                                        <th>Progress</th>
                                        <th>#</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($enrolledPaths as $enrolledPath)
                                            <tr>
                                                <td>
                                                    {{ $enrolledPath->path->name }}
                                                </td>
                                                <td>
                                                    @if($enrolledPath->last_lesson_id)
                                                    @else
                                                        <em>Inca nu ai inceput acest curs</em>
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="" class="btn btn-sm btn-success">
                                                        Continua
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            dashboard

                            - path-uri la care s-a inscris
                            - progresul la path-urile alese

                            ----
                            poate facem si quiz-uri
                            ----
                            tabele:
                                enrolled_paths- id, path_id, user_id, last_lesson_id
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection

