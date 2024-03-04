<?php

namespace App\Http\Controllers;

use App\Models\Subscribed;
use Illuminate\Http\Request;

class SubscribedController extends Controller
{
    protected $subscribed;
    public function __construct(Subscribed $subscribed)
    {
        $this->subscribed = $subscribed;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$subscribeds = $this->subscribed->with('produtos')->get();

        $subscribeds = $this->subscribed->get();

        // Remover campos indesejados do elemento principal
        $subscribeds = $subscribeds->makeHidden(['active', 'created_at', 'updated_at']);
        return response()->json($subscribeds, 200);
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
        $request->validate($this->subscribed->rules(), $this->subscribed->feedback());

        $subscribed = $this->subscribed->create([
            'name' => $request->name,
            'email' => $request->email,
            'ativo' => $request->ativo,

        ]); 

        return response()->json($subscribed, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscribed  $subscribed
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subscribed = $this->subscribed->with([

            // Filtrar os campos a ser retornados
            //'company'

        ])->find($id);



        if ($subscribed === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $subscribed = $subscribed->makeHidden(['ativo', 'created_at', 'updated_at']);

        return response()->json($subscribed, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscribed  $subscribed
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscribed $subscribed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscribed  $subscribed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $subscribed = $this->subscribed->find($id);

        if ($subscribed === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($subscribed->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $subscribed->feedback());
        } else {
            $request->validate($subscribed->rules(), $subscribed->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $subscribed->fill($request->all());

        $subscribed->save();

        return response()->json($subscribed, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscribed  $subscribed
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $subscribed = $this->subscribed->find($id);

        if ($subscribed === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $subscribed->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
