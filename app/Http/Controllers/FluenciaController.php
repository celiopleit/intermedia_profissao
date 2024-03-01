<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fluencia;

class FluenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fluencia_all = Fluencia::all();
        return view('fluencia.index', compact('fluencia_all'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('fluencia.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required','max:15'],
        ]);

        Fluencia::create($request->all());

        return redirect()->route('fluencia.index')
                        ->with('success','Fluencia gravado com suscesso.');
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
    public function edit($id)
    {

        $vfluencia = Fluencia::find($id);
        return view('fluencia.edit',compact('vfluencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => ['required','max:15'],

        ]);
        $vfluencia = Fluencia::find($id);

        $vfluencia->update($request->all());

        return redirect()->route('fluencia.index')
                        ->with('success','Fluencia atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vfluecia = Fluencia::find($id);

        try{
           $vfluecia->delete();
           return redirect()->route('fluencia.index')
                        ->with('success','Excluido com sucesso');
        }catch(\Exception  $exception){
            $err = 'x';
            return redirect()->back()->with('no_delete', 'Atençao: Esse registro está relacionado e não pode ser deletado');

        }

    }
}
