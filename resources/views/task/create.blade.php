<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nova tarefa</title>
</head>
<body>
<h2>Cadastrar nova tarefa</h2>

@if($errors->all())
    @foreach($errors->all() as $error)
        <p>
            <input disabled value="{{ $error }}">
        </p>
    @endforeach
@endif

<form action="{{ route('tasks.new') }}" method="POST">
    @csrf
    <input type="hidden" value="{{ \Illuminate\Support\Facades\Session::get('id') }}" name="id_usuario">
    <p>
        <label>Titulo</label>
        <input type="text" name="titulo">
    </p>
    <p>
        <input type="submit" value="Nova tarefa">
    </p>
</form>
<a href="{{ route('users.home') }}">Voltar</a>
</body>
</html>
