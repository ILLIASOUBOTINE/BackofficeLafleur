<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-6">
    <div class="row">
    <div class="col-md-12">
        <div class="card" >
            <div class="card-header">LaFleur</div>
            <div class="card-body">
                
                <h6 class="card-subtitle mb-2 text-body-secondary">Information</h6>
                <p class="card-text text-red">Cette application est destinée aux employés du magasin. Conformément à vos obligations, vous disposez des droits d'accès appropriés. Si vos responsabilités changent, contactez votre administrateur pour modifier votre accès.</p>
                
            </div>
        </div>
    </div>
    </div>    
    </div>
    
</x-app-layout>
