<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Couleur') }}
        </h2>
    </x-slot>

    <x-simple_table.index :items="$couleurs"  nameTable="couleur" nameField="nom"/>
    {{-- <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('couleur.create') }}" class="btn btn-success mb-3">Create</a>
                <ul class="list-group">
                @foreach ($couleurs as $couleur)
       
   
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{$couleur->nom}} </p>
                        <div class="d-flex">
                           
                            <x-btn-edit  route="{{route('couleur.edit', $couleur->idcouleur)}}"/>
                            <x-btn-delete  route="{{route('couleur.destroy', $couleur->idcouleur)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div> --}}
    
</x-app-layout>