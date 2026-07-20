@extends('layout.main')

@section('title', 'Create Page')

@section('content')

    <form action="/" method="GET" class="w-50 my-5">
        <input type="text" name="search" placeholder="Procurar um professor" class="form-control text-center">
    </form>

    @if($search)
        <h1>Resultados para: {{ $search }}</h1>
    @elseif(empty($professors))
        <h1>Nenhum professor cadastrado</h1>
    @else
        <h1>Todos os professores</h1>

    @endif
    @foreach($professors as $professor)

        <div class="card ms-3 p-4 mt-5 w-75 d-flex flex-column position-relative">
            <p>Nome: {{ $professor->name }}</p>
            <p>Idade: {{ $professor->age }}</p>
            <p>Disciplina: {{ $professor->dicipline }}</p>
            <p>Email: {{ $professor->email }}</p>

            <div class="mt-3">
                <h5>Turmas</h5>

                @if(empty($professor->classes))
                    <p class="text-muted">Nenhuma turma cadastrada.</p>
                @else
                    <ul class="list-group">
                        @foreach($professor->classes as $class)
                            <li class="list-group-item">
                                {{ $class }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>

            @if($professor->image)
                <img src="/image/professors/{{ $professor->image }}" alt="{{ $professor->name }}"
                    class=" rounded-5 img-fluid mt-3 position-absolute top-0 end-0 mt-3 me-3" style="max-width: 200px;">
            @endif
            <a href="/professor/{{ $professor->id }}" class="btn btn-primary mt-3 " style="max-width: 200px;">Ver Detalhes</a>
        </div>

    @endforeach

@endsection