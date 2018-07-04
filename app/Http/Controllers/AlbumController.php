<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album as Album;
use App\Author as Author;
use App\Genre as Genre;

class AlbumController extends Controller
{
    // READ
    public function getAll()
    {
        $albums = Album::all()->load('author', 'genres');
        return view('album.getAll', ['albums' => $albums]);
    }
}
