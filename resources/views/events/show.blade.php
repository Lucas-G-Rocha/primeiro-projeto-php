@extends('layout.main')

@section('title', $professor->name)

@section('content')

    <div class="card shadow-lg border-0 position-relative" style="max-width: 700px; width: 100%;">
    <div class="card-body p-4">

        @if($professor->image)
            <img
                src="{{ asset('image/professors/' . $professor->image) }}"
                alt="{{ $professor->name }}"
                class="rounded-circle border border-3 position-absolute top-0 end-0 m-4"
                style="width: 150px; height: 150px; object-fit: cover;"
            >
        @endif

        <h2 class="fw-bold mb-4">
            {{ $professor->name }}
        </h2>

        <hr>

        <div class="row g-3">

            <div class="col-md-6">
                <h6 class="text-secondary mb-1">Nome</h6>
                <p class="fs-5">{{ $professor->name }}</p>
            </div>

            <div class="col-md-6">
                <h6 class="text-secondary mb-1">Idade</h6>
                <p class="fs-5">{{ $professor->age }} anos</p>
            </div>

            <div class="col-md-6">
                <h6 class="text-secondary mb-1">Disciplina</h6>
                <p class="fs-5">{{ $professor->dicipline }}</p>
            </div>

            <div class="col-md-6">
                <h6 class="text-secondary mb-1">E-mail</h6>
                <p class="fs-5">{{ $professor->email }}</p>
            </div>

        </div>
        <hr>

        <h6 class="text-secondary mb-1">Classes</h6>
        @if(!empty($professor->classes))
            <ul class="list-group list-group-flush">
                @foreach($professor->classes as $class)
                    <li class="list-group-item">{{ $class }}</li>
                @endforeach
            </ul>
        @else
            <p class="fs-5">Nenhuma classe cadastrada.</p>
        @endif

        <div class="d-flex justify-content-end gap-2 mt-4">
            <a href="/" class="btn btn-outline-secondary">
                Voltar
            </a>

            <a href="/events/edit/{{ $professor->id }}" class="btn btn-primary">
                Editar
            </a>
        </div>

    </div>
</div>

@endsection