<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Role/Create') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                
                <form action="{{ route('role.store') }}" method="POST" class="mb-4 mt-4">
                   @csrf
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Nom</label>
                            <input id="role_name" type="text" class="form-control" name="nom" >
                        </div>
                        @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="permissions[]" value="{{$permission->id}}" id="check_permission_{{$permission->id}}">
                            <label class="form-check-label" for="check_permission_{{$permission->id}}">{{$permission->name}}</label>
                        </div>
                        @endforeach 
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success bg-success">Ajouter</button>
                        <a href="{{ route('role.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>