<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Livraison/Edit') }}
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
                
                <form action="{{ route('livraison.update', $livraison->idlivraison) }}" method="POST" class="mb-4 mt-4">
                   @csrf
                   @method('PUT')
                    <div class="mb-4">
                        <h3 class="my-3 fs-4">Les champs avec (*) sont obligatoires!</h3>
                        <p class="mb-3"><span class="fw-semibold">id: </span>{{$livraison->idlivraison}} </p>
                        <div class="mb-3">
                            <label for="livraison_date_prevu" class="form-label">date_prevu*:</label>
                            <input id="livraison_date_prevu" type="date" class="form-control" name="date_prevu" value="{{$livraison->date_prevu}}" > 
                        </div>
                        <div class="mb-3">
                            <label for="livraison_date_livre" class="form-label">date_livre:</label>
                            @if($livraison->date_livre == null)
                                <input id="livraison_date_livre" type="date" class="form-control" name="date_livre" value="non livres" > 
                            @else
                                <input id="livraison_date_livre" type="date" class="form-control" name="date_livre" value="{{$livraison->date_livre}}" > 
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="livraison_notre_livraison" class="form-label">ville*:</label>
                            <select id="livraison_notre_livraison" class="form-select" aria-label="Default select example" name="notre_livraison" >
                            @foreach($notreLivraisons as $notreLivraison)
                                <option value="{{$notreLivraison->idnotre_livraison}}"  @if($livraison->notreLivraison->idnotre_livraison == $notreLivraison->idnotre_livraison) selected @endif>{{$notreLivraison->nom_ville}}</option>
                            @endforeach
                            </select>
                            
                        </div>
                        <div class="mb-3">
                            <label for="livraison_rue" class="form-label">rue*:</label>
                            <input id="livraison_rue"  class="form-control" name="rue" value="{{$livraison->rue}}" > 
                        </div>
                        <div class="mb-3">
                            <label for="livraison_num_maison" class="form-label">numéro de maison*:</label>
                            <input id="livraison_num_maison"  class="form-control" name="num_maison" value="{{$livraison->num_maison}}" > 
                        </div>
                        <div class="mb-3">
                            <label for="livraison_num_appart" class="form-label">numéro d'appartement:</label>
                            @if($livraison->num_appart == null)
                                <input id="livraison_num_appart"  class="form-control" name="num_appart"  > 
                            @else
                                <input id="livraison_num_appart"  class="form-control" name="num_appart" value="{{$livraison->num_appart}}" > 
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="livraison_num_telephone" class="form-label">numéro de téléphone*:</label>
                            <input id="livraison_num_telephone"  class="form-control" name="num_telephone" value="{{$livraison->num_telephone}}" > 
                        </div>


                      
                        
                       
                    </div>
                    
                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('livraison.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>