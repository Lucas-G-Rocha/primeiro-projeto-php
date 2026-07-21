@extends('layout.main')

@section('title', 'Login')

@section('content')

        <div class="col-md-5 col-lg-4">

            <div class="card shadow-sm">
                <div class="card-body p-4">

                    <h3 class="text-center mb-4">
                        Login
                    </h3>

                    <form action="{{ route('login.api') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">
                                E-mail
                            </label>

                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                                name="email" value="{{ old('email') }}" placeholder="Digite seu e-mail" required autofocus>

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">
                                Senha
                            </label>

                            <input type="password" class="form-control @error('password') is-invalid @enderror"
                                id="password" name="password" placeholder="Digite sua senha" required>

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" id="remember" name="remember">

                            <label class="form-check-label" for="remember">
                                Lembrar-me
                            </label>
                        </div>
                        @error('wrong')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        @error('auth')
                            <p class="alert alert-danger">
                                {{ $message }}
                            </p>
                        @enderror
                        <button type="submit" class="btn btn-primary w-100">
                            Entrar
                        </button>

                    </form>

                </div>
            </div>

        </div>  

@endsection