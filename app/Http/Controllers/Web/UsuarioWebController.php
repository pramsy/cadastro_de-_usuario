<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Endereco;
use Illuminate\Support\Facades\Http;

class UsuarioWebController extends Controller{

    public function inicio(){
        return view('index');
    }
    public function create()
    {
        return view('usuario.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nome'  => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'cep'   => 'required|digits:8',
        ]);

        $cep = $request->input('cep');
        $response = Http::get("https://viacep.com.br/ws/$cep/json/");

        if ($response->failed() || isset($response['erro'])) {
            return back()->withErrors(['cep' => 'CEP inválido'])->withInput();
        }

        $cepData = $response->json();

        $usuario = Usuario::create([
            'nome'  => $request->nome,
            'email' => $request->email,
        ]);

        $usuario->endereco()->create([
            'cep'        => $cep,
            'logradouro' => $cepData['logradouro'] ?? '',
            'bairro'     => $cepData['bairro'] ?? '',
            'cidade'     => $cepData['localidade'] ?? '',
            'estado'     => $cepData['uf'] ?? '',
        ]);

        return redirect()->route('users.index');
    }

    public function index(){
        
        $usuarios = Usuario::with('endereco')->paginate(5); // 5 usuários por página

        return view('usuario.index', compact('usuarios'));
    }
    public function show($id){
        $usuario = Usuario::with('endereco')->findOrFail($id);
        return response()->json($usuario);
    }

}
