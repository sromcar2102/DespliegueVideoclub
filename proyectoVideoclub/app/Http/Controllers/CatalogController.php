<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class CatalogController extends Controller
{

    public function getIndex()
    {
        return view('catalog/index', ["movies" => Movie::all()]);
    }

    public function getShow($id)
    {
        return view('catalog/show', ["movie" => Movie::find($id)]);
    }

    public function getCreate()
    {
        return view('catalog/create');
    }

    public function postCreate(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|regex:/^[0-9]{4}$/',
            'director' => 'required|max:64',
            'poster' => 'required',
            'synopsis' => 'required',
        ]);

        $movie = new Movie();

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');

        $movie->save();

        return redirect(url('/catalog'))->with('feedback', "Película creada correctamente");
    }

    public function getEdit($id)

    {
        return view('catalog/edit', ["movie" => Movie::find($id)]);
    }

    public function putEdit(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'year' => 'required|regex:/^[0-9]{4}$/',
            'director' => 'required|max:64',
            'poster' => 'required',
            'synopsis' => 'required',
        ]);

        $movie = Movie::find($id);

        $movie->title = $request->input('title');
        $movie->year = $request->input('year');
        $movie->director = $request->input('director');
        $movie->poster = $request->input('poster');
        $movie->synopsis = $request->input('synopsis');

        $movie->save();

        return redirect(url('/catalog'))->with('feedback', "Película modificada correctamente");
    }

    public function putRent($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->rented = !$movie->rented;
        $movie->save();
        return redirect(url('/catalog/show/' . $movie-> id ));
    }

    public function getDelete($id)
    {
        return view('catalog/delete', ["movie" => Movie::find($id)]);
    }

    public function delete($id)
    {
        $movie = Movie::find($id);
        $movie->delete($id);
        return redirect(url('/catalog'))->with('feedback', "Película eliminada correctamente");
    }

}
