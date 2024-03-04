<?php

namespace App\Http\Controllers;

use App\Models\HomePage;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    protected $home_page;
    public function __construct(HomePage $home_page)
    {
        $this->home_page = $home_page;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$home_pages = $this->home_page->with('produtos')->get();

        $home_pages = $this->home_page->get();

        // Remover campos indesejados do elemento principal
        $home_pages = $home_pages->makeHidden(['active', 'created_at', 'updated_at']);
        return response()->json($home_pages, 200);
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
        $request->validate($this->home_page->rules(), $this->home_page->feedback());

        $home_page = $this->home_page->create([
            'title' => $request->title,
            'caption' => $request->caption,
            'description' => $request->description,
            'content' => $request->content,
            'banner' => $request->banner,
            'video' => $request->video,
            'active' => $request->active,

        ]); 

        return response()->json($home_page, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $home_page = $this->home_page->with([

            // Filtrar os campos a ser retornados
            //'company'

        ])->find($id);



        if ($home_page === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $home_page = $home_page->makeHidden(['ativo', 'created_at', 'updated_at']);

        return response()->json($home_page, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function edit(HomePage $homePage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $home_page = $this->home_page->find($id);

        if ($home_page === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($home_page->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $home_page->feedback());
        } else {
            $request->validate($home_page->rules(), $home_page->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $home_page->fill($request->all());

        $home_page->save();

        return response()->json($home_page, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HomePage  $homePage
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $home_page = $this->home_page->find($id);

        if ($home_page === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $home_page->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
