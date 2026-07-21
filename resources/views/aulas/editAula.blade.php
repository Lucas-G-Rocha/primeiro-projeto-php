@extends('layout.main')

@section('title', 'Editar aula')

@section('content')

<h1 class="mb-4">Editar Aula</h1>

<form action="{{ route('editar.aula', $aula->id) }}" method="POST">
    @csrf
    @method('PUT')

<div class="mb-3">
    <label for="name" class="form-label">
        Nome da aula
    </label>

    <input
        type="text"
        name="name"
        id="name"
        class="form-control @error('name') is-invalid @enderror"
        value="{{ old('name', $aula->name) }}"
        placeholder="Digite o nome da aula"
    >

    @error('name')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<div class="mb-3">
    <label for="professor_id" class="form-label">
        Professor
    </label>

    <select
        name="professor_id"
        id="professor_id"
        class="form-select @error('professor_id') is-invalid @enderror"
    >
        <option value="">Selecione um professor</option>

        @foreach ($professors as $professor)
            <option
                value="{{ $professor->id }}"
                {{ old('professor_id', $aula->professor_id) == $professor->id ? 'selected' : '' }}
            >
                {{ $professor->name }}
                - {{ $professor->dicipline }}
            </option>
        @endforeach
    </select>

    @error('professor_id')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<button type="submit" class="btn btn-primary">
    Salvar Alterações
</button>


</form>

@endsection
