@extends('layouts.main')

@section('title', 'Edição de Tarefas')

@section('content')

    <h1>Edição</h1>

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
            Título: <input type="text" name="title" value="{{ $data->title }}">
        </label>

        <input type="submit" value="Salvar">
    </form>

@endsection