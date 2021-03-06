@extends('layouts.app')

@section('content')

<div class="container">
    <form action="/add/event" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="3" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="date">Starting date</label>
            <input type="date" id="date" name="start_date" class="form-control">
        </div>
        <div class="form-group">
            <label for="image">Title</label>
            <input type="file" id="image" name="image" class="form-control">
        </div>
        <div class="form-group">
            <button class="btn btn-primary" type="submit">Add</button>
        </div>
    </form>
    <footer class="py-3 my-4 fixed-bottom">
        <ul class="nav justify-content-center border-bottom pb-3 mb-3"></ul>
        <p class="text-center text-muted">© 2022 Kauno Informacinių Technologijų Mokykla</p>
    </footer>
</div>

@endsection