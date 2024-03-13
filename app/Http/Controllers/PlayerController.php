<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;


class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $players = Player::all();
        // dd($players);
        // serve para debugar minha variavel (qualquer coisa)
        return view("welcome", compact("players"));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // return view("welcome");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
        ]);



        $player = Player::create($validatedData);

        return redirect('/')->with('msg', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(player $player)
    {

       return response()->json($player);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $player = Player::findOrFail($id);
        return view('welcome', ['player'=> $player]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $player = Player::find($id);
        $player->update($request->all());
        return redirect('/')->with('msg', 'Jogador atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(player $player)
    {
        $player->delete();
        return redirect('/')->with('msg','Usuario excluido');
    }
}
