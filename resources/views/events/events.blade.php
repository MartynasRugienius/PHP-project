@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($events as $item)
          <div class="d-flex flex-row">
             <div class="card p-2" style="width: 18rem;">
                 <img src="{{ url('storage'.$item->image) }}" class="card-img-top" alt="...">
                      <div class="card-body">
                         <h5 class="card-title">{{$item->title}}</h5>
                         <p class="card-text">{{$item->description}}</p>
                        <a href="/event/{{$item->id}}" class="btn btn-primary">Go To Event</a>
                    </div>
            </div>
        @endforeach
    </div>
@endsection