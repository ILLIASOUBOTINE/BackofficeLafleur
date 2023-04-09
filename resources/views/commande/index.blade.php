<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Commande') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                {{-- <a href="{{ route('produit.create') }}" class="btn btn-success mb-3">Create</a> --}}
                <ul class="list-group">
                @foreach ($commandes as $commande)
                    <li class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id:</span> {{$commande->idcommandes}}</p>
                        <p><span class="fw-semibold">date_create:</span> {{$commande->date_create}} </p>
                        <p><span class="fw-semibold">frais de livraison:</span> {{$commande->frais_livraison}}$</p>
                        <p><span class="fw-semibold">num_commande:</span> {{$commande->num_commande}}</p>
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
                                <a href="#" class="list-group-item list-group-item-action">
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