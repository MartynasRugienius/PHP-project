@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="h1-responsive font-weight-bold text-center m-4 border-bottom">Sveiki atvykę</h1>
    </div>
    <div class="container d-flex flex-wrap">
        @foreach ($events as $item)
            <div class="flex card m-3" style="width: 18rem;">
                <img src="{{ url('storage'.$item->image) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$item->title}}</h5>
                        <p class="card-text">{{$item->description}}</p>
                        <a href="/event/{{$item->id}}" class="btn btn-primary">Go To Event</a>
                    </div>
            </div>
        @endforeach
        <footer class="py-3 my-4 fixed-bottom">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
            <p class="text-center text-muted">© 2022 Kauno Informacinių Technologijų Mokykla</p>
        </footer>
    </div>
@endsection