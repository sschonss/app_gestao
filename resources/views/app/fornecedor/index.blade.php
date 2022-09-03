<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>Fornecedor</h2>
    {{-- <a href="{{ route('fornecedor.create') }}">Cadastrar</a> --}}


    @if(count($fornecedores) > 0 && count($fornecedores) < 10)
        <h4>Existem alguns fornecedores cadastrados</h4>
    @elseif(count($fornecedores) >= 10)
        <h4>Existem muitos fornecedores cadastrados</h4>
    @else
        <h4>Não existem fornecedores cadastrados</h4>
    @endif

</body>
</html>
