<?php

namespace App\Http\Controllers;

use App\Models\Jogo;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class JogoController extends Controller
{


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::find(Auth::user()->id)
        ->myJogos()
        ->create([
            'titulo' => $request->titulo,
            'ano_lancamento' => $request->ano_lancamento,
            'desenvolvedora' => $request->desenvolvedora,
            'plataforma' => $request->plataforma,
            'genero' => $request->genero,
        ]);

        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function show(Jogo $jogo)
    {
        //
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jogo $jogo)
    {
        $jogo->titulo = $request->titulo;
        $jogo->ano_lancamento = $request->ano_lancamento;
        $jogo->desenvolvedora = $request->desenvolvedora;
        $jogo->plataforma = $request->plataforma;
        $jogo->genero = $request->genero;
        $jogo->save();

        return redirect(route('dashboard'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jogo  $jogo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jogo $jogo)
    {
        $jogo->delete();
        return redirect('dashboard');
    }
}
