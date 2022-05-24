@extends('layouts.app')

@section('content')

    <div class="container d-flex">
        <div class="card" style="width: 18rem;">
            <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$event->title}}</h5>
                    <p class="card-text">{{$event->description}}</p>
                </div>
        </div>
    </div>

    <div class="container">
        <form action="/register/event" method="POST">
            @csrf
            <input type="hidden" id="event_id" name="event_id" value="{{$event->id}}">
            <div class="form-group">
                <label for="name">Name</label>
                <input name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="email" name="email" class="form-control">
            </div>
            <div class="form-group">
                <label for="telephone">Telephone</label>
                <input type="text" id="telephone" name="telephone" class="form-control">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Request</button>
            </div>
        </form>
    </div>

    <div class="container">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telephone</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($event->eventUser as $item)
                <tr>
                    <th scope="row">{{$item->event_id}}</th>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>{{$item->telephone}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($event->user_id==Auth::id())
            <form action="/delete/event/{{$event->id}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
            <a href="/update/event/{{$event->id}}" class="btn btn-primary">Update</a>
        @endif
        <footer class="py-3 my-4 fixed-bottom">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
            <p class="text-center text-muted">© 2022 Kauno Informacinių Technologijų Mokykla</p>
        </footer>
    </div>
@endsection