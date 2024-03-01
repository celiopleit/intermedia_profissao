<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GrauInstrucao;

class GrauInstrucaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grauinstrucao_all = GrauInstrucao::paginate(15);
        return view('grauinstrucao.index', compact('grauinstrucao_all'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('grauinstrucao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required','max:60'],
        ]);

        GrauInstrucao::create($request->all());

        return redirect()->route('grauinstrucao.index')
                        ->with('success','Grau de Instrução gravado com suscesso.');
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

        $vgrauinstrucao = GrauInstrucao::find($id);
        return view('grauinstrucao.edit',compact('vgrauinstrucao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => ['required','max:60'],

        ]);
        $vgrauinstrucao = GrauInstrucao::find($id);

        $vgrauinstrucao->update($request->all());

        return redirect()->route('grauinstrucao.index')
                        ->with('success','Grau de Instrução atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vgrauinstrucao = GrauInstrucao::find($id);

        try{
           $vgrauinstrucao->delete();
           return redirect()->route('grauinstrucao.index')
                        ->with('success','Excluido com sucesso');
        }catch(\Exception  $exception){
            $err = 'x';
            return redirect()->back()->with('no_delete', 'Atençao: Esse registro está relacionado e não pode ser deletado');

        }

    }
}
