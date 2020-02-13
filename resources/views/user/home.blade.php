<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<h2>TAREFAS</h2>

@if($errors -> all())
    @foreach($errors->all() as $error)
        <p>
            <input disabled value="{{ $error }}">
        </p>
    @endforeach
@endif
@if($tasks->all())

    @foreach($tasks as $task)
        <p>
        <form action="{{ route('tasks.delete') }}" method="POST">
            @csrf
            @method('DELETE')
            <label>{{ $task -> titulo }}</label>
            <br>
            Finalizada: @if($task -> finalizada == true) <input type="checkbox" disabled checked> <input type="hidden" value="{{ $task -> id }}" name="id"> @else <input
                type="checkbox" disabled> @endif
            <input type="submit" value="Excluir tarefa">
        </form>


        </p>
    @endforeach

@else

    <p>Lista de tarefas vazia!</p>

@endif

<a href="{{ route('tasks.endForm') }}">Finalizar</a>
<a href="{{ route('tasks.create') }}">Adicionar</a>
<a href="{{ route('users.logout') }}">Logout</a>
</body>
</html>
