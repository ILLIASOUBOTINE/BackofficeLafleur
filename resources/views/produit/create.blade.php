<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit/Create') }}
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
                
                <form action="{{ route('produit.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="produit_nom" class="form-label">Nom:</label>
                            <input id="produit_nom" type="text" class="form-control" name="nom" > 
                        </div>
                        <div class="mb-3">
                            <label for="produit_unite" class="form-label">Unite:</label>
                            <select id="produit_unite" class="form-select" aria-label="Default select example" name="unite" >
                            @foreach($unites as $unite)
                                <option value="{{$unite->idunite}}">{{$unite->nom}}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="produit_longueur" class="form-label">Longueur:</label>
                            <input id="produit_longueur" type="number" class="form-control" name="longueur" > 
                        </div>
                        <div class="mb-3">
                            <label for="produit_prix" class="form-label">Prix:</label>
                            <input id="produit_prix" type="number" class="form-control" name="prix" > 
                        </div>
                        <div class="mb-3">
                            <label for="produit_quantiteTotale" class="form-label">Quantite totale:</label>
                            <input id="produit_quantiteTotale" type="number" class="form-control" name="quantiteTotale" > 
                        </div>
                          <div class="mb-3">
                            <label for="produit_description" class="form-label">Description:</label>
                            <textarea id="produit_description" type="text" class="form-control" name="description" ></textarea>
                        </div>
                        {{-- <div class="mb-3">
                            <label for="produit_categorie" class="form-label">Categorie:</label>
                            <select id="produit_categorie" class="form-select" aria-label="Default select example" name="categorie" type="text">
                            @foreach($categories as $categorie)
                                <option value="{{$categorie->idcategorie}}">{{$categorie->nom}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label  class="form-label">Categorie:</label>
                            @foreach($categories as $categorie)
                               <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{$categorie->idcategorie}}" id="check_categorie_{{$categorie->idcategorie}}">
                                    <label class="form-check-label" for="check_categorie_{{$categorie->idcategorie}}">{{$categorie->nom}}</label>
                                </div>
                            @endforeach
                        </div>    
                        <div class="mb-3">
                            <label  class="form-label">Photo:</label>
                            @foreach($photos as $photo)
                               <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="photos[]" value="{{$photo->idphoto}}" id="check_photo_{{$photo->idphoto}}">
                                    <label class="form-check-label" for="check_photo_{{$photo->idphoto}}">{{$photo->img_url}}</label>
                                </div>
                            @endforeach
                        </div>
                       
                        {{-- <div class="mb-3">
                            <label for="produit_photo" class="form-label">Photo:</label>
                            <select id="produit_photo" class="form-select" aria-label="Default select example" name="photo" >
                            @foreach($photos as $photo)
                                <option value="{{$photo->idphoto}}">{{$photo->img_url}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                        <div class="mb-3">
                            <label class="form-label">Fleur:</label>
                          
                            @foreach($fleures as $fleur)
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="fleures[]" value="{{$fleur->idfleures}}" id="check_fleur_{{$fleur->idfleures}}">
                                <label class="list-group-item d-flex flex-column border border-secondary mb-3 p-3" for="check_fleur_{{$fleur->idfleures}}">
                                    <p><span class="fw-semibold">id: </span>{{$fleur->idfleures}} </p>
                                    <p><span class="fw-semibold">espece_fleur: </span>{{$fleur->espece_fleur->nom}} </p>
                                    <p><span class="fw-semibold">couleur: </span>{{$fleur->couleur->nom}} </p>
                                    @if($fleur->longueur == null)
                                        <p><span class="fw-semibold">longueur: </span> indéfini</p>
                                    @else
                                        <p><span class="fw-semibold">longueur: </span>{{$fleur->longueur}}cm </p>
                                    @endif
                                    <p><span class="fw-semibold">unite: </span>{{$fleur->unite->nom}} </p>

                                    <div >
                                        <label for="produit_quantite_{{$fleur->idfleures}}" class="form-label"><span class="fw-semibold">quantite:</span></label>
                                        <input id="produit_quantite_{{$fleur->idfleures}}" type="number" min="0" class="form-control" name="quantite{{$fleur->idfleures}}" > 
                                    </div>    
                                </label>
                                
                            </div>    
                            @endforeach
                            
                        </div>
                       
                        {{-- <div class="mb-3">
                            <label for="fleur_unite" class="form-label">Couleur:</label>
                            <select id="fleur_unite" class="form-select" aria-label="Default select example" name="unite" type="text">
                            @foreach($unites as $unite)
                                <option value="{{$unite->idunite}}">{{$unite->nom}}</option>
                            @endforeach
                            </select>
                        </div> --}}
                       
                    </div>
                    
                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('produit.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
            </div>
        </div>    
    </div>
    
</x-app-layout>