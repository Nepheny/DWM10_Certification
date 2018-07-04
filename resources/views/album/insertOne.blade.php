@extends('layouts.app')
@section('content')
    <h1>Ajouter un album</h1>
    @if($errors->any())
        {{ $errors->first() }}
    @endif
    <div class="form-container">
        <form action="/album/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
                <label for="title">Titre :</label>
                <input type="text" name="title" id="title">
            </div>
            <div>
                <label for="release">Sortie :</label>
                <input type="date" name="release" id="release">
            </div>
            <div>
                <label for="price">Prix :</label>
                <input type="number" name="price" id="price">
            </div>
            <div>
                <label for="count">Nombre :</label>
                <input type="number" name="count" id="count">
            </div>
            <div>
                <label for="author">Auteur :</label>
                <select name="author" id="author">
                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
                </select>
            </div>
            <div>
                <label for="genres">Genres :</label>
                <select multiple name="genres[]" id="genres">
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                    <label for="cover">Couverture :</label>
                    <input type="file" name="cover" id="cover">
                </div>
            <div class="button">
                <input type="submit" name="insert" value="Ajouter">
            </div>
        </form>
    </div>
@endsection