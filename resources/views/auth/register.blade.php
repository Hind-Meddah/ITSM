@extends('layouts.application')
@section('breadcrumb')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Utilisateur</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Accueil</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('ajouter-utilisateur') }}">Gestion</a></li>
                        <li class="breadcrumb-item active">Utilisateur</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('main-content')
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title"> Ajoutez Utilisateur</h3>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="card-body">
                <div class="row">
                    <!-- First Name -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <x-input-label for="first_name" :value="__('Prénom')" />
                            <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name"
                                :value="old('first_name')" required autofocus autocomplete="first_name" />
                            <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <!-- Last Name -->
                        <div class="form-group">
                            <x-input-label for="last_name" :value="__('Nom')" />
                            <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name"
                                :value="old('last_name')" required autofocus autocomplete="last_name" />
                            <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            <x-input-label for="phone" :value="__('Télephone')" />
                            <x-text-input type="text" class="block mt-1 w-full" name="phone" id="phone" />
                            <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                        </div>
                    </div>
                    <!-- Email Address -->
                    <div class="col-md-6">
                        <div class="form-group">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email"
                                :value="old('email')" required autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>


                    <!-- Password -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required
                                autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="col-md-6">

                        <div class="form-group">
                            <x-input-label for="password_confirmation" :value="__('Confirmez Password')" />

                            <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password"
                                name="password_confirmation" required autocomplete="new-password" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <div class="col-md-6">

                        <div class="form-group">
                            {{-- <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Selectioné le role d'utilisateur</label> --}}
                            <x-input-label for="role" :value="__('Selectionez le role d\'utilisateur')" />
                            <select id="role" name="role"
                                class="block mt-1 w-full  border border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm ">

                                <option value="USER">Utilisateur</option>
                                <option value="TECH">Technicien</option>
                                <option value="ADMIN">Administrateur</option>

                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">

                        <div class="flex items-center justify-end ">

                            <x-primary-button class="ms-4" id="register">
                                {{ __('Register') }}
                            </x-primary-button>
                        </div>
                    </div>
                </div>
        </form>

    </div>
    </div>
@endsection
@section('register_script')
    <script>
        $(document).ready(function() {

            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
            });
            @if (session('success'))
                var successMessage = "{{ session('success') }}";
                Toast.fire({
                    icon: 'success',
                    title: successMessage
                });
            @endif
            @if (session('error'))
                var errorMessage = "{{ session('error') }}";
                Toast.fire({
                    icon: 'error',
                    title: errorMessage
                });
            @endif
        

        });
    </script>
@endsection
