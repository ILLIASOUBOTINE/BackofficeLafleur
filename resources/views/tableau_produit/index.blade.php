<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produit') }}
        </h2>
    </x-slot>
    
    <x-nav-tableau_produit/>

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
                <table class="table table-hover align-middle">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">nom</th>
                            <th scope="col">prix</th>
                            <th scope="col">quantiteTotale</th>
                            <th scope="col">ventesTotales</th>
                           
                            <th scope="col"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($produits as $produit)
                           
                                <tr @if($produit->quantiteTotale == 0)
                                    {{$color = "text-bg-danger"}}
                                @elseif($produit->quantiteTotale > 5)
                                {{ $color = "text-bg-success"}}
                                @else 
                                {{ $color = "text-bg-warning"}}
                                @endif class="{{$color}} ">
                                    <th scope="row">{{$produit->idproduit}}</th>
                                    <td>{{$produit->nom}}</td>
                                    <td> {{$produit->prix_unite}}$</td>
                                
                                    <td>{{$produit->quantiteTotale}}</td>
                                    <td>{{$produit->ventesTotales}}</td>
                                    
                                    <td><a href="{{ route('produit.show', $produit->idproduit) }}" class="btn btn-info">details</a></td>
                                </tr>
                            
                        @endforeach 
                    </tbody>
                </table>
               
            </div>
        </div>    
    </div>
    
</x-app-layout>