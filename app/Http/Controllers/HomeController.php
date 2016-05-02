<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Services\HomeService;
use App\Services\EstufaService;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use Cookie;
use Illuminate\Cookie\CookieJar;
use Redirect;
use Session;
use Auth;

use App\User;

class HomeController extends Controller
{
	protected $hService;
	protected $uService;
	protected $eService;

	public function __construct(HomeService $hService, UserService $uService, EstufaService $eService)
	{
		$this->middleware('auth');
		$this->hService = $hService;
		$this->uService = $uService;
		$this->eService = $eService;
	}

	public function inicio(Request $request){
		$id = Input::except('_token');
		$request->session()->put('exploracaoSelecionada', $id);
		return Redirect::to('admin/home');
	}

	public function home(){
		$estufas = $this->eService->getEstufas();
	
		return view("home" ,compact('estufas'));
	}

	 public function showCookie(Request $request) {
	 	$val = $request->cookie('exploracao');
	 	dd($val);
	 	$key = array_search('id', $val);
	 	dd($key);
        return $key;
    } 

	public function showPerfil() {
		return view('perfil.perfil');
	}

	public function editPerfil() {
		return view('perfil.perfilEditar');
	}


	public function mudarExploracao(Request $request){
		$request->session()->forget('exploracaoSelecionada');
		 return Redirect::to('admin/exploracoes/listar');
	}
	
    public function saveEditPerfil() {

        $user = User::find(Auth::getUser()->id);

        $input = Input::except('_token');
        $errors = array();

        
        if($input['password'] == $input['password_confirmation']){
            if(count($errors) > 0){
                Session::flash('errors', $errors);
                return Redirect::to('/admin/perfil/editar');
            }
            $user->save();
            return Redirect::to('/admin/perfil');
        }
        return redirect('/admin/perfil/editar');
    }





	public function logout() {
		Auth::logout();
		return Redirect::to('/');
	}
}
