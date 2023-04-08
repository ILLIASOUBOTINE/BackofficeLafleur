<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livraison') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('livraison.create') }}" class="btn btn-success mb-3">Create</a>
                
                
                <ul class="list-group">
                @foreach ($livraisons as $livraison)
       
   
                    <li  class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id: </span>{{$livraison->idlivraison}} </p>
                        <p><span class="fw-semibold">date_prevu: </span>{{$livraison->date_prevu}} </p>
                        @if($livraison->date_livre == null)
                            <p><span class="fw-semibold">date_livre: </span>non livres</p>
                        @else
                            <p><span class="fw-semibold">date_livre: </span>{{$livraison->date_livre}} </p>
                        @endif
                        <p><span class="fw-semibold">ville: </span>{{$livraison->notreLivraison->nom_ville}} </p>
                        <p><span class="fw-semibold">rue: </span>{{$livraison->rue}} </p>
                        <p><span class="fw-semibold">numéro de maison: </span>{{$livraison->num_maison}} </p>
                        @if($livraison->num_appart != null)
                            <p><span class="fw-semibold">numéro d'appartement: </span>{{$livraison->num_appart}} </p>
                        @endif
                        <p><span class="fw-semibold">numéro de téléphone: </span>{{$livraison->num_telephone}} </p>
                

                        <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{route('livraison.edit', $livraison->idlivraison)}}"/>
                            <x-btn-delete  route="{{route('livraison.destroy', $livraison->idlivraison)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>

 