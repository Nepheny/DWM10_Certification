@extends('layouts.app')
@section('content')
    <h1>Ajouter un album</h1>
    @if($errors->any())
       <strong>{{ $errors->first() }}</strong>
    @endif
    <div class="form-container">
        <form action="/album/insert" method="POST" enctype="multipart/form-data">
            @csrf
            <table>
                <tr>
                    <td><label for="title">Titre :</label></td>
                    <td><input type="text" name="title" id="title"></td>
                </tr>
                <tr>
                    <td><label for="release">Sortie :</label></td>
                    <td><input type="date" name="release" id="release"></td>
                </tr>
                <tr>
                    <td><label for="price">Prix :</label></td>
                    <td><input type="number" name="price" id="price"></td>
                </tr>
                <tr>
                    <td><label for="count">Nombre :</label></td>
                    <td><input type="number" name="count" id="count"></td>
                </tr>
                <tr>
                    <td><label for="cover">Couverture :</label></td>
                    <td><input type="file" name="cover" id="cover"></td>
                </tr>
                <tr>
                    <td><label for="author">Auteur :</label></td>
                    <td>
                        <select name="author" id="author">
                            @foreach ($authors as $author)
                                <option value="{{ $author->id }}">{{ $author->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="genres">Genres :</label></td>
                    <td>
                        <select multiple name="genres[]" id="genres">
                            @foreach ($genres as $genre)
                                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input type="submit" name="insert" value="Ajouter" class="button"></td>
                </tr>
            </table>
        </form>
    </div>
@endsection