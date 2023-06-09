<?php

namespace App\Http\Controllers;

use App\Models\Equipo;
use App\Models\Liga;
use Illuminate\Http\Request;

/**
 * Class EquipoController
 * @package App\Http\Controllers
 */
class EquipoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipos = Equipo::paginate();

        return view('equipo.index', compact('equipos'))
            ->with('i', (request()->input('page', 1) - 1) * $equipos->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $equipo = new Equipo();

        //$image->storeAs('foto', $imageName);

        $liga = Liga::pluck('nombre', 'id');
        return view('equipo.create', compact('equipo', 'liga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Equipo::$rules);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $destination_path = 'public/uploads';
            $imagen = $request->file('foto');
            $img_name = $imagen->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination_path, $img_name);
            $data['foto'] = $img_name;
        }

        $equipo = Equipo::create($data);

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $equipo = Equipo::find($id);

        return view('equipo.show', compact('equipo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $equipo = Equipo::findOrFail($id);

        $liga = Liga::pluck('nombre', 'id');    
        return view('equipo.edit', compact('equipo', 'liga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Equipo $equipo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Equipo $equipo)
    {
        
        request()->validate(Equipo::$rulesEdit);
        $data = $request->all();
        if ($request->hasFile('foto')) {
            $destination_path = 'public/uploads';
            $imagen = $request->file('foto');
            $img_name = $imagen->getClientOriginalName();
            $path = $request->file('foto')->storeAs($destination_path, $img_name);
            $data['foto'] = $img_name;
        }

            $equipo->update($data);

       

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $equipo = Equipo::find($id)->delete();

        return redirect()->route('equipos.index')
            ->with('success', 'Equipo deleted successfully');
    }
}
