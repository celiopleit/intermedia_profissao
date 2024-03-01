<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profissao;

class ProfissaoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $profissao_all = Profissao::all();
        return view('profissao.index', compact('profissao_all'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('profissao.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => ['required','max:60'],
        ]);

        Profissao::create($request->all());

        return redirect()->route('profissao.index')
                        ->with('success','Profissão gravado com suscesso.');
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

        $vprofissao = Profissao::find($id);
        return view('profissao.edit',compact('vprofissao'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'descricao' => ['required','max:15'],

        ]);
        $vprofissao = Profissao::find($id);

        $vprofissao->update($request->all());

        return redirect()->route('profissao.index')
                        ->with('success','Profissao atualizado com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $vprofissao = Profissao::find($id);

        try{
           $vprofissao->delete();
           return redirect()->route('profissao.index')
                        ->with('success','Excluido com sucesso');
        }catch(\Exception  $exception){
            $err = 'x';
            return redirect()->back()->with('no_delete', 'Atençao: Esse registro está relacionado e não pode ser deletado');

        }

    }
}
