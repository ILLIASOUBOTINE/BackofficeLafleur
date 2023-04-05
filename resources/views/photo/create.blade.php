<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photo /Create') }}
        </h2>
    </x-slot>
    
    <x-simple_table.create  nameTable="photo" nameField="img_url"/>
    
</x-app-layout>