@extends('layouts.guest')

@section('content')
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Contact</div>
                    <div class="card-body">
                        Salut! <br>
                        Multumim ca ai ales acest site ca resursa de invatare! <br>
                        Ne poti contacta folosind formularul de mai jos, <a href="https://www.invata-programare.ro/discussions" target="_blank">forum-ul</a> sau <a href="https://www.invata-programare.ro/chat" target="_blank">chat-ul</a> de pe
                        <a href="https://www.invata-programare.ro/" target="_blank">invata-programare.ro</a> sau pe <a href="https://discord.gg/rbfbH39RHP">discord</a>/<a href="https://www.facebook.com/groups/invataprogramare" target="_blank">facebook</a>.
                        <form action="">
                            @csrf
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email">
                            </div>
                            <div class="form-group">
                                <label for="">Mesaj</label>
                                <textarea name="content" id="" cols="30" rows="3" class="form-control"></textarea>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="float-end">
                                    <input type="submit" class="btn btn-success" value="Send message">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
