<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comic;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comics = Comic::all();

        $data = [
            'comics' => $comics
        ];

        return view('comics.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'title' => 'required|min:5|max:100',
                'description' => 'required',
                'thumb' => 'required|max:20',
                'price' => 'required|max:9',
                'series' => 'required|min:5|max:100',
                'sale_date' => 'required|max:10',
                'type' => 'required|min:5|max:50'
            ],
            [
                'title.required' => 'Il titolo è obbligatorio',
                'description.required' => 'La descrizione è obbligatoria',
                'thumb.required' => 'L immagine è obbligatoria',
                'price.required' => 'Il prezzo è obbligatorio',
                'series.required' => 'La serie è obbligatoria',
                'sale_date.required' => 'La data di vendita è obbligatoria',
                'type.required' => 'Il tipo è obbligatorio'
            ]
        );


        $formComics = $request->all();

        $newComic = new Comic();
        $newComic->title = $formComics['title'];
        $newComic->descrription = $formComics['description'];
        $newComic->thumb = $formComics['thumb'];
        $newComic->price = $formComics['price'];
        $newComic->series = $formComics['series'];
        $newComic->sale_date = $formComics['sale_date'];
        $newComic->type = $formComics['type'];
        $newComic->save();

        return redirect()->route('comics.show', ['comic'=>$newComic->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);

        $data = [
            'comic' => $comic
        ];

        return view('comics.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dataModified = $request->all();
        $comic = Comic::find($id);
        $comic->update($dataModified);

        return redirect()->route('comics.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comic = Comic::find($id);
        $comic->delete();

        return redirect()->route('comics.index');
    }
}
