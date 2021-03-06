<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;
use App\Http\Requests\AddExploracaoRequest;
use App\Services\ExploracaoService;
use Redirect;
use Session;
use Auth;

class ExploracaoController extends Controller
{
    protected $eaService;
    protected $idExp;

    public function __construct(ExploracaoService $eaService, Request $request)
    {

        $this->middleware('auth');
        $this->eaService = $eaService;
        $this->idExp = $request->session()->get('exploracaoSelecionada');
        Session::forget('filterPesquisa');
        

    }

    public function adicionar(){ 
        return view("exploracoes.adicionarExploracao");
    }

    public function detalhesExploracao(){
        $exploracao = $this->eaService->procurarExploracao($this->idExp);
        /**@todo devolve $exploracao dentro de um objeto 
        */
        return view('exploracoes.detalhesExploracao', compact('exploracao'));        
    }

    public function adicionarExploracao(AddExploracaoRequest $request){ 
        $input = Input::except('_token');
        $this->eaService->adicionarExploracao($input);
        
        return Redirect::to("/admin/exploracoes/listar")->with('message', 'Exploração guardada com sucesso!');

    }

    public function listarExploracao(){ 
        $lista = $this->eaService->listarExploracao();
        return view('exploracoes.listagemExploracoes', compact('lista'));
    }
    
    public function editarExploracao(){ 
        $exploracao = $this->eaService->procurarExploracao($this->idExp);
        return view('exploracoes.editarExploracao', compact('exploracao'));
    }

    public function saveEditExploracao(){ 
        $input = Input::except('_token');        
        $exploracao = $this->eaService->saveEditExploracao($this->idExp, $input);
        if($exploracao){
            return Redirect::to("/admin/exploracao")->with('message', 'Exploração guardada com sucesso!');
        }else{
            return Redirect::to("/admin/exploracao/editar")->with('message', 'Já existe um Terreno com esse nome');
        }
    }
    
}
