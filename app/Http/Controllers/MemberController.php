<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    protected $member;
    public function __construct(Member $member)
    {
        $this->member = $member;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$members = $this->member->with('produtos')->get();

        $members = $this->member->get();

        // Remover campos indesejados do elemento principal
        $members = $members->makeHidden(['active', 'created_at', 'updated_at']);
        return response()->json($members, 200);
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
        $request->validate($this->member->rules(), $this->member->feedback());

        $member = $this->member->create([
            'name' => $request->name,
            'office' => $request->office,
            'photograph' => $request->photograph,
            'instagram' => $request->instagram,
            'facebook' => $request->facebook,

        ]); 

        return response()->json($member, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $member = $this->member->with([

            // Filtrar os campos a ser retornados
            //'company'

        ])->find($id);



        if ($member === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $member = $member->makeHidden(['ativo', 'created_at', 'updated_at']);

        return response()->json($member, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $member = $this->member->find($id);

        if ($member === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($member->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $member->feedback());
        } else {
            $request->validate($member->rules(), $member->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $member->fill($request->all());

        $member->save();

        return response()->json($member, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Member  $member
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $member = $this->member->find($id);

        if ($member === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $member->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
