<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    protected $company;
    public function __construct(Company $company)
    {
        $this->company = $company;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$companys = $this->company->with('produtos')->get();

        $companies = $this->company->get();

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
        $request->validate($this->company->rules(), $this->company->feedback());

        $company = $this->company->create([
            'company_name' => $request->company_name,
            'company_address' => $request->company_address,
            'company_phone_number' => $request->company_phone_number,
            'company_email_address' => $request->company_email_address,
            'company_logo' => $request->company_logo,

        ]); 

        return response()->json($company, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = $this->company->with([

            // Filtrar os campos a ser retornados
            'about'

        ])->find($id);



        if ($company === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $company = $company->makeHidden(['active', 'created_at', 'updated_at']);

        return response()->json($company, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $company = $this->company->find($id);

        if ($company === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($company->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $company->feedback());
        } else {
            $request->validate($company->rules(), $company->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $company->fill($request->all());

        $company->save();

        return response()->json($company, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $company = $this->company->find($id);

        if ($company === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $company->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
