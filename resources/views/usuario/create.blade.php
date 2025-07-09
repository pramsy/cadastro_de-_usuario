<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <h1>Cadastrar Usuário</h1>

    @if ($errors->any())
        <div>
            <ul style="color:red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <label>Nome:</label>
        <input type="text" name="nome" value="{{ old('nome') }}"><br>

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email') }}"><br>

        <label>CEP:</label>
        <input type="text" name="cep" value="{{ old('cep') }}"><br>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="{{ route('users.index') }}">Ver usuários</a>
</body>
</html>
