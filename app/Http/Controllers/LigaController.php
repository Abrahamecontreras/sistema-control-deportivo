<?php

namespace App\Http\Controllers;

use App\Models\Liga;
use Illuminate\Http\Request;

/**
 * Class LigaController
 * @package App\Http\Controllers
 */
class LigaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ligas = Liga::paginate();

        return view('liga.index', compact('ligas'))
            ->with('i', (request()->input('page', 1) - 1) * $ligas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $liga = new Liga();
        return view('liga.create', compact('liga'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Liga::$rules);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $destination_path = 'public/uploads';
            $imagen = $request->file('logo');
            $img_name = $imagen->getClientOriginalName();
            $path = $request->file('logo')->storeAs($destination_path, $img_name);
            $data['logo'] = $img_name;
        }    

        $liga = Liga::create($data);

        return redirect()->route('ligas.index')
            ->with('success', 'Liga created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $liga = Liga::find($id);

        return view('liga.show', compact('liga'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $liga = Liga::findOrFail($id);

        return view('liga.edit', compact('liga'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Liga $liga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Liga $liga)
    {
        request()->validate(Liga::$rulesEdit);
        $data = $request->all();
        if ($request->hasFile('logo')) {
            $destination_path = 'public/uploads';
            $imagen = $request->file('logo');
            $img_name = $imagen->getClientOriginalName();
            $path = $request->file('logo')->storeAs($destination_path, $img_name);
            $data['logo'] = $img_name;
        }

        $liga->update($data);

        return redirect()->route('ligas.index')
            ->with('success', 'Liga updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $liga = Liga::find($id)->delete();

        return redirect()->route('ligas.index')
            ->with('success', 'Liga deleted successfully');
    }
}
