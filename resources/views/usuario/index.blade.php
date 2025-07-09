<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <h1>Usuários Cadastrados</h1>

    <a href="{{ route('users.create') }}">Cadastrar novo</a>

    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th>CEP</th>
                <th>Endereço</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->endereco->cep ?? '-' }}</td>
                    <td>
                        {{ $usuario->endereco->logradouro ?? '' }},
                        {{ $usuario->endereco->bairro ?? '' }},
                        {{ $usuario->endereco->cidade ?? '' }} - {{ $usuario->address->estado ?? '' }}
                    </td>
                    <td><a href="{{ route('users.show', $usuario->id) }}"> <i class="fa-solid fa-pen-to-square"></i> </a></td>

                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $usuarios->links() }}
</body>
</html>
