<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;

class StagiaireController extends Controller
{
    function __construct()
    {
        $this->middleware("auth"); // appliquer le middleware sur tout le fichier
        $this->middleware('can:create-stagiaires', ['only' => ['create','store']]); // appliquer le middleware seulement sur les méthodes create et store
        $this->middleware(function ($request, $next) {
            return $next($request);
        }); // définir le middleware au sein du constructeur, il est applicable sur tout le fichier
            
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stagiaires = [
            ['nom' => 'Dupont', 'prenom' => 'Jean', 'email' => 'jean@email.com', 'classe' => 'devofs202'],
            ['nom' => 'Davidson', 'prenom' => 'Pierre', 'email' => 'pierre@email.com', 'classe' => 'devofs204'],
            ['nom' => 'Davi', 'prenom' => 'Michelle', 'email' => 'michelle@email.com', 'classe' => 'devofs204'],
        ];

        return view('stagiaires.index', ['stagiaires' => $stagiaires]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('stagiaires.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        // dd($request);
        // $r=$request->validate([
        //     'nom'=>"max:2"
        // ]);

        return 'Hello';
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
