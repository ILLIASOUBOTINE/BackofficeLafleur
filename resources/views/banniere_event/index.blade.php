<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Event') }}
        </h2>
    </x-slot>
    
    <div class="container mt-6">
        <div class="row d-flex justify-content-center">
            
            
            <div class="col-md-8">
                <a href="{{ route('banniere_event.create') }}" class="btn btn-success mb-3">Create</a>
                <table class="table align-middle table-hover">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">titre</th>
                            <th scope="col">date_debut</th>
                            <th scope="col">date_fin</th>
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($banniereEvents as $banniereEvent)
                           
                                <tr class="bg-success-subtle">
                                    <th scope="row">{{$banniereEvent->idbanniere_event}}</th>
                                    <td>{{$banniereEvent->titre}}</td>
                                    <td> {{$banniereEvent->date_debut}}</td>
                                    <td>{{$banniereEvent->date_fin}}</td>
                                   
                                    <td class="text-center"><a href="{{ route('banniere_event.show', $banniereEvent->idbanniere_event) }}" class="btn btn-info">details</a></td>
                                </tr>
                            
                        @endforeach 
                    </tbody>
                </table>
            </div>
        </div>    
    </div>
    
</x-app-layout>