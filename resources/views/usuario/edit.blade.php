<!DOCTYPE html>
<html>
<head>
    <title>Editar de Usuário</title>
</head>
<body>
    <header>
         @include('menue')
    </header>
    <div class="form_control m-4" width="400" >
    <h3 class="mb-4 text-center">Editar Usuário</h3>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $erro)
                    <li>{{ $erro }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('users.update', $usuario->id) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ old('nome', $usuario->nome) }}" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ old('email', $usuario->email) }}" required>
        </div>

        <div class="mb-3">
            <label>CEP</label>
            <input type="text" name="cep" class="form-control" value="{{ old('cep', $usuario->endereco->cep) }}" required>
        </div>
        <div class="text-center">

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('users.lista') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </form>
    </div>
</body>
<div>
    @include('footer')
</div>
</html>