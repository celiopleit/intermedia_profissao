<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;
use App\Models\Uf;

class CidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $totreg      = Cidade::all();
        $vcidade     = Cidade::join('uf', 'cidade.uf', '=', 'uf.uf')
                      ->get();

        return view('cidade.index', compact('vcidade','totreg'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $vuf         = Uf::all();

        return view('cidade.create',compact('vuf'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'municipio'   => 'required','max:60',
            'codmunic'    => 'required','max:10',
            'codregional' => 'required','max:10',
            'uf'          => 'required','max:2',
           ]);

        Cidade::create($request->all());

        return redirect()->route('cidade.index')
                        ->with('success','Cidade gravado com suscesso.');
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
    public function edit($codmunic)
    {

        $vuf         = Uf::all();
        $vcidade = Cidade::where('codmunic',$codmunic)->first();
        //dd($vcidade);
        return view('cidade.edit',compact('vcidade','vuf'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $codmunic)
    {


        $request->validate([
            'municipio'   => 'required','max:60',
            'codmunic'    => 'required','max:10',
            'codregional' => 'required','max:10',
            'uf'          => 'required','max:2',
           ]);

        $vcidade = Cidade::where('codmunic',$codmunic)->first();
        $vcidade->update($request->all());

        return redirect()->route('cidade.index')
                        ->with('success','Cidade atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($codmunic)
    {
        $vcidade = Cidade::find($codmunic);

        try{
           $vcidade->delete();
           return redirect()->route('cidade.index')
                        ->with('success','Excluido com sucesso');
        }catch(\Exception  $exception){
            $err = 'x';
            return redirect()->back()->with('no_delete', 'Atençao: Esse registro está relacionado e não pode ser deletado');

        }

    }
}
