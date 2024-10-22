<?php

namespace App\Http\Controllers;
use App\Models\ColetaResiduo;
use App\Models\GeradorResiduo;

use Illuminate\Http\Request;

class ColetaResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!PermisssionController::isAuthorized('coletaResiduos.index')){
            abort(403);
        }

        $dados = ColetaResiduo::all();
        $permissions = session('user_permissions');

        return view('coletaResiduos.index', compact('dados', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dados_GerRes = GeradorResiduo::where('status', '=', 0)->get();
        return view('coletaResiduos.create', compact('dados_GerRes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $regras = [
            'geradorResiduo_id' => 'required',
            'residuo' => 'required|max:50|min:1',
            'peso' => 'required|max:30|min:1',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj_geradorResiduo = GeradorResiduo::find($request->geradorResiduo_id);

        if(isset($obj_geradorResiduo)){   
            $obj_coletaResiduo = new ColetaResiduo();
            $obj_coletaResiduo -> geradorResiduo()->associate($obj_geradorResiduo);
            $obj_coletaResiduo -> residuo = $request -> residuo;
            $obj_coletaResiduo -> peso = $request -> peso;
            $obj_coletaResiduo->save();
            return redirect()->route('coletaResiduos.create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!PermisssionController::isAuthorized('coletaResiduos.edit')){
            abort(403);
        }

        $dados = ColetaResiduo::find($id);
        $dados_GerRes = GeradorResiduo::where('status', '=', 0)->get();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('coletaResiduos.edit', compact('dados', 'dados_GerRes')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $obj = ColetaResiduo::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $regras = [
            'gerador_residuo_id' => 'required',
            'residuo' => 'required|max:50|min:1',
            'peso' => 'required|max:30|min:1',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj->fill([
            'gerador_residuo_id' => $request->gerador_residuo_id,
            'residuo' => $request->residuo,
            'peso' => $request->peso,
        ]);

        $obj->save();

        return redirect()->route('coletaResiduos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ColetaResiduo::destroy($id);

        return redirect()->route('coletaResiduos.index');
    }
}
