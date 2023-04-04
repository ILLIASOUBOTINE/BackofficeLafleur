<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fleur/Create') }}
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

            <div class="col-md-8">
                
                <form action="{{ route('fleur.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                  
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="fleur_name" class="form-label">Espace_fleur:</label>
                            <select id="fleur_name" class="form-select" aria-label="Default select example" name="espece_fleur" type="text">
                            @foreach($especeFleurs as $especeFleur)
                                <option value="{{$especeFleur->idespece_fleur}}" >{{$especeFleur->nom}}</option>
                            @endforeach
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <label for="fleur_couleur" class="form-label">Couleur:</label>
                            <select id="fleur_couleur" class="form-select" aria-label="Default select example" name="couleur" type="text">
                            @foreach($couleurs as $couleur)
                                <option value="{{$couleur->idcouleur}}">{{$couleur->nom}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fleur_longueur" class="form-label">Longueur:</label>
                            <input id="fleur_longueur" type="number" class="form-control" name="longueur" > 
                        </div>
                        <div class="mb-3">
                            <label for="fleur_unite" class="form-label">Couleur:</label>
                            <select id="fleur_unite" class="form-select" aria-label="Default select example" name="unite" type="text">
                            @foreach($unites as $unite)
                                <option value="{{$unite->idunite}}">{{$unite->nom}}</option>
                            @endforeach
                            </select>
                        </div>
                       
                    </div>
                    
                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('fleur.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>