<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
<h2>Login</h2>
<form action="{{ route('users.login') }}" method="POST">
    @csrf
    @if($errors->all())
        @foreach($errors->all() as $error)
            <p>
                <input disabled value="{{ $error }}">
            </p>
        @endforeach
    @endif
    <p>
        <label>Email</label>
        <input type="text" name="email">
    </p>
    <p>
        <label>Senha</label>
        <input type="password" name="senha">
    </p>
    <p>
        <input type="submit" value="Entrar">
    </p>
</form>
<a href="{{ route('users.create') }}">Não tem conta? Faça um cadastro!</a>
</body>
</html>
