<?php

namespace App\Http\Controllers;
use App\Models\Catador;
use App\Models\Status;
use Illuminate\Http\Request;

class CatadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(!PermisssionController::isAuthorized('catadors.index')){
            abort(403);
        }

        $dados = Catador::all();
        $permissions = session('user_permissions');

        return view('catadors.index', compact('dados', 'permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!PermisssionController::isAuthorized('catadors.create')){
            abort(403);
        }
        $dados_Sts = Status::where('id', '>=', 4)->get();

        return view('catadors.create', compact('dados_Sts'));
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
            $obj_catador = new Catador();
            $obj_catador -> nome = $request -> nome;
            $obj_catador -> cep = $request -> cep;
            $obj_catador -> telefone = $request -> telefone;
            $obj_catador -> status()->associate($obj_status);
            $obj_catador->save();
            return redirect()->route('catadors.index');
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
        if(!PermisssionController::isAuthorized('catadors.create')){
            abort(403);
        }

        $dados = Catador::find($id);
        $dados_Sts = Status::where('id', '>=', 4)->get();

        if(!isset($dados)) { return "<h1>ID: $id não encontrado!</h1>"; }

        return view('catadors.edit', compact('dados', 'dados_Sts')); 
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
        $obj = Catador::find($id);

        if(!isset($obj)) { return "<h1>ID: $id não encontrado!"; }

        $obj->fill([
            'nome' => mb_strtoupper($request->nome, 'UTF-8'),
            'cep' => $request->cep,
            'telefone' => $request->telefone,
            'status_id' => $request->status_id,
        ]);

        $obj->save();

        return redirect()->route('catadors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Catador::destroy($id);

        return redirect()->route('catadors.index');
    }
}
