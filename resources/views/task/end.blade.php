<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Deletar tarefa</title>
</head>
<body>
<h2>Finalizar tarefa</h2>


@if($tasks->all())

    @foreach($tasks as $task)
        <form action="{{ route('tasks.end', ['id' => $task->id]) }}" method="POST">
            @csrf
            <p>
                <label>{{ $task -> titulo }}</label>
                <input type="submit" value="Finalizar">
            </p>
        </form>
    @endforeach

@else

    <p>Todas as tarefas foram concluídas!</p>

@endif

<a href="{{ route('users.home') }}">Voltar</a>
</body>
</html>
