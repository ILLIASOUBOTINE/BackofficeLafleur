<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espece_fleur/Create') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex flex-column align-items-center">
            @if ($errors->any())
                <div class="alert alert-danger col-md-8">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="col-md-8">
                
                <form action="{{ route('espece_fleur.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                    <p class="mb-2">
                        <label for="nom" class="form-label">Nom</label>
                        <input type="text" class="form-control" name="nom" id="nom">
                    </p>
                    
                    <p>
                        <button type="submit" class="btn btn-success bg-success me-2">Ajouter</button>
                        <a href="{{ route('espece_fleur.index') }}" class="btn btn-danger">Annuler</a>
                    </p>
                </form>
               
                
            </div>
        </div>    
    </div>
    
</x-app-layout>