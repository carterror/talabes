@extends('layouts.guest')

@section('title')
Registrarse
@endsection

@section('content')

<main class="form-signin">
    <form class="form-signin" method="POST" action="{{ route('register') }}">
               <!-- Validation Errors -->
       <x-auth-validation-errors class="mb-4" :errors="$errors" />
        @csrf
        <img class="mb-4" src="{{ url('img/logo.png') }}" alt="">
        <h1 class="h3 mb-3 font-weight-normal">Por favor, registrese</h1>
        <label for="inputEmail" class="sr-only">Correo Electrónico</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Correo Electrónico" name="email" :value="old('email')" required autofocus="">
        
        <label for="inputPassword" class="sr-only">Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Contraseña" name="password"
        required autocomplete="new-password" required="">

        <label for="confirmPassword" class="sr-only">Contraseña</label>
        <input type="password" id="confirmPassword" class="form-control" placeholder="Confirmar Contraseña" name="password_confirmation" required>

        <button class="btn btn-lg btn-primary btn-block" type="submit">Registrarse</button>
        <p class="mt-5 mb-3 text-muted">© 2021-2022</p>
      </form>
  </main>
@endsection
{{-- 

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout> --}}
