<?php

namespace App\Http\Controllers;

use App\Models\LogRecording;
use Illuminate\Http\Request;

class LogRecordingController extends Controller
{
    protected $log;
    public function __construct(LogRecording $log)
    {
        $this->log = $log;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //$logs = $this->log->with('produtos')->get();

        $logs = $this->log->get();

        // Remover campos indesejados do elemento principal
        $logs = $logs->makeHidden(['active', 'created_at', 'updated_at']);
        return response()->json($logs, 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         //
         $request->validate($this->log->rules(), $this->log->feedback());

         $log = $this->log->create([
             'user_id' => $request->user_id,
             'table' => $request->table,
             'content_id' => $request->content_id,
             'action' => $request->action,
 
         ]); 
 
         return response()->json($log, 201);
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
        $request->validate($this->log->rules(), $this->log->feedback());

        $log = $this->log->create([
            'user_id' => $request->user_id,
            'table' => $request->table,
            'content_id' => $request->content_id,
            'action' => $request->action,

        ]); 

        return response()->json($log, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogRecording  $logRecording
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $log = $this->log->with([

            // Filtrar os campos a ser retornados
            //'company'

        ])->find($id);



        if ($log === null) {
            return response()->json(['erro' => 'Recurso pesquisado não existe'], 404);
        }

        // Remover campos indesejados do elemento principal
        $log = $log->makeHidden(['ativo', 'created_at', 'updated_at']);

        return response()->json($log, 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogRecording  $logRecording
     * @return \Illuminate\Http\Response
     */
    public function edit(LogRecording $logRecording)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogRecording  $logRecording
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $log = $this->log->find($id);

        if ($log === null) {
            return response()->json(['erro' => 'Impossível realizar a atualização. O recurso solicitado não existe'], 404);
        }

        if ($request->method() === 'PATCH') {

            $regrasDinamicas = array();

            //percorrendo todas as regras definidas no Model
            foreach ($log->rules() as $input => $regra) {

                //coletar apenas as regras aplicáveis aos parâmetros parciais da requisição PATCH
                if (array_key_exists($input, $request->all())) {
                    $regrasDinamicas[$input] = $regra;
                }
            }

            $request->validate($regrasDinamicas, $log->feedback());
        } else {
            $request->validate($log->rules(), $log->feedback());
        }

        //preenche os campos com os dados do banco e atualiza apenas os que foram modificados na requisição
        $log->fill($request->all());

        $log->save();

        return response()->json($log, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogRecording  $logRecording
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $log = $this->log->find($id);

        if ($log === null) {
            return response()->json(['erro' => 'O recurso solicitado não existe'], 404);
        }

        $log->delete();
        return response()->json(['msg' => 'A item removido com sucesso!'], 200);
    }
}
