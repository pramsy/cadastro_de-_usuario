<!DOCTYPE html>
<html>
<head>
    <title>Lista de Usuários</title>
</head>
<body>
    <header>
         @include('menue')
    </header>
    <h3 class="text-center" >Usuários Cadastrados</h3>

    <table border="1" cellpadding="5" class="table table-responsive">
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
                    <td>
                        <a href="{{ route('users.read', $usuario->id) }}" class="btn btn-sm btn-info"> <i class="fa-solid fa-eye p-2"></i> </a>
                        <a href="{{ route('users.edit', $usuario->id) }}" class="btn btn-sm btn-warning"> <i class="fa-solid fa-user-pen p-2"></i> </a>
                        
                        <form action="{{ route('users.destroy', $usuario->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Tem certeza que deseja excluir este usuário?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger"> <i class="fa-solid fa-trash p-2"> </i> </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="d-flex justify-content-center p-3">        
        {{ $usuarios->links() }}
    </div>
</body>
    <div >
        @include('footer')
    </div>
</html>
