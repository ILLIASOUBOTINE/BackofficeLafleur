<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event/Show') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
               
              
                    <div class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id:</span> {{$banniereEvent->idbanniere_event}}</p>
                        <p><span class="fw-semibold">titre:</span> {{$banniereEvent->titre}} </p>
                        <p><span class="fw-semibold">date_debut:</span> {{$banniereEvent->date_debut}}</p>
                        <p><span class="fw-semibold">date_fin: </span>{{$banniereEvent->date_fin}}</p>
                        <p><span class="fw-semibold">photo:</span> {{$banniereEvent->photo->img_url}}</p>
                        <p><span class="fw-semibold">description:</span> {{$banniereEvent->description}}</p>
                        
                        
                        <div>
                            <p class="fw-semibold">produit:</p>
                            <div class="list-group">
                            @foreach ($banniereEvent->produits as $produit) 
                                <a href="{{ route('produit.show', $produit->idproduit) }}" class="list-group-item list-group-item-action mb-1">
                                    <p class="mb-1"><span class="fw-semibold">id: </span>{{$produit->idproduit}}</p>
                                    <p class="mb-1"><span class="fw-semibold">nom: </span>{{$produit->nom}}</p>
                                    
                                </a>
                            @endforeach
                            </div>
                           
                        </div>

                       
                         

                        <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{route('banniere_event.edit', $banniereEvent->idbanniere_event)}}"/>
                            <a href="{{ route('banniere_event.index') }}" class="btn btn-success">Show All</a>
                            <x-btn-delete  route="{{route('banniere_event.destroy', $banniereEvent->idbanniere_event)}}"/>
                        </div>
                    </div>
                
            </div>
        </div>    
    </div>
    
</x-app-layout>