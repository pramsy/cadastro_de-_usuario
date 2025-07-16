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

        return redirect()->route('users.lista');
    }

    public function lista( Request $request){
        
        $query = Usuario::with('endereco');

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($q) use ($search) {
                $q->where('nome', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhereHas('endereco', function ($q2) use ($search) {
                    $q2->where('cep', 'like', "%{$search}%");
                });
            });
        }

        $usuarios = $query->simplePaginate(5); 
        return view('usuario.lista', compact('usuarios'));
    }
    public function show($id){
        $usuario = Usuario::with('endereco')->findOrFail($id);
        return view('usuario.show',compact('usuario'));
    }
    public function edit($id){
        $usuario = Usuario::with('endereco')->findOrFail($id);
        return view('usuario.edit',compact('usuario'));
        
    }

    public function update(Request $request, $id){
        $usuario = Usuario::with('endereco')->findOrFail($id);

        $validated = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|email',
            'cep' => 'required|string|size:8',
        ]);

        // Consultar API ViaCEP
        $viaCepResponse = Http::get("https://viacep.com.br/ws/{$validated['cep']}/json/");

        if ($viaCepResponse->failed() || isset($viaCepResponse['erro'])) {
            return back()->withErrors(['cep' => 'CEP inválido ou não encontrado.']);
        }

        $endereco = $viaCepResponse->json();

        // Atualiza usuário
        $usuario->update([
            'nome' => $validated['nome'],
            'email' => $validated['email'],
        ]);

        // Atualiza endereço
        $usuario->endereco->update([
            'cep' => $validated['cep'],
            'logradouro' => $endereco['logradouro'] ?? '',
            'bairro' => $endereco['bairro'] ?? '',
            'cidade' => $endereco['localidade'] ?? '',
            'estado' => $endereco['uf'] ?? '',
        ]);

        return redirect()->route('users.lista')->with('success', 'Usuário atualizado com sucesso!');
    }
    public function destroy($id){

        $usuario = Usuario::findOrFail($id);
        $usuario->endereco()->delete();
        $usuario->delete();

        return redirect()->route('users.lista')->with('success', 'Usuário excluído com sucesso!');
    }

}
