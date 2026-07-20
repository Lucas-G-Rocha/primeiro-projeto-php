@extends('layout.main')

@section('title', 'Create Page')

@section('content')

<h1 class="mb-4">Cadastrar Professor</h1>

<form action="/events/created" method="POST" class="card p-4 shadow-sm" style="min-width: 400px; max-width: 500px;" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="image" class="form-label">Imagem:</label>
        <input type="file" id="image" name="image" class="form-control">
    </div>

    <div class="mb-3">
        <label for="name" class="form-label">Nome</label>
        <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            placeholder="Seu nome"
            required
        >
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            placeholder="Seu email"
            required
        >
    </div>

    <div class="mb-3">
        <label for="age" class="form-label">Idade</label>
        <input
            type="number"
            class="form-control"
            id="age"
            name="age"
            placeholder="Sua idade"
            required
        >
    </div>

    <div class="mb-4">
        <label for="discipline" class="form-label">Disciplina</label>
        <input
            type="text"
            class="form-control"
            id="dicipline"
            name="dicipline"
            placeholder="Sua disciplina"
            required
        >
    </div>

    <h4 class="card-title">Aulas</h4>
    <div class="d-flex flex-row gap-3 flex-wrap" style="max-width: 350px; mt-3">
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala1" class="form-label fs-6">Sala 1</label>
            <input type="checkbox" id="sala1" class="form-check " name="classes[]" value="Sala 1">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala2" class="form-label fs-6">Sala 2</label>
            <input type="checkbox" id="sala2" class="form-check " name="classes[]" value="Sala 2">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala3" class="form-label fs-6">Sala 3</label>
            <input type="checkbox" id="sala3" class="form-check " name="classes[]" value="Sala 3">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala4" class="form-label fs-6">Sala 4</label>
            <input type="checkbox" id="sala4" class="form-check " name="classes[]" value="Sala 4">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala5" class="form-label fs-6">Sala 5</label>
            <input type="checkbox" id="sala5" class="form-check " name="classes[]" value="Sala 5">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala6" class="form-label fs-6">Sala 6</label>
            <input type="checkbox" id="sala6" class="form-check " name="classes[]" value="Sala 6">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala7" class="form-label fs-6">Sala 7</label>
            <input type="checkbox" id="sala7" class="form-check " name="classes[]" value="Sala 7">
        </div>
        <div class="mb-4 d-flex flex-column justify-content-center gap-2" style="max-width: max-content;">
            <label for="sala8" class="form-label fs-6">Sala 8</label>
            <input type="checkbox" id="sala8" class="form-check " name="classes[]" value="Sala 8">
        </div>
    </div>

    <button type="submit" class="btn btn-primary w-100">
        Cadastrar
    </button>
</form>

@endsection