<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsuarioTest extends TestCase
{
    use RefreshDatabase;

  
    public function criar_usuario_com_dados_validos(){
        $response = $this->post('/users', [
            'nome' => 'João Teste',
            'email' => 'joao@example.com',
            'cep' => '13050000',
        ]);

        $response->assertRedirect('/users');
        $this->assertDatabaseHas('usuarios', [
            'email' => 'joao@example.com',
        ]);
    }
    

    public function validar_campos_obrigatorios()
    {
        $response = $this->post('/users', []);

        $response->assertSessionHasErrors(['nome', 'email', 'cep']);
    }
}
