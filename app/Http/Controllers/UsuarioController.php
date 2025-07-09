<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller{

    public function index() {
        return User::with('endereco')->get();
    }

    public function store(StoreUserRequest $request){
        $data = $request->validated();

        // Chamar API ViaCEP
        $cepResponse = Http::get("https://viacep.com.br/ws/{$data['cep']}/json/");

        if ($cepResponse->failed() || isset($cepResponse['erro'])) {
            return response()->json(['error' => 'CEP inválido'], 422);
        }

        $cepData = $cepResponse->json();

        // Criar usuário
        $user = Usuario::create([
            'nome'  => $data['nome'],
            'email' => $data['email'],
        ]);

        // Criar endereço
        $user->address()->create([
            'cep'       => $data['cep'],
            'logradouro'=> $cepData['logradouro'] ?? '',
            'bairro'    => $cepData['bairro'] ?? '',
            'cidade'    => $cepData['localidade'] ?? '',
            'estado'    => $cepData['uf'] ?? '',
        ]);

        return response()->json($user->load('endereco'), 201);
    }

    public function show($id)
    {
        $user = User::with('endereco')->findOrFail($id);
        return response()->json($user);
    }
}
