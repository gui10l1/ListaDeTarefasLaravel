<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastro</title>
</head>
<body>
<h2>Cadastro</h2>

@if($errors->all())
    @foreach($errors->all() as $error)
        <p>
            <input disabled value="{{ $error }}">
        </p>
    @endforeach
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <p>
        <label>Nome</label>
        <input type="text" name="nome">
    </p>
    <p>
        <label>Email</label>
        <input type="email" name="email">
    </p>
    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>
    <p>
        <input type="submit" value="Cadastrar">
    </p>
</form>
<a href="{{ route('users.home') }}">Voltar</a>
</body>
</html>
