@extends('layouts.main')

@section('title', 'Adição de Tarefas')

@section('content')

    <h1>Adição</h1>

    @if(@session('warning'))
        @component('components.alert')
            @session('warning')
        @endcomponent
    @endif

    <form method="post">
        @csrf

        <label for="title">
            Título: <input type="text" name="title">
        </label>

        <input type="submit" value="Adicionar">
    </form>

@endsection