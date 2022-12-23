<div class="container">
    <div class="row">
        @foreach($paths as $path)
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            {{ $path->name }}
                        </div>
                    </div>
                    <div class="card-body">
                        {{ $path->content }}
                        <hr>
                        <a href="" class="btn btn-primary d-block">Inscrie-te</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
