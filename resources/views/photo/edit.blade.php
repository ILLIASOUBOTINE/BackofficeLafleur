<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Photo/Edit') }}
        </h2>
    </x-slot>

     <x-simple_table.edit :item="$photo"  nameTable="photo" nameField="img_url"/>

     
    
</x-app-layout>