<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/cabecalho.css') }}">
    @stack('styles')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">  
    <title>{{$titulo}}</title>
</head>
<body>
<nav class="navbar navbar-expand-md mt-0">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="{{ asset('/img/logo-senai.png') }}" alt="Logo da empresa Senai" width="85" height="40">
        </a>
        <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Right Side Of Navbar -->
             <h5>Itens Movimentação</h5>
            <ul class="navbar-nav ms-auto">
                <li class="nav-link"><a class="btn btn-outline-light" href="{{ route('item.index') }}">Itens</a></li>
                <li class="nav-link"><a class="btn btn-outline-light" href="{{ route('movimentacoes.index') }}">Movimentação</a></li>
            </ul>
        </div>
    </div>
</nav>
<main class="principal">
    <div class="conteudo">
        <h1>{{$tituloBody}}</h1>
        {{$slot}}
    </div>
</main>

<footer class="footer text-center">
        <div class="container">
            <p>&copy; <span id="year">{{now()->year}}</span> Vinicius Rodrigues Camargo</p>
        </div>
</footer>
</body>
</html>