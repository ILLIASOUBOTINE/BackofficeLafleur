<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('NotreLivraison/Edit') }}
        </h2>
    </x-slot>

     <x-simple_table.edit :item="$notreLivraison"  nameTable="notre_livraison" nameField="nom_ville"/>

    
    
</x-app-layout>