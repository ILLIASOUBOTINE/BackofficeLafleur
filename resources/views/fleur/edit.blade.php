<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fleur/Edit') }}
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
                
                <form action="{{ route('fleur.update', $fleur->idfleures) }}" method="POST" class="mb-4 mt-4">
                   @csrf
                   @method('PUT')
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="fleur_name" class="form-label">Espace_fleur:</label>
                            <select id="fleur_name" class="form-select" aria-label="Default select example" name="espace_fleur" >
                            @foreach($especeFleurs as $especeFleur)
                                <option value="{{$especeFleur->idespece_fleur}}"  @if($fleur->espece_fleur->idespece_fleur == $especeFleur->idespece_fleur) selected @endif>{{$especeFleur->nom}}</option>
                            @endforeach
                            </select>
                            {{-- <label for="role_name" class="form-label">Nom de fleur</label>
                            <input id="role_name" type="text" class="form-control" name="nom" value="{{$fleur->espece_fleur->nom}}" > --}}
                        </div>
                        <div class="mb-3">
                            <label for="fleur_couleur" class="form-label">Couleur:</label>
                            <select id="fleur_couleur" class="form-select" aria-label="Default select example" name="couleur" >
                            @foreach($couleurs as $couleur)
                                <option value="{{$couleur->idcouleur}}"  @if($fleur->couleur->idcouleur == $couleur->idcouleur) selected @endif>{{$couleur->nom}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="fleur_longueur" class="form-label">Longueur:</label>
                            <input id="fleur_longueur" type="number" class="form-control" name="longueur" value="{{$fleur->longueur}}" > 
                        </div>
                        <div class="mb-3">
                            <label for="fleur_unite" class="form-label">Couleur:</label>
                            <select id="fleur_unite" class="form-select" aria-label="Default select example" name="unite" >
                            @foreach($unites as $unite)
                                <option value="{{$unite->idunite}}"  @if($fleur->unite->idunite == $unite->idunite) selected @endif>{{$unite->nom}}</option>
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