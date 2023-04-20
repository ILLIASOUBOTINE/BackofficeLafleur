<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadeau/Edit') }}
        </h2>
    </x-slot>

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

            <div class="col-md-8">
                 <h3 class="my-3 fs-4">Les champs avec (*) sont obligatoires!</h3>
                <form action="{{ route('cadeau.update', $cadeau->idcadeau) }}" method="POST" class="mb-4 mt-4">
                   @csrf
                  @method('PUT')
                  
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="cadeau_nom" class="form-label">Nom*:</label>
                            <input id="cadeau_nom" type="text" max="100" class="form-control" name="nom" value="{{$cadeau->nom}}"> 
                        </div>
                        <div class="mb-3">
                            <label for="cadeau_quantite" class="form-label">Quantite*:</label>
                            <input id="cadeau_quantite" type="number" min="0" class="form-control" name="quantite" value="{{$cadeau->quantite}}"> 
                        </div>
                        <div class="mb-3">
                            <label for="cadeau_photo" class="form-label">Photo*:</label>
                            <select id="cadeau_photo" class="form-select" aria-label="Default select example" name="photo" >
                            @foreach($photos as $photo)
                                <option value="{{$photo->idphoto}}"  @if($cadeau->photo->idphoto == $photo->idphoto) selected @endif>{{$photo->img_url}}</option>
                            @endforeach
                            </select>
                        </div>
                     </div>
                    
                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('cadeau.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
              
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>