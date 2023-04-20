<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
            <a href="{{ route('user.create') }}" class="btn btn-success mb-3">Create</a>
                {{-- @if(auth()->user()->can('create'))
                    <a href="{{ route('user.create') }}" class="btn btn-success mb-3">Create</a>
                @endif --}}
                

                <ul class="list-group">
                @foreach ($users as $user)
       
   
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <p>{{$user->name}} </p>
                        <div class="d-flex">
                            
                            <x-btn-edit  route="{{route('user.edit', $user->id)}}"/>
                            <x-btn-delete  route="{{route('user.destroy', $user->id)}}"/>
                        </div>
                       
                    </li>
                @endforeach 
                </ul>
            </div>
        </div>    
    </div>
    
</x-app-layout>