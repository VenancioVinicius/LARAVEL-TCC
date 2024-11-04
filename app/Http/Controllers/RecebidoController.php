<?php

namespace App\Http\Controllers;

use App\Models\Catador;
use App\Models\Recebido;
use App\Models\ColetaResiduo;
use App\Models\GeradorResiduo;
use App\Models\Status;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class RecebidoController extends Controller
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

        $dados = ColetaResiduo::where('status_id', '=', 2)->get();
        $permissions = session('user_permissions');

        return view('recebidos.index', compact('dados', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!PermisssionController::isAuthorized('recebidos.create')){
            abort(403);
        }

        $dados_ColRes = ColetaResiduo::where('status_id', '=', 1)->get();
        $dados_GerRes = GeradorResiduo::where('status', '=', 0)->get();
        $dados_Cat = Catador::where('status', '=', 0)->get();
        $dados_Sts = Status::where('id', '=', 2)->get();

        return view('recebidos.create', compact('dados_ColRes','dados_GerRes', 'dados_Cat', 'dados_Sts')); 
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
            'id' => 'required',

        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
        ];

        $request->validate($regras, $msgs);

        $obj_coletaResiduo = ColetaResiduo::find($request->id);

        return redirect()->route('recebidos.edit', $obj_coletaResiduo);
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
        if(!PermisssionController::isAuthorized('recebidos.edit')){
            abort(403);
        }

        $dados = ColetaResiduo::find($id);
        $dados_Cat = Catador::where('status', '=', 0)->get();
        if ($dados['catador_id'] == null) {
            $dados_Sts = Status::where('id', '=', 2)->get();
        }else {
            $dados_Sts = Status::all();
        }
        
        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('recebidos.edit', compact('dados', 'dados_Cat', 'dados_Sts')); 
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
            'catador_id' => 'required',
            'status_id' => 'required',
        ];

        $request->validate($regras);

        $obj->fill([
            'catador_id' => $request->catador_id,
            'status_id' => $request->status_id,
        ]);

        $obj->save();

        return redirect()->route('recebidos.index');
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

        return redirect()->route('recebidos.index');
    }
}
