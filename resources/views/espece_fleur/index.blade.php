<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Espece_fleur') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('espece_fleur.create') }}" class="btn btn-success mb-3">Create</a>
                <ul class="list-group">
                @foreach ($especeFleurs as $especeFleur)
       
   
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{$especeFleur->nom}} </p>
                        <div class="d-flex">
                            {{-- <a href="#" class="btn btn-primary me-1">Edit</a> --}}
                            <x-btn-edit  route="{{route('espece_fleur.edit', $especeFleur->idespece_fleur)}}"/>
                            <x-btn-delete  route="{{route('espece_fleur.destroy', $especeFleur->idespece_fleur)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>