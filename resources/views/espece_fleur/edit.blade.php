<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espece_fleur/Edit') }}
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
                
                <form action="{{ route('espece_fleur.update', $especeFleur->idespece_fleur) }}" method="POST" class="d-flex flex-column align-items-center  mb-4 mt-4">
                    @csrf
                    @method('PUT')
                    <div class="w-100 mb-3">
                        <label for="nom" class="form-label">Nom</label>
                        <input id="nom" type="text" class="form-control" name="nom" value="{{$especeFleur->nom}}">
                    </div>
                    
                    <p>
                        <button type="submit" class="btn btn-success bg-success me-3">Valider</button>
                        <a href="{{ route('espece_fleur.index') }}" class="btn btn-danger">Annuler</a>
                    </p>
                </form>
                
            </div>
        </div>    
    </div>
    
</x-app-layout>