

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">


<nav class="site-nav navbar navbar-expand-lg navbar-light">
  <div class="container-fluid ">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ route('users.inicio') }}"><img src="{{ asset('/imagens/logo192.png')}}" class="brand-logo d-inline-block" alt="ViaCEP"></a>
      <button class="navbar-toggler ms-auto mb-2 mb-lg-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="navbar-collapse collapse " id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.inicio') }}">Início</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.create') }}">Cadastrar novo</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('users.lista') }}">Ver usuários</a>
        </li>
        
      </ul>
      <form class="d-flex ms-auto mb-2 mb-lg-0" method="GET" action="{{ route('users.lista') }}" class="row g-2 mb-4">
        <input class="form-control me-2" name="search" type="search" placeholder="Buscar usuário" aria-label="Buscar usuário">
        <button class="btn search-action" type="submit">Buscar</button>
      </form>
      
    </div>
  </div>
</nav>
