<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadeau') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8">
                <a href="{{ route('cadeau.create') }}" class="btn btn-success mb-3">Create</a>
                
                
                <ul class="list-group">
                @foreach ($cadeaux as $cadeau)
       
   
                    <li id="fleur_{{$cadeau->idcadeau}}" class="list-group-item d-flex flex-column  mb-3">
                        <p><span class="fw-semibold">id: </span>{{$cadeau->idcadeau}} </p>
                        <p><span class="fw-semibold">nom: </span>{{$cadeau->nom}} </p>
                        <p><span class="fw-semibold">quantite: </span>{{$cadeau->quantite}} </p>
                        
                        <p><span class="fw-semibold">photo: </span>{{$cadeau->photo->img_url}} </p>

                        <div class="d-flex justify-content-between my-3">
                            <x-btn-edit  route="{{route('cadeau.edit', $cadeau->idcadeau)}}"/>
                            <x-btn-delete  route="{{route('cadeau.destroy', $cadeau->idcadeau)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>

 