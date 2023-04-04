@props(['item', 'nameTable', 'nameField'])

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
                
                <form action="{{ route($nameTable.'.update', $item->{'id'.$nameTable}) }}" method="POST" class="d-flex flex-column align-items-center  mb-4 mt-4">
                    @csrf
                    @method('PUT')
                    <div class="w-100 mb-3">
                        <label for="nom" class="form-label">{{$nameField}}</label>
                        <input id="nom" type="text" class="form-control" name="{{$nameField}}" value="{{($item->{$nameField})}}">
                    </div>
                    
                    <p>
                        <button type="submit" class="btn btn-success bg-success me-3">Valider</button>
                        <a href="{{ route($nameTable.'.index') }}" class="btn btn-danger">Annuler</a>
                    </p>
                </form>
                
            </div>
        </div>    
    </div>




