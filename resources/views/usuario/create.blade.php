<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Usuário</title>
</head>
<body>
    <header>
         @include('menue')
    </header>
    <div class="form_control m-4">
        <h3 class="text-center">Cadastrar Usuário</h3>

        @if ($errors->any())
            <div>
                <ul style="color:red;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('users.store') }}" class="form_control" method="POST">
            @csrf
            <div class="mb-3">
                <label>Nome:</label>
                <input class="form-control" type="text" name="nome" value="{{ old('nome') }}">
            </div>
            <div class="mb-3">
                <label>Email:</label>
                <input class="form-control" type="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label>CEP:</label>
                <input class="form-control" type="text" name="cep" value="{{ old('cep') }}">
            </div>
             <div class="m-2 text-center">
                <button type="submit" class="btn btn-primary" > Cadastrar</button>
            </div>
        </form>
    </div>
</body>
<div>
    @include('footer')
</div>
</html>
