<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class AboutUsController extends Controller
{
    protected $about;
    public function __construct(AboutUs $about)
    {
        $this->about = $about;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$abouts = $this->about->with('produtos')->get();

        $companies = $this->about->get();

        // Remover campos indesejados do elemento principal
        $companies = $companies->makeHidden(['ativo', 'created_at', 'updated_at']);
        return response()->json($companies, 200);
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
        $request->validate($this->about->rules(), $this->about->feedback());

        $about = $this->about->create([
            'company_id' => $request->company_id,
            'about_us' => $request->about_us,
            'mission' => $request->mission,
            'vision' => $request->vision,
            'values' => $request->values,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'twitter' => $request->twitter,
            'gmail' => $request->gmail,

        ]); 

        return response()->json($about, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $about = $this->about->with([

            // Filtrar os campos a ser retornados
            'company'

        ])->find($id);



        if ($about === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $about = $about->makeHidden(['active', 'created_at', 'updated_at']);

        return response()->json($about, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function edit(AboutUs $aboutUs)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $about = $this->about->find($id);

        if ($about === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($about->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $about->feedback());
        } else {
            $request->validate($about->rules(), $about->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $about->fill($request->all());

        $about->save();

        return response()->json($about, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AboutUs  $aboutUs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $about = $this->about->find($id);

        if ($about === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $about->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
