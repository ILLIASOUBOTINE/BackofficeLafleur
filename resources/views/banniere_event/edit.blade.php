<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event/Edit') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex flex-column align-items-center">

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


                <form action="{{ route('banniere_event.update', $banniereEvent->idbanniere_event) }}" method="POST" class="mb-4 mt-4">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="event_titre" class="form-label" required>Titre*:</label>
                            <input id="event_titre" type="text" class="form-control" name="titre" value="{{$banniereEvent->titre}}">
                        </div>
                        <div class="mb-3">
                            <label for="event_date_debut" class="form-label" required>Date_debut:</label>
                            <input id="event_date_debut" type="date" class="form-control" name="date_debut" value="{{$banniereEvent->date_debut}}">
                        </div>
                        <div class="mb-3">
                            <label for="event_date_fin" class="form-label" required>Date_fin:</label>
                            <input id="event_date_fin" type="date" class="form-control" name="date_fin" value="{{$banniereEvent->date_fin}}">
                        </div>

                        <div class="mb-3">
                            <label for="event_photo" class="form-label">Photo*:</label>
                            <select id="event_photo" class="form-select" aria-label="Default select example"
                                name="photo_idphoto">
                                @foreach($photos as $photo)
                                <option value="{{$photo->idphoto}}" @if($banniereEvent->photo->idphoto == $photo->idphoto) selected @endif>{{$photo->img_url}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="event_description" class="form-label">Description*:</label>
                            <textarea id="event_description" type="text" class="form-control"
                                name="description">{{$banniereEvent->description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Produit:</label>

                            @foreach($produits as $produit)
                            <div class="form-check ">
                                <input class="form-check-input" type="checkbox" name="produits[]"
                                    value="{{$produit->idproduit}}" id="check_produit_{{$produit->idproduit}}" @if( $banniereEvent->produits->contains($produit)) checked @endif>
                                <label class="list-group-item d-flex flex-column border border-secondary mb-3 p-3"
                                    for="check_produit_{{$produit->idproduit}}">
                                    <a href="{{ route('produit.show', $produit->idproduit) }}"
                                        class="list-group-item list-group-item-action mb-1">
                                        <p class="mb-1"><span class="fw-semibold">id: </span>{{$produit->idproduit}}</p>
                                        <p class="mb-1"><span class="fw-semibold">nom: </span>{{$produit->nom}}</p>
                                    </a>
                                </label>

                            </div>
                            @endforeach

                        </div>



                    </div>

                    <div class="d-flex justify-content-between my-3">
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('banniere_event.show', $banniereEvent->idbanniere_event) }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>


            </div>
        </div>
    </div>

</x-app-layout>