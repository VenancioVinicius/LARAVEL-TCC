<?php

namespace App\Http\Controllers;
use App\Models\GeradorResiduo;
use App\Models\Status;
use Illuminate\Http\Request;

class GeradorResiduoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!PermisssionController::isAuthorized('geradorResiduos.index')) {
            abort(403);
        }

        $dados = GeradorResiduo::all();
        $permissions = session('user_permissions');

        return view('geradorResiduos.index', compact('dados', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!PermisssionController::isAuthorized('geradorResiduos.create')) {
            abort(403);
        }
        $dados_Sts = Status::where('id', '>=', 4)->get();

        return view('geradorResiduos.create', compact('dados_Sts'));
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
            'nome' => 'required|max:50|min:4',
            'cep' => 'required|max:50|min:4',
            'telefone' => 'required|max:11|min:9',
            'status_id' => 'required',
        ];

        $msgs = [
            "required" => "O preenchimento do campo [:attribute] é obrigatório!",
            "max" => "O campo [:attribute] possui tamanho máximo de [:max] caracteres!",
            "min" => "O campo [:attribute] possui tamanho mínimo de [:min] caracteres!",
            "unique" => "Já existe um endereço cadastrado com esse [:attribute]!"
        ];

        $request->validate($regras, $msgs);

        $obj_status = Status::find($request->status_id);

        if(isset($obj_status)){   
            $obj_geradorResiduo = new GeradorResiduo();
            $obj_geradorResiduo -> nome = $request -> nome;
            $obj_geradorResiduo -> cep = $request -> cep;
            $obj_geradorResiduo -> telefone = $request -> telefone;
            $obj_geradorResiduo -> status()->associate($obj_status);
            $obj_geradorResiduo->save();
            return redirect()->route('geradorResiduos.index');
        }

        return redirect()->route('geradorResiduos.index');
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
        if(!PermisssionController::isAuthorized('geradorResiduos.edit')) {
            abort(403);
        }

        $dados = GeradorResiduo::find($id);

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('geradorResiduos.edit', compact('dados')); 
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
        $obj = GeradorResiduo::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'cep' => $request->cep,
            'telefone' => $request->telefone,
            'status' => $request->status
        ]);

        $obj->save();

        return redirect()->route('geradorResiduos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!PermisssionController::isAuthorized('geradorResiduos.destroy')) {
            abort(403);
        }
        GeradorResiduo::destroy($id);

        return redirect()->route('geradorResiduos.index');
    }
}
