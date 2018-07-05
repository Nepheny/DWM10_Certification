<?php

namespace App\Http\Controllers;

use \Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Album as Album;
use App\Author as Author;
use App\Genre as Genre;
use Validator;

class AlbumController extends Controller
{
    // READ
    public function getAll()
    {
        $albums = Album::all()->load('author', 'genres');
        return view('album.getAll', ['albums' => $albums]);
    }

    public function getOne(Request $request, $id)
    {
        $album = Album::find($id)->load('author', 'genres');
        return $album;
    }

    // CREATE
    public function insertOneForm()
    {
        $authors = Author::all();
        $genres = Genre::all();
        return view('album.insertOne', ['authors' => $authors, 'genres' => $genres]);
    }

    public function insertOneAction(Request $request)
    {
        $rules = array(
            'title'     => 'required|string',
            'price'     => 'required|integer',
            'count'     => 'required|integer'
        );
        $validator = Validator::make($request->input(), $rules);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        $album = new Album();
        if($request->file('cover')) {
            $path = $request->file('cover')->storeAs('img', $request->file('cover')->getClientOriginalName());
            $album->cover = $path;
        }
        $album->title = $request->input('title');
        $album->release = $request->input('release');
        $album->author_id = $request->input('author');
        $album->price = $request->input('price');
        $album->count = $request->input('count');
        $album->save();
        if($request->input('genres')) {
            foreach($request->input('genres') as $genre) {
                $album->genres()->attach($genre);
            }
        }
        return redirect('/albums');
    }

    // UPDATE
    public function UpdateOneForm(Request $request)
    {
        $album = Album::find($request->input('id'))->load('author', 'genres');
        $authors = Author::all();
        $genres = Genre::all();
        return view('album.updateOne', ['album' => $album, 'authors' => $authors, 'genres' => $genres]);
    }

    public function UpdateOneAction(Request $request)
    {
        $rules = array(
            'title'     => 'required|string',
            'cover'     => 'image',
            'price'     => 'required|integer',
            'count'     => 'required|integer'
        );
        $validator = Validator::make($request->input(), $rules);
        if($validator->fails()) {
            $messages = $validator->messages();
            return Redirect::back()->withErrors($validator);
        }

        if($request->input('cover')) {
            $path = $request->file('img')->storeAs('public/img', $request->file('img')->getClientOriginalName());
            $album->cover = $path;
        }
        $album = Album::find($request->input('id'));
        $album->title = $request->input('title');
        $album->release = $request->input('release');
        $album->author_id = $request->input('author');
        $album->price = $request->input('price');
        $album->count = $request->input('count');
        $album->save();
        if($request->input('genres')) {
            $album->genres()->detach();
            foreach($request->input('genres') as $genre) {
                $album->genres()->attach($genre);
            }
        }
        return redirect('/albums');
    }

    // DELETE
    public function buyOne(Request $request)
    {
        $album = Album::find($request->input('id'));
        if($album->count > 1) {
            $album->count = ($album->count - 1);
            $album->save();
        } else {
            Album::destroy($request->input('id'));
        }
        return redirect('/albums');
    }

    public function deleteOne(Request $request)
    {
        Album::destroy($request->input('id'));
        return redirect('/albums');
    }
}
