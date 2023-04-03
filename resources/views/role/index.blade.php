<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                @if(auth()->user()->can('create'))
                    <a href="{{ route('role.create') }}" class="btn btn-success mb-3">Create</a>
                @endif
                

                <ul class="list-group">
                @foreach ($roles as $role)
       
   
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{$role->name}} </p>
                        <div class="d-flex">
                            
                            <x-btn-edit  route="{{route('role.edit', $role->id)}}"/>
                            <x-btn-delete  route="{{route('role.destroy', $role->id)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>