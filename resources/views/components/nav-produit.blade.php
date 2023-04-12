@props(['categories','couleurs','especeFleurs'])
<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
            <div class="container-fluid" style="max-width: 1280px !important">
                <a class="navbar-brand" href="{{ route('produit.index') }}">Tous</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex justify-content-between align-items-start flex-lg-row flex-column w-100">
                    <div class="d-flex flex-lg-row flex-column ">
                        <div class="me-lg-3">
                            <p>
                            
                                <button class="btn btn-primary text-black" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                   Trier
                                </button>
                            </p>
                            <div class="collapse" id="collapseExample">
                                
                                    <ul class="navbar-nav me-auto mb-2 mb-md-0 d-flex flex-column ">
                                        <li class="nav-item">
                                            <div class="dropdown">
                                                <button class="me-lg-2 mb-1 mb-xl-0 btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Par categorie
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach($categories as $categorie)
                                                        <li><a class="dropdown-item" href="{{route('produit.categorie',['id'=>$categorie->idcategorie])}}">{{$categorie->nom}}</a></li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="dropdown">
                                                <button class="me-lg-2 mb-1 mb-xl-0 btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Par couleur
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach($couleurs as $couleur)
                                                        <li><a class="dropdown-item" href="{{route('produit.couleur',['id'=>$couleur->idcouleur])}}">{{$couleur->nom}}</a></li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <div class="dropdown">
                                                <button class="me-lg-2 mb-1 mb-xl-0 btn btn-warning dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Par nom de la fleur
                                                </button>
                                                <ul class="dropdown-menu">
                                                    @foreach($especeFleurs as $especeFleur)
                                                        <li><a class="dropdown-item" href="{{route('produit.espece_fleur',['id'=>$especeFleur->idespece_fleur])}}">{{$especeFleur->nom}}</a></li> 
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </li>
                                          
                                           
                                    </ul>
                                    
                            
                            </div>
                        </div>
                        
                                                  
                    </div>
                    <div class="d-flex flex-lg-row flex-column">
                        <form action="{{ route('produit.getByNom') }}" method="GET" class="d-flex mb-1 mb-xl-0 me-4" role="search">
                                @csrf
                                <input class="form-control me-2" name="nom"  type="text" min="1" placeholder="nom" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                        <form action="{{ route('produit.getById') }}" method="GET" class="d-flex mb-1 mb-xl-0" role="search">
                                @csrf
                                <input class="form-control me-2" name="id"  type="number" min="1" placeholder="id" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                   
                </div>    
                </div>
            </div>
</nav>
