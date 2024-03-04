<?php

namespace App\Http\Controllers;

use App\Models\Update;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    protected $update;
    public function __construct(Update $update)
    {
        $this->update = $update;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$updates = $this->update->with('produtos')->get();

        $updates = $this->update->get();

        // Remover campos indesejados do elemento principal
        $updates = $updates->makeHidden(['active', 'created_at', 'updated_at']);
        return response()->json($updates, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate($this->update->rules(), $this->update->feedback());

        $update = $this->update->create([
            'title' => $request->title,
            'caption' => $request->caption,
            'description' => $request->description,
            'content' => $request->content,
            'banner' => $request->banner,
            'video' => $request->video,
            'active' => $request->active,

        ]); 

        return response()->json($update, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $update = $this->update->with([

            // Filtrar os campos a ser retornados
            //'company'

        ])->find($id);



        if ($update === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $update = $update->makeHidden(['ativo', 'created_at', 'updated_at']);

        return response()->json($update, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function edit(Update $update)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $update = $this->update->find($id);

        if ($update === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($update->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $update->feedback());
        } else {
            $request->validate($update->rules(), $update->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $update->fill($request->all());

        $update->save();

        return response()->json($update, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Update  $update
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $update = $this->update->find($id);

        if ($update === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $update->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
