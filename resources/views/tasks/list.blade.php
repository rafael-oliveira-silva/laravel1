@extends('layouts.main')

@section('title', 'Listagem de Tarefas')

@section('content')

    <h1>Listagem</h1>

    <a href="{{ route('createTask') }}"> Adicionar nova tarefa </a><br><br>

    @if(count($list) > 0)
        <ul>
        @foreach ($list as $item)

        <li> 

            <a href="{{ route('checkTask', ['id'=>$item->id]) }}">@if ($item->solved===1) [ Desmarcar ]@else[ Marcar ]@endif</a> {{ $item->title }}
            <a href="{{ route('editTask', ['id'=>$item->id]) }}"> [ Editar tarefa ] </a>
            <a href="{{ route('destroyTask', ['id'=>$item->id]) }}" onclick="return confirm('Tem certeza que deseja excluir?')"> [ Excluir tarefa ] </a>
        </li>
        @endforeach
        </ul>
    @else
        Não há itens a serem exibidos!
    @endif

@endsection