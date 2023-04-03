<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fleur') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                @if(auth()->user()->can('create'))
                    <a href="{{ route('fleur.create') }}" class="btn btn-success mb-3">Create</a>
                @endif
                

                <ul class="list-group">
                @foreach ($fleures as $fleur)
       
   
                    <li class="list-group-item d-flex flex-column  mb-3">
                        <p>id: {{$fleur->idfleures}} </p>
                        <p>espece_fleur: {{$fleur->espece_fleur->nom}} </p>
                        <p>couleur: {{$fleur->couleur->nom}} </p>
                        @if($fleur->longueur == null)
                            <p>longueur: indéfini </p>
                        @else
                            <p>longueur: {{$fleur->longueur}}cm </p>
                        @endif
                        <p>unite: {{$fleur->unite->nom}} </p>
                        <div class="d-flex my-2">
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