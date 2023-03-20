<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Jugadore;
use Illuminate\Http\Request;

/**
 * Class JugadoreController
 * @package App\Http\Controllers
 */
class JugadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jugadores = Jugadore::paginate();

        return view('jugadore.index', compact('jugadores'))
            ->with('i', (request()->input('page', 1) - 1) * $jugadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jugadore = new Jugadore();

        $equipos = Equipo::pluck('nombre', 'id');

        return view('jugadore.create', compact('jugadore', 'equipos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Jugadore::$rules);

        $jugadore = Jugadore::create($request->all());

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador creado exitosamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $jugadore = Jugadore::find($id);

        return view('jugadore.show', compact('jugadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jugadore = Jugadore::find($id);

        $equipos = Equipo::pluck('nombre', 'id');
        
        return view('jugadore.edit', compact('jugadore', 'equipos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Jugadore $jugadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jugadore $jugadore)
    {
        request()->validate(Jugadore::$rules);

        $jugadore->update($request->all());

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugador actualizado exitosamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $jugadore = Jugadore::find($id)->delete();

        return redirect()->route('jugadores.index')
            ->with('success', 'Jugadore deleted successfully');
    }
}
