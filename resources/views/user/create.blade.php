<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User/Create') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
         @if ($errors->any())
                <div class="alert alert-danger col-md-8">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-6">
                
                <form action="{{ route('user.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="user_name" class="form-label">Nom</label>
                            <input id="user_name" type="text" class="form-control" name="name" >
                        </div>
                        <div class="mb-3">
                            <label for="user_email" class="form-label">email</label>
                            <input id="user_email" type="email" class="form-control" name="email" >
                        </div>
                        <div class="mb-3">
                            <label for="user_password" class="form-label">password</label>
                            <input id="user_password" type="text" class="form-control" name="password" >
                        </div>
                       
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success bg-success">Ajouter</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>