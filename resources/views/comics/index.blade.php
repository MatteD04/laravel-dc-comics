@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FUMETTI</h1>
    <div class="row row-cols-4">
    @foreach($comics as $comic)
        <div class="col">
            <div class="card" style="width: 18rem;">
                <img src="{{$comic->thumb}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$comic->title}}</h5>
                    <p class="card-text">{{$comic->description}}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">{{$comic->series}}</li>
                    <li class="list-group-item">{{$comic->type}}</li>
                </ul>
                <div class="card-body">
                    <a href="{{route('comics.show', ['comic' => $comic->id])}}" class="card-link">info</a>
                </div>
                <div class="card-body">
                    <a href="{{route('comics.edit', ['comic' => $comic->id])}}" class="card-link">modifica</a>
                </div>
                <div>
                    <form action="{{route('comics.destroy)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">elimina</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
@endsection