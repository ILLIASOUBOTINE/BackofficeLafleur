<nav class="navbar navbar-expand-lg bg-body-tertiary mb-3">
            <div class="container-fluid" style="max-width: 1280px !important">
                <a class="navbar-brand" href="{{ route('commande.index') }}">Tous</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div class="d-flex justify-content-between align-items-start flex-lg-row flex-column w-100">
                    <div class="">
                        <p>
                        
                            <button class="btn btn-primary text-black" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                                Par livraison
                            </button>
                        </p>
                        <div class="collapse" id="collapseExample">
                            
                                <ul class="navbar-nav me-auto mb-2 mb-md-0 d-flex flex-column ">
                                        <li class="nav-item">
                                            <a class="me-lg-2 mb-1 mb-xl-0 btn btn-warning" aria-current="page" href="{{ route('commande.tomorrow') }}">Livraison demain</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="me-lg-2 mb-1 mb-xl-0 btn btn-danger" aria-current="page" href="{{ route('commande.today') }}">Expédition aujourd'hui</a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="{{ route('commande.nonLivres') }}" class="me-lg-2 mb-1 mb-xl-0 btn btn-secondary" aria-current="page" >Non livrés</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="me-lg-2 mb-1 mb-xl-0 btn btn-info" aria-current="page" href="{{ route('commande.livre') }}">Livré</a>
                                        </li>
                                </ul>
                                 <form action="{{ route('commande.getByDate') }}" method="GET" class="d-flex me-lg-3 mb-1 mb-xl-0" role="search">
                                    @csrf
                                    <input class="form-control me-2" name="date_prev"  type="date"  aria-label="Search">
                                    <button class="btn btn-outline-info" type="submit">Search</button>
                                </form>
                           
                        </div>

                        
                    </div>
                    
                   <form action="{{ route('commande.getById') }}" method="GET" class="d-flex mb-1 mb-xl-0" role="search">
                            @csrf
                            <input class="form-control me-2" name="id"  type="number" min="1" placeholder="id" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                </div>    
                </div>
            </div>
</nav>
