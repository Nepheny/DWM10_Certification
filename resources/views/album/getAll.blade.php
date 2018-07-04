@extends('layouts.app')
@section('content')
    <h1>Liste des albums</h1>
    <div class="albums-container">
        <ul>
            @foreach ($albums as $album)
                <li>
                    <h2>{{ $album->title }}</h2>
                    <div class="album-container">
                        <div>
                            <p><span>Sortie : </span>{{ $album->release }}</p>
                            <p><span>Auteur : </span>{{ $album->author->name }}</p>
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
@endsection