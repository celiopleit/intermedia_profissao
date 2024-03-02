<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ComoFala;

class ComoFalaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comofala_all = ComoFala::all();
        return view('comofala.index', compact('comofala_all'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('comofala.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required','max:60'],
        ]);

        ComoFala::create($request->all());

        return redirect()->route('comofala.index')
                        ->with('success','Habilidades gravado com suscesso.');
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

        $vcomofala = ComoFala::find($id);
        return view('comofala.edit',compact('vcomofala'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => ['required','max:15'],

        ]);
        $vcomofala = ComoFala::find($id);

        $vcomofala->update($request->all());

        return redirect()->route('comofala.index')
                        ->with('success','Habilidades atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vcomofala = ComoFala::find($id);

        try{
           $vcomofala->delete();
           return redirect()->route('comofala.index')
                        ->with('success','Excluido com sucesso');
        }catch(\Exception  $exception){
            $err = 'x';
            return redirect()->back()->with('no_delete', 'Atençao: Esse registro está relacionado e não pode ser deletado');

        }

    }
}
