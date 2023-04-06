<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit/Show') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('previous_page') }}" class="btn btn-success mb-3">Retour</a>
                {{-- <ul class="list-group">
                @foreach ($produitsWithFleuresQuantite as $produit) --}}
                    <div class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id:</span> {{$produit->idproduit}}</p>
                        <p><span class="fw-semibold">nom:</span> {{$produit->nom}} </p>
                        <p><span class="fw-semibold">unite:</span> {{$produit->unite->nom}}</p>
                        <p><span class="fw-semibold">longueur: </span>{{$produit->longueur}}cm</p>
                        <p><span class="fw-semibold">prix:</span> {{$produit->prix_unite}}$</p>
                        <p><span class="fw-semibold">quantiteTotale:</span> {{$produit->quantiteTotale}}</p>
                        <p><span class="fw-semibold">ventesTotales:</span> {{$produit->ventesTotales}}</p>
                        <p><span class="fw-semibold">description:</span> {{$produit->description}}</p>

                        <p>
                            <span class="fw-semibold">categorie:</span>
                            @foreach ($produit->categories as $categorie) 
                            <span class="badge text-bg-dark">{{$categorie->nom}}</span> 
                            @endforeach
                        </p>

                        <p>
                            <span class="fw-semibold">photo:</span>
                            @foreach ($produit->photos as $photo) 
                            <span class="badge text-bg-light">{{$photo->img_url}}</span> 
                            @endforeach
                        </p>

                        <div>
                            <p class="fw-semibold">fleur:</p>
                            <div class="list-group">
                            @foreach ($fleuresWithQuantite as $fleur) 
                                <a href="#" class="list-group-item list-group-item-action">
                                    <p class="mb-1"><span class="fw-semibold">id: </span>{{$fleur->idfleures}}</p>
                                    <p class="mb-1"><span class="fw-semibold">nom: </span>{{$fleur->espece_fleur->nom}}</p>
                                    <p class="mb-1"><span class="fw-semibold">couleur: </span>{{$fleur->couleur->nom}}</p>
                                    <p class="mb-1"><span class="fw-semibold">quantite: </span>{{$fleur->quantite}}</p>
                                </a>
                            @endforeach
                            </div>
                           
                        </div>

                       
                         

                        <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{route('produit.edit', $produit->idproduit)}}"/>
                            <a href="{{ route('produit.index') }}" class="btn btn-success">Show All</a>
                            <x-btn-delete  route="{{route('produit.destroy', $produit->idproduit)}}"/>
                        </div>
                    </div>
                {{-- @endforeach 
                </ul> --}}
            </div>
        </div>    
    </div>
    
</x-app-layout>