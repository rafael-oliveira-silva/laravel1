@extends('layouts.main')

@section('title', 'Adição de Tarefas')

@section('content')

    <h1>Adição</h1>

    @if($errors->any())
        @component('components.alert')
            @foreach ($errors->all() as $error)
                {{ $error }}<br/>
            @endforeach
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