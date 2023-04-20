<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commande')}}
        </h2>
    </x-slot>
    
    <x-nav-commande/>

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
            @if ($e != null)
                <div class="alert alert-danger col-md-8">
                   {{$e}}
                </div>
            @endif
            <div class="col-md-8">
                {{-- <a href="{{ route('produit.create') }}" class="btn btn-success mb-3">Create</a> --}}
                <ul class="list-group">
                @foreach ($commandesWithProduitsQuantiteWithPrixtotal as $commande)
                    <li class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id:</span> {{$commande->idcommandes}}</p>
                        <p><span class="fw-semibold">date_create:</span> {{$commande->date_create}} </p>
                       
                        {{-- <p><span class="fw-semibold">num_commande:</span> {{$commande->num_commande}}</p> --}}
                        <div class="mb-3">
                            <p class="fw-semibold">client:</p>
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action">
                                    <p class="mb-1"><span class="fw-semibold">id: </span>{{$commande->client->idclient}}</p>
                                    <p class="mb-1"><span class="fw-semibold">email: </span>{{$commande->client->email}}</p>
                                </a>    
                            </div>
                        </div>
                        <div class="mb-3">
                            <p class="fw-semibold">livraison:</p>
                            <div class="list-group">
                                <a href="{{ route('livraison.edit', $commande->livraison->idlivraison) }}" class="list-group-item list-group-item-action">
                                    <p><span class="fw-semibold">id: </span>{{$commande->livraison->idlivraison}} </p>
                                    <p><span class="fw-semibold">date_prevu: </span>{{$commande->livraison->date_prevu}} </p>
                                    @if($commande->livraison->date_livre == null)
                                        <p><span class="fw-semibold">date_livre: </span>non livres</p>
                                    @else
                                        <p><span class="fw-semibold">date_livre: </span>{{$commande->livraison->date_livre}} </p>
                                    @endif
                                    <p><span class="fw-semibold">ville: </span>{{$commande->livraison->notreLivraison->nom_ville}} </p>
                                    <p><span class="fw-semibold">rue: </span>{{$commande->livraison->rue}} </p>
                                    <p><span class="fw-semibold">numéro de maison: </span>{{$commande->livraison->num_maison}} </p>
                                    @if($commande->livraison->num_appart != null)
                                        <p><span class="fw-semibold">numéro d'appartement: </span>{{$commande->livraison->num_appart}} </p>
                                    @endif
                                    <p><span class="fw-semibold">numéro de téléphone: </span>{{$commande->livraison->num_telephone}} </p>
                                </a>    
                            </div>
                        </div>
                        @if(count($commande->cadeaux) !== 0)
                            <div class="mb-3">
                                <p class="fw-semibold">cadeau:</p>
                                <div class="list-group">
                                    @foreach($commande->cadeaux as $cadeau)
                                        <a href="{{ route('cadeau.edit', $cadeau->idcadeau) }}" class="list-group-item list-group-item-action">
                                            <p class="mb-1"><span class="fw-semibold">id: </span>{{$cadeau->idcadeau}}</p>
                                            <p class="mb-1"><span class="fw-semibold">nom: </span>{{$cadeau->nom}}</p>
                                        </a>  
                                    @endforeach
                                </div>
                            </div>
                        @endif 
                        <div class="list-group">
                            <p class="fw-semibold">produit:</p>
                            @foreach ($commande->produits as $produit)
                                <a href="{{ route('produit.show', $produit->idproduit) }}" class="list-group-item list-group-item-action border border-secondary mb-3">
                                    <p><span class="fw-semibold">id:</span> {{$produit->idproduit}}</p>
                                    <p><span class="fw-semibold">nom:</span> {{$produit->nom}} </p>
                                    <p><span class="fw-semibold">prix:</span> {{$produit->prix_unite}}$</p>
                                    <p><span class="fw-semibold">quantite: </span>{{$produit->quantite}}</p>
                                    <p><span class="fw-semibold">prix total: </span>{{$produit->total_produit}}$</p>
                                   
                                </a>
                            @endforeach 
                        </div>
                        <p><span class="fw-semibold">frais de livraison:</span> {{$commande->frais_livraison}}$</p>
                        <p><span class="fw-semibold">le montant payé: </span>{{$commande->total_commande + $commande->frais_livraison}}$</p>

                         {{-- <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{ route('produit.edit', $produit->idproduit) }}"/>
                            <a href="{{ route('produit.show', $produit->idproduit) }}" class="btn btn-success">show</a>
                            <x-btn-delete  route="{{route('produit.destroy', $produit->idproduit)}}"/>
                        </div> --}}
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>