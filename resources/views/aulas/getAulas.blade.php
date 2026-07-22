@extends('layout.main')

@section('title', 'Aulas')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0">Aulas</h1>
        @if(auth()->check())
            <a href="{{ route('create.aula') }}" class="btn btn-primary ms-4">
                Nova Aula
            </a>
        @endif
    </div>

    @if ($aulas->isEmpty())

        <div class="alert alert-info">
            Nenhuma aula cadastrada.
        </div>

    @else

        <div class="row g-4 w-75 d-flex justify-content-center">
            @foreach ($aulas as $aula)
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100 shadow-sm border-0">

                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start">
                                <h4 class="card-title mb-0">
                                    {{ $aula->name }}
                                </h4>

                                <span class="badge bg-secondary">
                                    #{{ $aula->id }}
                                </span>
                            </div>

                            <hr>

                            <h5 class="text-muted">
                                Professor
                            </h5>

                            <p class="mb-1">
                                <strong>Nome:</strong>
                                {{ $aula->professor->name }}
                            </p>

                            <p class="mb-0">
                                <strong>Disciplina:</strong>
                                {{ $aula->professor->dicipline }}
                            </p>
                        </div>

                        <div class="card-footer bg-transparent border-0 d-flex gap-2">
                            @if(auth()->check())
                                <a href="{{ route('edit.aula', $aula->id) }}" class="btn btn-outline-primary btn-sm">
                                    Editar
                                </a>


                                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#excluirModal">
                                    Excluir
                                </button>


                                <div class="modal fade" id="excluirModal">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Deseja excluir {{ $aula->name }}?</h5>
                                            </div>
                                            
                                                <div class="modal-footer">
                                                    <div class="d-flex gap-4 align-items-center justify-content-center">
                                                        <form action="{{ route('delete.aula', $aula->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">
                                                                Excluir
                                                            </button>
                                                        </form>
                                                        <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            @endif

                        </div>

                    </div>
                </div>
            @endforeach
        </div>

    @endif

@endsection