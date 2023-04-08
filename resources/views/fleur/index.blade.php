<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fleur') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('fleur.create') }}" class="btn btn-success mb-3">Create</a>
                {{-- @if(auth()->user()->can('create'))
                    <a href="{{ route('fleur.create') }}" class="btn btn-success mb-3">Create</a>
                @endif --}}
                
                <ul class="list-group">
                @foreach ($fleures as $fleur)
       
   
                    <li id="fleur_{{$fleur->idfleures}}" class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id: </span>{{$fleur->idfleures}} </p>
                        <p><span class="fw-semibold">espece_fleur: </span>{{$fleur->espece_fleur->nom}} </p>
                        <p><span class="fw-semibold">couleur: </span>{{$fleur->couleur->nom}} </p>
                        @if($fleur->longueur == null)
                            <p><span class="fw-semibold">longueur: </span>indéfini</p>
                        @else
                            <p><span class="fw-semibold">longueur: </span>{{$fleur->longueur}}cm </p>
                        @endif
                        <p><span class="fw-semibold">unite: </span>{{$fleur->unite->nom}} </p>

                        <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{route('fleur.edit', $fleur->idfleures)}}"/>
                            <x-btn-delete  route="{{route('fleur.destroy', $fleur->idfleures)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>

 