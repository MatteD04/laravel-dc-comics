@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Aggiungi un fumetto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('comics.store)}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">titolo</label>
            <input type="email" class="form-control" id="title" name="title" value="{{ old('title') }}">
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">descrizione</label>
            <textarea class="form-control" id="description" name="description" value="{{ old('description') }}">
        </div>
        <div class="mb-3">
            <label for="thumb" class="form-label">immagine</label>
            <input type="email" class="form-control" id="thumb" name="thumb" value="{{ old('thumb') }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">prezzo</label>
            <input type="email" class="form-control" id="price" name="price" value="{{ old('price') }}">
        </div>
        <div class="mb-3">
            <label for="series" class="form-label">serie</label>
            <input type="email" class="form-control" id="series" name="series" value="{{ old('series') }}">
        </div>
        <div class="mb-3">
            <label for="sale_date" class="form-label">data di vendita</label>
            <input type="email" class="form-control" id="sale_date" name="sale_date" value="{{ old('sale_date') }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">tipo</label>
            <input type="email" class="form-control" id="type" name="type" value="{{ old('type') }}">
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection