@extends('layouts.app')

@section('content')
<div class="container">
    <h1>FUMETTI</h1>
    <div class="row row-cols-4">
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
                    <li class="list-group-item">data di uscita: {{$comic->sale_date}}</li>
                    <li class="list-group-item">prezzo: {{$comic->price}}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection