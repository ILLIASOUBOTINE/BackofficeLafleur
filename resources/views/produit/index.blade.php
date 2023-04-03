<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('produit.create') }}" class="btn btn-success mb-3">Create</a>
                <ul class="list-group">
                @foreach ($produits as $produit)
                   
   
                    <li class="list-group-item d-flex flex-column  mb-3">
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
                         

                        <div class="d-flex justify-content-between">
                            <x-btn-edit  route="{{route('produit.edit', $produit->idproduit)}}"/>
                            <x-btn-delete  route="{{route('produit.destroy', $produit->idproduit)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>