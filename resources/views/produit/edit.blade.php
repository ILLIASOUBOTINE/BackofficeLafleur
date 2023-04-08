<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit/Edit') }}
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
                <h3 class="my-3 fs-4">Les champs avec (*) sont obligatoires!</h3>
                           
                
                <form action="{{ route('produit.update', $produit->idproduit) }}" method="POST" class="mb-4 mt-4">
                   @csrf
                   @method('PUT')
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="produit_nom" class="form-label" required>Nom*:</label>
                            <input id="produit_nom" type="text" class="form-control" name="nom" value="{{$produit->nom}}"> 
                        </div>
                        <div class="mb-3">
                            <label for="produit_unite" class="form-label">Unite*:</label>
                            <select id="produit_unite" class="form-select" aria-label="Default select example" name="unite" >
                            @foreach($unites as $unite)
                                <option value="{{$unite->idunite}}" @if($produit->unite->idunite == $unite->idunite) selected @endif>{{$unite->nom}} </option>
                            @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="produit_longueur" class="form-label">Longueur:</label>
                            <input id="produit_longueur" type="number" class="form-control" name="longueur" value="{{$produit->longueur}}"> 
                        </div>
                        <div class="mb-3">
                            <label for="produit_prix" class="form-label">Prix*:</label>
                            <input id="produit_prix" type="number" step="0.01" min="0" class="form-control" name="prix_unite" value="{{$produit->prix_unite}}"> 
                        </div>
                        <div class="mb-3">
                            <label for="produit_quantiteTotale" class="form-label">Quantite totale*:</label>
                            <input id="produit_quantiteTotale" type="number" class="form-control" name="quantiteTotale" value="{{$produit->quantiteTotale}}"> 
                        </div>
                          <div class="mb-3">
                            <label for="produit_description" class="form-label">Description*:</label>
                            <textarea id="produit_description" type="text" class="form-control" name="description">{{$produit->description}}</textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Categorie*:</label>
                            @foreach($categories as $categorie)
                               <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="categories[]" value="{{$categorie->idcategorie}}" id="check_categorie_{{$categorie->idcategorie}}"  @if( $produit->categories->contains($categorie)) checked @endif>
                                    <label class="form-check-label" for="check_categorie_{{$categorie->idcategorie}}">{{$categorie->nom}}</label>
                                </div>
                            @endforeach
                        </div>    
                        <div class="mb-3">
                            <label  class="form-label">Photo*:</label>
                            @foreach($photos as $photo)
                               <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="photos[]" value="{{$photo->idphoto}}" id="check_photo_{{$photo->idphoto}}" @if( $produit->photos->contains($photo)) checked @endif>
                                    <label class="form-check-label" for="check_photo_{{$photo->idphoto}}">{{$photo->img_url}}</label>
                                </div>
                            @endforeach
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Fleur*:</label>
                          
                            @foreach($fleures as $fleur)
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="fleures[]" value="{{$fleur->idfleures}}" id="check_fleur_{{$fleur->idfleures}}" @if( $produit->fleures->contains($fleur)) checked @endif>
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
                                        <input id="produit_quantite_{{$fleur->idfleures}}" type="number"  min="1" class="form-control" name="quantites[{{$fleur->idfleures}}]" @if($fleuresWithQuantite->contains($fleur)) 
                                            value="{{$fleuresWithQuantite->find($fleur)->quantite}}"
                                        @else
                                            value="1"
                                        @endif> 
                                    </div>    
                                </label>
                            </div>    
                            @endforeach    
                        </div>   
                    </div>
                    
                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('produit.show', $produit->idproduit) }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
            </div>
        </div>    
    </div>
    
</x-app-layout>   
                   
                
            
                           
                          
                        
                       
                  
                       
        