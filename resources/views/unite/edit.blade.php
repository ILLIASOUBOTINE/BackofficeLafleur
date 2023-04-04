<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unite/Edit') }}
        </h2>
    </x-slot>

     <x-simple_table.edit :item="$unite"  nameTable="unite" nameField="nom"/>

    
    
</x-app-layout>