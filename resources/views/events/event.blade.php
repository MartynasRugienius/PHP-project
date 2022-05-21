@extends('layouts.app')

@section('content')


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

    <div>
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
    </div>
@endsection