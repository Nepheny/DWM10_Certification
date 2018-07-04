@extends('layouts.app')
@section('content')
    <h1>Liste des albums</h1>
    <div class="albums-container">
        <ul>
            @foreach ($albums as $album)
                <li>
                    <h2>{{ $album->title }}</h2>
                    <div class="actions-container">
                        <button class="button-action" type="button" data-action="infos" data-id="{{ $album->id }}">Infos</button>
                        <form action="/album/update" method="GET">
                            @csrf
                            <input type="hidden" name="id" value="{{ $album->id }}">
                            <input class="button-action" type="submit" name="update" value="Modifier">
                        </form>
                        <form action="/album/buy" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $album->id }}">
                            <input class="button-action" type="submit" name="buy" value="Acheter">
                        </form>
                        <form action="/album/delete" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="{{ $album->id }}">
                            <input class="button-action" type="submit" name="delete" value="Supprimer">
                        </form>
                    </div>
                    <div class="album-container">
                        <div>
                            <p><span>Sortie : </span>{{ $album->release }}</p>
                            <p><span>Auteur : </span>{{ $album->author->name }}</p>
                            <p>
                                <span>Genres : </span>
                                @foreach ($album->genres as $genre)
                                    {{ $genre->name }}
                                @endforeach
                            </p>
                            <p><span>Prix : </span>{{ $album->price }}€</p>
                            <p><span>Reste : </span>{{ $album->count }}</p>
                        </div>
                        <div class="cover-container">
                            @if ($album->cover)
                                <p>{{ $album->cover }}</p>
                            @endif
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <div class="modal hidden">
        <div class="modal-container"></div>
    </div>
@endsection