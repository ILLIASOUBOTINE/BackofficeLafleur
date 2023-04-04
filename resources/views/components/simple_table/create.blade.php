@props(['nameTable', 'nameField'])

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
                
                <form action="{{ route($nameTable.'.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                    <p class="mb-2">
                        <label for="nom" class="form-label">{{$nameField}}</label>
                        <input type="text" class="form-control" name="{{$nameField}}" id="nom">
                    </p>
                    
                    <p>
                        <button type="submit" class="btn btn-success bg-success me-2">Ajouter</button>
                        <a href="{{ route($nameTable.'.index') }}" class="btn btn-danger">Annuler</a>
                    </p>
                </form>
               
                
            </div>
        </div>    
    </div>
  




