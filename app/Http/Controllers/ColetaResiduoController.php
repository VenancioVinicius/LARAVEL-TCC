<?php

namespace App\Http\Controllers;
use App\Models\ColetaResiduo;
use App\Models\GeradorResiduo;
use App\Models\Residuo;
use App\Models\Status;

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

        $dados = ColetaResiduo::where('status_id', '=', 1)->get();
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
        $dados_GerRes = GeradorResiduo::where('status_id', '=', 4)->get();
        $dados_Res = Residuo::all();
        $dados_Sts = Status::where('id', '=', 1)->get();

        return view('coletaResiduos.create', compact('dados_GerRes', 'dados_Res', 'dados_Sts'));
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
            'residuo_id' => 'required',
            'peso' => 'required|max:30|min:1',
            'status_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj_geradorResiduo = GeradorResiduo::find($request->geradorResiduo_id);
        $obj_residuo = Residuo::find($request->residuo_id);
        $obj_status = Status::find($request->status_id);

        if(isset($obj_geradorResiduo,$obj_residuo, $obj_status)){   
            $obj_coletaResiduo = new ColetaResiduo();
            $obj_coletaResiduo -> geradorResiduo()->associate($obj_geradorResiduo);
            $obj_coletaResiduo -> residuo()->associate($obj_residuo);
            $obj_coletaResiduo -> peso = $request -> peso;
            $obj_coletaResiduo -> status()->associate($obj_status);
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
        $dados_Res = Residuo::all();
        $dados_Sts = Status::where('id', '=', 1)->get();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('coletaResiduos.edit', compact('dados', 'dados_GerRes', 'dados_Res', 'dados_Sts')); 
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
            'residuo_id' => 'required|max:50|min:1',
            'peso' => 'required|max:30|min:1',
            'status_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
        ];

        $request->validate($regras, $msgs);

        $obj->fill([
            'gerador_residuo_id' => $request->gerador_residuo_id,
            'residuo_id' => $request->residuo_id,
            'peso' => $request->peso,
            'status_id' => $request->status_id,
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
