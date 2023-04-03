<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User/Edit') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                
                <form action="{{ route('user.update', $user->id) }}" method="POST" class="mb-4 mt-4">
                   @csrf
                   @method('PUT')
                    <div class="mb-4">
                        <div class="mb-3">
                            <label for="role_name" class="form-label">Nom</label>
                            <input id="role_name" type="text" class="form-control" name="nom" value="{{$user->name}}" >
                        </div>
                        @foreach ($roles as $role)
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" value="{{$role->id}}" id="check_role_{{$role->id}}" @if($user->hasRole($role->name)) checked @endif>
                            <label class="form-check-label" for="check_role_{{$role->id}}">{{$role->name}}</label>
                        </div>
                        @endforeach 
                    </div>
                    
                    <div>
                        <button type="submit" class="btn btn-success bg-success">Valider</button>
                        <a href="{{ route('user.index') }}" class="btn btn-danger">Annuler</a>
                    </div>
                </form>
               
                
                
            </div>
        </div>    
    </div>
    
</x-app-layout>