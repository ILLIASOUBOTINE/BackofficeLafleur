<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorie/Edit') }}
        </h2>
    </x-slot>

     <x-simple_table.edit :item="$categorie"  nameTable="categorie" nameField="nom"/>

    
    
</x-app-layout>