<!DOCTYPE html>
<html>
<head>
    <title>Detalhes do Usuário</title>
</head>
<body>
    <header>
         @include('menue')
    </header>
    <div class="text-center">
        <h3>Detalhes do Usuário</h3>

        <p><strong>Nome:</strong> {{ $usuario->nome }}</p>
        <p><strong>Email:</strong> {{ $usuario->email }}</p>
        <p><strong>CEP:</strong> {{ $usuario->endereco->cep }}</p>
        <p><strong>Logradouro:</strong> {{ $usuario->endereco->logradouro }}</p>
        <p><strong>Bairro:</strong> {{ $usuario->endereco->bairro }}</p>
        <p><strong>Cidade:</strong> {{ $usuario->endereco->cidade }}</p>
        <p><strong>Estado:</strong> {{ $usuario->endereco->estado }}</p>
    </div>
</body>

    <div>
        @include('footer')
    </div>
</html>
