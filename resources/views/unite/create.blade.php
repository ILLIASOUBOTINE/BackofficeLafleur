<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Unite/Create') }}
        </h2>
    </x-slot>
    
    <x-simple_table.create  nameTable="unite" nameField="nom"/>
    
</x-app-layout>